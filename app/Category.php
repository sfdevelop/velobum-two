<?php

namespace App;

use App\Classes\GenerateTree;
use Nestable\NestableTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NestableTrait;
    protected $primaryKey = 'id';
    protected $parent = 'parent_id';
    public $timestamps = false;
    private $array_id;

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
    }

    public static function GetItem($id) {
        return Category::find($id);
    }

    public static function GetTree($select = null, $output) {
        $query = Category::query();
        $query->orderBy('sorting_order', 'asc');
        if ($output == 'categories_public' || $output == 'categories/main') {
            $query->where('id', '<>', 1);
        }
        $data = $query->get();

        $prepare_data = array();
        $i = 0;
        while ($i < count($data)) {
            array_push($prepare_data, [
                'id' => $data[$i]->id,
                'sorting_order' => $data[$i]->sorting_order,
                'parent_id' => $data[$i]->parent_id,
                'name' => $data[$i]->name,
                'slug' => $data[$i]->slug
            ]);
            $i++;
        }
        $result = \Nestable::make($prepare_data);
        switch ($output) {
            case 'add_or_update':
                return $result->attr([
                    'class' => 'form-control',
                    'name' => 'parent_id',
                    'id' => 'parent_id'
                ])->selected($select)->renderAsDropdown();
                break;
            case 'categories/main':
                return $result->ulAttr(['class' => 'sitemap'])
                    ->route(['categories/update_page' => 'id'])
                    ->renderAsHtml();
                break;
            case 'categories_public':
                return (object)[
                    'desktop' => $result->route(['items/category' => 'id'])
                    ->renderAsHtml(),
                    'mobile' => GenerateTree::RunGenerateTree(\Nestable::make($prepare_data)->renderAsArray())
                ];
                break;
            case 'select_multiple':
                return $result->attr([
                    'class' => 'form-control',
                    'name' => 'categories[]',
                    'id' => 'categories'
                ])->selected($select)->renderAsMultiple();
                break;
        }
    }

    protected function CreateItem($name, $parent_id, $sorting_order = null) {
        if ($parent_id == '1') {
            $parent_id = 0;
        }
        if ($sorting_order == null) {
            $sorting_order = 0;
        }
        $data = [
            'name' => $name,
            'parent_id' => $parent_id,
            'sorting_order' => $sorting_order
        ];
        return Category::insertGetId($data);
    }

    protected function UpdateItem($id, $name, $parent_id, $sorting_order = null) {
        $item = Category::find($id);
        $item->name = $name;
        if ($parent_id == '1') {
            $parent_id = 0;
        }
        if ($sorting_order == null) {
            $sorting_order = 0;
        }
        $item->sorting_order = $sorting_order;
        $item->parent_id = $parent_id;
        if ($item->save()) {
            return true;
        }
        return false;
    }

    private function DeleteItems() {
        Category::whereIn('id', $this->array_id)->delete();
    }

    private function SearchId($data) {
        $count = count($data);
        $i = 0;
        while ($i < $count) {
            $this->array_id[] = $data[$i]['id'];
            if (count($data[$i]['child']) > 0) {
                $this->SearchId($data[$i]['child']);
            }
            $i++;
        }
    }
    protected function CallDeleteItem($id) {
        $this->array_id[] = $id;
        $this->SearchId(Category::parent($id)->renderAsArray());
        $this->DeleteItems();
        return true;
    }
}
