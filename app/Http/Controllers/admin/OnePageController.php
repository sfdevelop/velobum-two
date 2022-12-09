<?php
namespace App\Http\Controllers\Admin;

use App\OnePage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OnePageController extends Controller {
    public function Page($id) {
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:one_pages,id']
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $title = null;
        switch ($id) {
            case 1:
                $title = 'О нас';
                break;
            case 2:
                $title = 'Сервис';
                break;
            case 3:
                $title = 'Велокосметика';
                break;
            case 4:
                $title = 'Инструменты';
                break;
            default:
                return redirect()->back()->with(['error', 'Данных по этому ID нет']);
                break;
        }
        $data = (object)[
            'title' => $title,
            'value' => OnePage::GetItem($id)->value,
            'id' => $id
        ];
        return view('admin.one_pages.update', ['page' => $data]);
    }

    public function Update(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:one_pages,id',
            'value' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        if (OnePage::UpdateItem($request->id, $request->value)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }
}