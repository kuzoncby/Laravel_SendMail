<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        // Mail::to($request->user())->send(new OrderShipped($order));
        $data = array(
            'name' => "陈博洋的测试邮件-数据",
        );

        Mail::send('emails.welcome', $data, function ($message) {

            $message->from('chenby@openbigdata.org.cn', '陈博洋的测试邮件-来自');

            $message->to('chenby@openbigdata.org.cn')->subject('陈博洋的测试邮件-主题');

        });
        return view('emails.welcome');
    }
}
