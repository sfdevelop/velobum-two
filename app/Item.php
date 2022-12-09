<?php

namespace App;

use App\ImageHandle\ImageHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Item extends Model
{
    public $primaryKey = 'id';
    private $ids;

    public function scopeMainSelect($query) {
        return $query->select(
              'items.id',
              'items.sorting_order',
              'items.status',
              'items.name',
              'items.price',
              'items.share_price',
              'items.description',
              'items.preview_image_name',
              'items.created_at',
              'categories.name as category'
        );
    }
    public function scopePublicSelect($query) {
        return $query->select(
            'items.id',
            'items.sorting_order',
            'items.status',
            'items.name',
            'items.price',
            'items.share_price',
            'items.preview_image_name',
            'items.created_at',
            'categories.id as category_id',
            'categories.name as category_name'
        );
    }
    private function SearchId($data) {
        $count = count($data);
        $i = 0;
        while ($i < $count) {
            $this->ids[] = $data[$i]['id'];
            if (count($data[$i]['child']) > 0) {
                $this->SearchId($data[$i]['child']);
            }
            $i++;
        }
    }

    protected function GetItems($id = null, $share = false) {
        $query = Item::query();
        $query->where('items.status', true);
        $query->join('categories', 'items.category_id', '=', 'categories.id');
        if ($id != null) {
            $this->ids[] = $id;
            $this->SearchId(Category::parent($id)->renderAsArray());
            $query->whereIn('items.category_id', $this->ids);
        }
        if ($share) {
            $query->whereNotNull('share_price');
        }
        return $query->orderBy('sorting_order', 'asc')
            ->publicSelect()->paginate(12);
    }

    protected function GetLast() {
        return Item::orderBy('id', 'desc')->first();
    }

    public static function GetItemForMainPage($take = null, $share_status = false) {
        $query = Item::query();
        $query->join('categories', 'items.category_id', '=', 'categories.id')
              ->mainSelect();
        if ($share_status) {
            $query->where('items.share_price', '!=', null);
        }
        if ($take != null) {
            $query->orderBy('items.id', 'desc');
            $query->where('items.status', true);
            return $query->take($take)->get();
        }
        else {
            if (Route::currentRouteName() == 'admin/items') {
                $query->orderBy('items.id', 'desc');
            }
            else {
                $query->orderBy('items.sorting_order', 'asc');
            }
        }
        return $query->paginate(12);
    }

    protected function AddItem($name, $price, $description, $category, $share_price = null, $sorting_order, $status) {
        $item = new Item();
        if ($sorting_order != null) {
            $item->sorting_order = $sorting_order;
        }
        $item->name = $name;
        $item->price = $price;
        $item->share_price = $share_price;
        $item->description = $description;
        $item->category_id = $category;
        $item->image_name = 'img-default.png';
        $item->preview_image_name = 'img-default.png';
        $item->status = $status;
        if ($item->save()) {
            return true;
        }
        return false;
    }

    protected function UpdateItem($id, $name, $price, $description, $category, $share_price = null, $sorting_order, $status) {
        $item = Item::find($id);
        if ($sorting_order != null) {
            $item->sorting_order = $sorting_order;
        }
        $item->name = $name;
        $item->price = $price;
        $item->share_price = $share_price;
        $item->description = $description;
        $item->category_id = $category;
        $item->status = $status;
        if ($item->save()) {
            return true;
        }
        return false;
    }

    protected function UpdateMainImage($id, $image, $preview) {
        $item = Item::find($id);
        $item->image_name = $image;
        $item->preview_image_name = $preview;
        if ($item->save()) {
            return true;
        }
        return false;
    }

    protected function GetItem($id) {
        return Item::where('items.id', $id)
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->select(
                'items.id',
                'items.sorting_order',
                'items.status',
                'items.name',
                'items.price',
                'items.share_price',
                'items.description',
                'items.image_name',
                'items.preview_image_name',
                'items.created_at',
                'categories.name as category',
                'categories.id as category_id'
            )
            ->first();
    }

    protected function ItemDelete($id) {
        Item::find($id)->delete();
        $images = ImageItem::GetItemImages($id);
        $i = 0;
        while($i < count($images)) {
            ImageHandler::DeleteImages('/assets/images/items/', [
                $images[$i]->image_name,
                $images[$i]->preview_image_name
            ]);
            $i++;
        }
        ImageItem::DeleteAllRowsOfItems($id);
        return true;
    }

    public static function DeleteCategoryItems($category_id) {
        $items = Item::where('category_id', $category_id)->get();
        $i = 0;
        while ($i < count($items)) {
            $images = ImageItem::GetItemImages($items[$i]->id);
            $j = 0;
            while ($j < count($images)) {
                ImageHandler::DeleteImages('/assets/images/items/', [
                    $images[$j]->image_name,
                    $images[$j]->preview_image_name
                ]);
                $j++;
            }
            $i++;
        }
        Item::where('category_id', $category_id)->delete();
    }

    protected function SearchItems($request = null, $text_search = null) {
        $query = Item::query();
        $query->join('categories', 'items.category_id', '=', 'categories.id');
        if ($request != null) {
            if ($request->has('name')) {
                $query->where('items.name', 'LIKE', '%'.$request->name.'%');
            }
            if ($request->has('description')) {
                $query->where('items.description', 'LIKE', '%'.$request->description.'%');
            }
            if ($request->has('categories')) {
                $query->whereIn('items.category_id', $request->categories);
            }
            if ($request->has('date_start') && $request->has('date_end')) {
                $query->where([
                    ['items.created_at', '>=', $request->date_start],
                    ['items.created_at', '<=', $request->date_end],

                ]);
            }
            if ($request->has('status')) {
                $query->where('status', false);
            }
            if (!$request->has('date_start') && $request->has('date_end')) {
                $query->where('items.created_at', '<=', $request->date_end);
            }
            if ($request->has('date_start') && !$request->has('date_end')) {
                $query->where('items.created_at', '>=', $request->date_start);
            }
            $query->mainSelect();
        }
        if ($text_search != null) {
            $query->where('items.name', 'LIKE', '%'.$text_search.'%');
            $query->orWhere('items.description', 'LIKE', '%'.$text_search.'%');
            $query->publicSelect();

            return $query->orderBy('sorting_order', 'asc')->paginate(12);
        }
        return $query->orderBy('created_at', 'desc')->paginate(12);
    }
}
