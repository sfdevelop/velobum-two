<?php

namespace App;

use App\ImageHandle\ImageHandler;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $primaryKey = 'id';
    private $datetime;

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->datetime = Carbon::now()->toDateTimeString();
    }

    protected function CreateItem($name, $name_file, $exp) {
        return FileUpload::insertGetId([
            'name' => $name,
            'name_file' => $name_file,
            'exp' => $exp,
            'created_at' => $this->datetime,
            'updated_at' => $this->datetime,
        ]);
    }

    protected function GetItems() {
        return FileUpload::orderBy('id', 'desc')->paginate(10);
    }
    protected function GetItem($id) {
        return FileUpload::find($id);
    }
    protected function DeleteItem($id) {
        $item = FileUpload::find($id);
        ImageHandler::DeleteImages('/assets/uploads/', [
            $item->name_file
        ]);
        $item->delete();
    }

    protected function SearchItems($required) {
        $query = FileUpload::query();
        if ($required->has('name_search')) {
            $query->where('name', 'LIKE', '%'.$required->name_search.'%');
        }
        if ($required->has('date_start') && $required->has('date_end')) {
            $query->where([
                ['created_at', '>=', $required->date_start],
                ['created_at', '<=', $required->date_end]
            ]);
        }
        if ($required->has('date_start') && !$required->has('date_end')) {
            $query->where('created_at', '>=', $required->date_start);
        }
        if (!$required->has('date_start') && $required->has('date_end')) {
            $query->where('created_at', '<=', $required->date_end);
        }
        return $query->orderBy('id', 'desc')->paginate(10);
    }
}
