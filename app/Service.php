<?php

namespace App;

use App\ImageHandle\ImageHandler;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Service
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $topic
 * @property string $text
 * @property string|null $image
 * @property string|null $preview_image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service wherePreviewImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereTopic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereUpdatedAt($value)
 */
class Service extends Model
{
    public $primaryKey = 'id';

    protected function GetServices() {
        return Service::orderBy('created_at', 'desc')->paginate(12);
    }

    protected function CreateService($topic, $text, $image, $preview_image, $date = null) {
        $service = new Service();
        $service->topic = $topic;
        $service->text = $text;
        $service->image = $image;
        $service->preview_image = $preview_image;
        if ($date != null) {
            $carbon = Carbon::now();
            $time = $carbon->toTimeString();
            $parse = Carbon::createFromFormat('Y-m-d H:i:s', $date.' '.$time);
            $service->created_at = $parse;
        }
        $service->save();

        return $service->created_at->toDateString();
    }

    protected function DeleteService($id) {
        $service = Service::find($id);

        ImageHandler::DeleteImages('/assets/images/services/', [
            $service->image,
            $service->preview_image
        ]);

        $service->delete();
        return true;
    }

    protected function UpdateService($id, $topic, $text, $date, $image = null, $preview_image =null) {
        $service = Service::find($id);

        $service->topic = $topic;
        $service->text = $text;
        if ($image != null) {
            $service->image = $image;
            $service->preview_image = $preview_image;
        }

        if ($date != null) {
            $time = $service->created_at->toTimeString();
            $parse = Carbon::createFromFormat('Y-m-d H:i:s', $date.' '.$time);
            $service->created_at = $parse;
        }

        if ($service->save()) {
            return true;
        }
        return false;
    }

    protected function GetService($id) {
        return Service::find($id);
    }

    protected function GetLast() {
        return Service::orderBy('id', 'desc')->first();
    }

    public static function GetLastStatic() {
        return Service::orderBy('created_at', 'desc')->take(4)->get();
    }
    protected function GetLastT() {
        return Service::orderBy('created_at', 'desc')->take(10)->get();
    }

    protected function GetServicesForPublic() {
        return Service::orderBy('created_at', 'desc')->paginate(12);
    }

    protected function SerachItems($request) {
        $query = Service::query();
        if ($request->has('topic')) {
            $query->where('topic', 'LIKE', '%'.$request->topic.'%');
        }
        if ($request->has('text')) {
            $query->where('text', 'LIKE', '%'.$request->text.'%');
        }
        if ($request->has('date_start') && $request->has('date_end')) {
            $query->where([
                ['created_at', '>=', $request->date_start],
                ['created_at', '<=', $request->date_end],

            ]);
        }
        if (!$request->has('date_start') && $request->has('date_end')) {
            $query->where('created_at', '<=', $request->date_end);
        }
        if ($request->has('date_start') && !$request->has('date_end')) {
            $query->where('created_at', '>=', $request->date_start);
        }
        return $query->orderBy('created_at', 'desc')->paginate(12);
    }
}
