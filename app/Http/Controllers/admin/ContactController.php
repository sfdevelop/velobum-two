<?php
namespace App\Http\Controllers\Admin;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller {
    public function Update(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'tel' => 'required|string|min:1|max:255',
            'addresses' => 'required|string|min:1|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        if (Contact::UpdateContacts($request->email, $request->tel, $request->addresses)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    public function Get() {
        return response()->json(Contact::GetContacts());
    }
}