<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function CreateOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }
        $data = array(
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'date' => $request->get('date'),
            'timeMessage' => $request->get('time'),
            'textMessage' => $request->get('message'),
        );
        Mail::send('email.order', $data, function ($message) use ($data) {
            $message->to(Contact::GetEmail()->email);
            $message->subject('Заказ звонка | '.$data['phone'].' | '.$data['date']);
        });
        return response()->json([
            'status' => 'success'
        ]);
    }
}
