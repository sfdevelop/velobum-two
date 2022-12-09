<?php
namespace App\Http\Controllers\Admin;

use App\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller {
    public function Page() {
        $data = (object)[
            'route_name' => $this->route_name,
            'title' => 'Управение партнерами',
            'partners' => Partner::GetItems()
        ];
        return view('admin.partners.main', ['page' => $data]);
    }
    public function PageCreate() {
        $data = (object)[
            'title' => 'Добавить партнера',
            'route_name' => $this->route_name
        ];
        return view('admin.partners.work_on', ['page' => $data]);
    }

    public function PageUpdate($id) {
        $validator = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|integer|exists:partners,id'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } 
        $data = (object)[
            'title' => 'редактировать данные о партнера',
            'route_name' => $this->route_name,
            'item_id' => $id,
            'partner' => Partner::GetItem($id)
        ];
        return view('admin.partners.work_on', ['page' => $data]);
    }
    public function Create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'url' => 'required|url',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }

        $exp = $request->file('image')->getClientOriginalExtension();
        $image = uniqid('img_').'.'.$exp;
        $url = 'assets/images/partners/';
        $request->file('image')->move(public_path($url), $image);
        $preview_image = \App\ImageHandle\ImageHandler::CreatePreview(
            $url.$image,
            $url,
            $exp, 300, 300
        );

        $item_id = Partner::CreateItem($request->name, $request->url, $image, $preview_image);
        return response()->json([
            'status' => 'success',
            'item_id' => $item_id,
            'image' => $preview_image
        ]);
    }
    public function Update(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:partners,id',
            'name' => 'required|string',
            'url' => 'required|url',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $item = Partner::GetItem($request->id);
        
        $image = null;
        $preview_image = null;

        if (isset($request->image)) {
            \App\ImageHandle\ImageHandler::DeleteImages('/assets/images/pertners/', [
                $item->image, $item->preview_image
            ]);

            $exp = $request->file('image')->getClientOriginalExtension();
            $image = uniqid('img_').'.'.$exp;
            $url = 'assets/images/partners/';
            $request->file('image')->move(public_path($url), $image);
            $preview_image = \App\ImageHandle\ImageHandler::CreatePreview(
                $url.$image,
                $url,
                $exp, 300, 300
            );
        }
        Partner::UpdateItem($request->id, $request->name, $request->url, $image, $preview_image);
        if (isset($request->image)) {
            return response()->json([
                'status' => 'success',
                'image' => $preview_image
            ]);
        }
        else {
            return response()->json([
                'status' => 'success'
            ]);
        }
    }
    public function Delete($id) {
        $validator = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|integer|exists:partners,id'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } 
        Partner::DeleteItem($id);
        return redirect()->route('admin/partners')->with(['success' => 'Данные о партнере успешно удалены']);
    }
}