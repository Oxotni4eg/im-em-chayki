<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $result = false;

        if($request->ajax() && !empty($request->all()))
        {
            $sender = $request;
            var_dump($sender);
            Mail::send('emails.default', ['sender' => $sender], function($message) use ($sender) {
                $message->from($sender->InputEmail, $sender->InputSender);
                $message->to(env('MAIL_ADMIN_EMAIL'));
                $message->subject('Новое сообщение от клиента !');
            });

            $result = true;
        }

        return response()->json(['result' => $result]);
    }
}
