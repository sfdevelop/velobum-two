<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ImageHandle\ImageHandler;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller {
    public function Run() {
        $data = (object)[
            'title' => 'Управление новостями',
            'route_name' => $this->route_name,
            'services' => Service::GetServices()
        ];
        return view('admin.services.main', ['page' => $data]);
    }
    public function RunAdd() {
        $data = (object)[
            'route_name' => $this->route_name
        ];
        return view('admin.services.work_on', ['page' => $data]);
    }
    public function RunEdit($id) {
        $data = (object)[
            'route_name' => $this->route_name,
            'service' => Service::GetService($id)
        ];
        return view('admin.services.work_on', ['page' => $data]);
    }

    public function RunSearch(Request $request) {
        $validator = Validator::make($request->all(), [
            'topic' => 'nullable|string',
            'text' => 'nullable|string',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = (object)[
            'title' => 'Поиск по сервисам',
            'route_name' => $this->route_name,
            'services' => Service::SerachItems($request)
        ];
        if ($request->has('topic')) {
            $data->old_topic = $request->topic;
        }
        if ($request->has('text')) {
            $data->old_text = $request->text;
        }
        if ($request->has('date_start')) {
            $data->old_date_start = $request->date_start;
        }
        if ($request->has('date_end')) {
            $data->old_date_end = $request->date_end;
        }

        return view('admin.services.main', ['page' => $data]);
    }

    public function Delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int|exists:services,id'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        if (Service::DeleteService($request->id)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    public function Create(Request $request) {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string|min:1|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $image = null;
        $preview_image = null;

        $image = uniqid('img_').'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/images/services/'), $image);
        $preview_image = ImageHandler::CreatePreview(
            'assets/images/services/'.$image,
            'assets/images/services/',
            $request->image->getClientOriginalExtension(),
            450, 450
        );

        if (Service::CreateService($request->topic, $request->text, $image, $preview_image)) {
            return response()->json([
                'service_id' => Service::GetLast()->id,
                'image' => $preview_image,
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function Edit(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int|exists:services,id',
            'topic' => 'required|string|min:1|max:255',
            'text' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $image = null;
        $preview_image = null;
        if (isset($request->image)) {
            $service = Service::GetService($request->id);
            ImageHandler::DeleteImages('/assets/images/services/', [
                $service->image, $service->preview_image
            ]);
            $image = uniqid('img_').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/images/services/'), $image);
            $preview_image = ImageHandler::CreatePreview(
                'assets/images/services/'.$image,
                'assets/images/services/',
                $request->image->getClientOriginalExtension(),
                450, 450
            );
        }
        if ($image == null && $preview_image == null) {
            if (Service::UpdateService($request->id, $request->topic,$request->text)) {
                return response()->json([
                    'status' => 'success'
                ]);
            }
            return response()->json([
                'status' => 'error',
            ]);
        }
        if (Service::UpdateService($request->id, $request->topic,$request->text, $image, $preview_image)) {
            return response()->json([
                'status' => 'success',
                'new_image' => $preview_image
            ]);
        }
        return response()->json([
            'status' => 'error',
        ]);
    }
}
