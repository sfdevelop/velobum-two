<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TextPage
 *
 * @property int $id
 * @property int $category
 * @property string|null $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TextPage whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TextPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TextPage whereValue($value)
 * @mixin \Eloquent
 */
class TextPage extends Model
{
    public $primaryKey = 'category';
    public $timestamps = false;

    protected function GetData($category) {
        return TextPage::find($category);
    }
    public static function GetDataForPublic($category) {
        return TextPage::find($category);
    }

    protected function UpdateData($category, $value) {
        $item = TextPage::find($category);
        $item->value = $value;
        if ($item->save()) {
            return true;
        }
        return false;
    }
}
