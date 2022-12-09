<?php

namespace App\Http\Controllers;

use App\OnePage;

class OnePageController extends Controller
{
    public function PageAbout() {
        $data = (object)[
            'title' => 'Про нас',
            'about' => OnePage::GetItem(1)->value
        ];
        return view('text_page', ['page' => $data]);
    }
    public function PageService() {
        $data = (object)[
            'title' => 'Сервіс',
            'about' => OnePage::GetItem(2)->value
        ];
        return view('text_page', ['page' => $data]);
    }
    public function PageBicycleCosmetics() {
        $data = (object)[
            'title' => 'Велокосметика',
            'about' => OnePage::GetItem(3)->value
        ];
        return view('text_page', ['page' => $data]);
    }
    public function PageInstruments() {
        $data = (object)[
            'title' => 'Інструменти',
            'about' => OnePage::GetItem(4)->value
        ];
        return view('text_page', ['page' => $data]);
    }
}
