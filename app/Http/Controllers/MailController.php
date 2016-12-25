<?php

namespace App\Http\Controllers;

use App\Mail\WorkReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    /**
     * Send mail
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function send(Request $request)
    {

//        $end = date('Ymd');
        $end = 20161223;
        $start = date('Ymd', strtotime($end . '- 4 days'));

        $mail = [
            'end' => $end,
            'start' => $start,
            'target' => [

            ],// Email Address
            'subject' => '尊敬的陈总，牛总和迟总',
            'logo' => [
                'alt' => 'obd',
                'href' => 'http://cdn.wallpapersafari.com/76/63/SiYTkU.jpg',
            ],
            'name' => '尊敬的陈总，牛总和迟总',
            'content' => '根据' . date('Y-m-d H:i:s') . '的指示更新报告。',
            'copyright' => 'Copyright &copy;' . date('Y'),
            'file' => '/home/vagrant/Code/Laravel_SendMail/public/'
        ];
        $word = new WordController();
        $name = $word->create($mail);
        $mail['subject'] = $name;
        $mail['file'] = $mail['file'] . $name . '.docx';
        Mail::to($mail['target'])->send(new WorkReport($mail));
        return redirect('/');
    }
}
