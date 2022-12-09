<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ImageHandle\ImageHandler;
use App\ImageItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ImageItemController extends Controller {
    public function AddImage(Request $request) {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|int|exists:items,id',
            'file' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $date = Carbon::now()->toDateString();
        $path = public_path('assets/images/items/' . $date);
        File::makeDirectory($path, $mode = 0777, true, true);
        $exp = $request->file('file')->getClientOriginalExtension();
        $image_name = uniqid('img_').'.'.$exp;
        $request->file('file')->move(public_path('assets/images/items/'.$date.'/'), $image_name);
        $preview_image_name = ImageHandler::CreatePreview(
            'assets/images/items/'.$date.'/'.$image_name,
            'assets/images/items/'.$date.'/',
            $exp,
            300, 300
        );
        if (ImageItem::AddImage($request->item_id, $date.'/'.$image_name, $date.'/'.$preview_image_name)) {
            return response()->json([
                'status' => 'success',
                'image' => ImageItem::GetLast()
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    public function Delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int|exists:image_items,id'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $image = ImageItem::GetItemImage($request->id);
        if ($image->status_main) {
            return response()->json([
                'error' => 'Вы не можете удалить главное изображение'
            ]);
        }
        if (ImageItem::DeleteImage($request->id)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }
}
