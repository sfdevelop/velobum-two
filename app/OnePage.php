<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnePage extends Model
{
    public $timestamps = false;
    public $primaryKey = 'id';

    protected function GetItem($id) {
        return OnePage::find($id);
    }

    protected function UpdateItem($id, $value) {
        $item = OnePage::find($id);
        $item->value = $value;
        if ($item->save()) {
            return true;
        }
        return false;
    }
}
