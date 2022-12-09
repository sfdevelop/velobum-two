<?php

namespace App;

use App\ImageHandle\ImageHandler;
use Illuminate\Database\Eloquent\Model;

/**
 * App\ImageItem
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $item_id
 * @property string $image_name
 * @property string $preview_image_name
 * @property int|null $status_main
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageItem whereImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageItem wherePreviewImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ImageItem whereStatusMain($value)
 */
class ImageItem extends Model
{
    public $primaryKey = 'id';
    public $timestamps = false;

    protected function GetLast() {
        return ImageItem::orderBy('id', 'desc')->first();
    }

    protected function AddImage($item, $image_name, $preview_name) {
        $image = new ImageItem();
        $image->item_id = $item;
        $image->image_name = $image_name;
        $image->preview_image_name = $preview_name;
        if ($image->save()) {
            return true;
        }
        return false;
    }

    protected function DeleteImage($id) {
        $image = ImageItem::find($id);
        if ($image->status_main == true) {
            return 'main_image';
        }
        ImageHandler::DeleteImages('/assets/images/items/', [
            $image->image_name,
            $image->preview_image_name
        ]);
        $image->delete();
        return true;
    }

    public static function GetItemImage($id) {
        return ImageItem::find($id);
    }
    public static function GetItemImages($id) {
        return ImageItem::where('item_id', $id)->get();
    }
    public static function MakeMain($id) {
        $image = ImageItem::find($id);
        $image->status_main = true;
        if ($image->save()) {
            return true;
        }
        return false;
    }
    public static function ResetMain($item) {
        $image = ImageItem::where('item_id', $item)
            ->where('status_main', true)
            ->whereNotNull('id')
            ->first();
        if (isset($image->id)) {
            $image->status_main = false;
            $image->save();
        }
    }
    public static function DeleteAllRowsOfItems($item) {
        ImageItem::where('item_id', $item)->delete();
    }
}
