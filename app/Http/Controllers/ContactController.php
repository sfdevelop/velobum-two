<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function Run() {
        $data = (object)[
            'title' => $_SERVER['SERVER_NAME'].' | Наші контакти',
        ];
        return view('contacts', ['page' => $data]);
    }

    public function SendEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'name' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = array(
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'textMessage' => $request->get('message'),
            'name' => $request->get('name')
        );
        Mail::send('email.support', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to(Contact::GetEmail()->email);
            $message->subject($data['title'].' | Отправлено с '.$_SERVER['SERVER_NAME']);
        });
        return redirect()->back()->with('message', 'Ваше повідомлення успішно відправлено');
    }
}
