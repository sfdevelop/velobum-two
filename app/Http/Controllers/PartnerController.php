<?php

namespace App\Http\Controllers;

use App\Partner;

class PartnerController extends Controller
{
    public function Page() {
        return view('partners', ['partners' => Partner::GetAll()]);
    }
}
