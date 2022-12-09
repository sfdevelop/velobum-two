<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public $timestamps = false;
    public $primaryKey = 'id';

    public static function GetItemsStatic() {

        return Slide::orderBy('id', 'desc')->take(1)->get();
    }

    protected function GetItems() {
        return Slide::orderBy('id', 'desc')->paginate(12);
    }
    protected function GetItem($id) {
        return Slide::find($id);
    }
    protected function CreateItem($name, $url, $image, $preview_image) {
        $data = [
            'name' => $name,
            'url' => $url,
            'image' => $image,
            'preview_image' => $preview_image
        ];
        return Slide::insertGetId($data);
    }
    protected function UpdateItem($id, $name, $url, $image=null, $preview_image=null) {
        $item = Slide::find($id);
        $item->name = $name;
        $item->url = $url;
        if ($image != null) {
            \App\ImageHandle\ImageHandler::DeleteImages('/assets/images/slides/', [
                $item->image, $item->preview_image
            ]);

            $item->image = $image;
            $item->preview_image = $preview_image;            
        }
        $item->save();
    }
    protected function DeleteItem($id) {
        $item = Slide::find($id);
        \App\ImageHandle\ImageHandler::DeleteImages('/assets/images/slides/', [
            $item->image, $item->preview_image
        ]);
        $item->delete();
    }
}
