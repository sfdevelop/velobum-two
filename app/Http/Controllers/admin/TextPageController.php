<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\TextPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TextPageController extends Controller {
    public function Update(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required|int|exists:text_pages,category'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        if (TextPage::UpdateData($request->category, $request->value)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    public function Get(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required|int|exists:text_pages,category'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        return response()->json(TextPage::GetData($request->category));
    }
}