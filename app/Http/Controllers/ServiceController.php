<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function Run() {
        $data = (object)[
            'title' => $_SERVER['SERVER_NAME'].' | Новини',
            'news' => Service::GetServicesForPublic(),
        ];
        return view('news', ['page' => $data]);
    }

    public function RunView($id) {
        $validator = Validator::make(
            [
                'id' => $id
            ],
            [
                'id' => 'required|int|exists:services,id',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back();
        }
        $news = Service::GetService($id);
        $data = (object)[
            'route_name' => $this->route_name,
            'title' => $_SERVER['SERVER_NAME'].' | '.$news->topic,
            'news' => $news,
            'last_news' => Service::GetLastT()
        ];
        return view('view_news', ['page' => $data]);
    }
}
