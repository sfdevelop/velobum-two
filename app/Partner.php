<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;
    public $primaryKey = 'id';

    protected function GetAll() {
        return Partner::orderBy('id', 'desc')->get();
    }
    protected function GetItems() {
        return Partner::orderBy('id', 'desc')->paginate(12);
    }

    protected function GetItem($id) {
        return Partner::find($id);
    }

    protected function CreateItem($name, $url, $image, $preview_image) {
        $data = [
            'name' => $name,
            'url' => $url,
            'image' => $image,
            'preview_image' => $preview_image
        ];
        return Partner::insertGetId($data);
    }

    protected function UpdateItem($id, $name, $url, $image=null, $preview_image=null) {
        $item = Partner::find($id);
        $item->name = $name;
        $item->url = $url;
        if ($image != null) {
            \App\ImageHandle\ImageHandler::DeleteImages('/assets/images/partners/', [
                $item->image, $item->preview_image
            ]);

            $item->image = $image;
            $item->preview_image = $preview_image;            
        }
        $item->save();
    }

    protected function DeleteItem($id) {
        $item = Partner::find($id);
        \App\ImageHandle\ImageHandler::DeleteImages('/assets/images/partners/', [
            $item->image, $item->preview_image
        ]);
        $item->delete();
    }
}
