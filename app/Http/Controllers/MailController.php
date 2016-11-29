<?php

namespace App\Http\Controllers;

use App\Mail\WorkReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function view(Request $request)
    {
        $mail = [
            'target' => [
                'chenby@openbigdata.org.cn',
                'liudx@openbigdata.org.cn',
                'lihs@openbigdata.org.cn'
            ],
            'subject' => '测试邮件-主题',
            'logo' => [
                'alt' => 'obd',
                'href' => 'http://cdn.wallpapersafari.com/76/63/SiYTkU.jpg',
            ],
            'name' => '各位长官们，同事们',
            'content' => '你们两个看这个邮件不能不正确显示。' . date('Y-m-d H:i:s e'),
            'copyright' => 'Copyright &copy;' . date('Y')
        ];
        return view('emails.demo', compact('mail'));
    }

    /**
     * Send mail
     * @param Request $request
     * @return array
     */
    public function send(Request $request)
    {
        $mail = [
            'target' => [
                'chenby@openbigdata.org.cn',
                'liudx@openbigdata.org.cn',
                'lihs@openbigdata.org.cn'
            ],
            'subject' => '测试邮件-主题',
            'logo' => [
                'alt' => 'obd',
                'href' => 'http://cdn.wallpapersafari.com/76/63/SiYTkU.jpg',
            ],
            'name' => '各位长官们，同事们',
            'content' => '你们两个看这个邮件不能不正确显示。' . date('Y-m-d H:i:s e'),
            'copyright' => 'Copyright &copy;' . date('Y')
        ];
        Mail::to($mail['target'])->send(new WorkReport($mail));
        return $mail;
    }
}
