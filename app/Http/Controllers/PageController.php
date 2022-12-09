<?php

namespace App\Http\Controllers;

class PageController extends Controller {
    public function RunIndex() {
        $data = (object)[
            'route_name' => $this->route_name,
            'title' => $_SERVER['SERVER_NAME'].' | Головна сторінка',
            'slides' => \App\Slide::GetItemsStatic(),
            'last_share_items' => \App\Item::GetItemForMainPage(4, true),
            'last_news' => \App\Service::GetLastStatic()
        ];
        return view('index', ['page' => $data]);
    }
}
