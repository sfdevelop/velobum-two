<?php
namespace App\Http\Controllers\Admin;

use App\FileUpload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller {
    public function Run() {
        $data = (object)[
            'title' => 'Управление файлами',
            'route_name' => $this->route_name,
            'files' => FileUpload::GetItems(),
        ];
        return view('admin.upload_files.main', ['page' => $data]);
    }

    public function Add(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:500',
            'file' => 'required|file'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $file = $request->file('file');
        $file_name = uniqid('file_').'.'.$file->getClientOriginalExtension();
        $url = 'assets/uploads/';
        $file->move($url, $file_name);

        $item = FileUpload::CreateItem($request->name, $file_name, $file->getClientOriginalExtension());
        return response()->json([
            'status' => 'success',
            'item' => FileUpload::GetItem($item)
        ]);
    }

    public function Delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:file_uploads,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        FileUpload::DeleteItem($request->id);
        return response()->json([
            'status' => 'success',
            'id' => $request->id
        ]);
    }

    public function Search(Request $request) {
        $validator = Validator::make($request->all(), [
            'name_search' => 'nullable|string',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = (object)[
            'title' => 'Поиск по файлам',
            'route_name' => $this->route_name,
            'files' => FileUpload::SearchItems($request),
        ];
        if ($request->has('name_search')) {
            $data->old_name_search = $request->name_search;
        }
        if ($request->has('date_start')) {
            $data->old_date_start = $request->date_start;
        }
        if ($request->has('date_end')) {
            $data->old_date_end = $request->date_end;
        }
        return view('admin.upload_files.main', ['page' => $data]);
    }
}