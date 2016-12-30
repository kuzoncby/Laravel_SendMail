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
     * @return mixed
     */
    public function send(Request $request)
    {

//        $end = date('Ymd');
        $end = 20161230;
        $start = date('Ymd', strtotime($end . '- 4 days'));

        $mail = [
            'end' => $end,
            'start' => $start,
            'target' => [
                'homestead@example.com'
            ],
            'subject' => '测试邮件-主题',
            'logo' => [
                'alt' => 'obd',
                'href' => 'http://cdn.wallpapersafari.com/76/63/SiYTkU.jpg',
            ],
            'name' => '女士们先生们，来宾们朋友们',
            'content' => '根据' . date('Y-m-d') . '最新的指示更新了此报告。',
            'copyright' => 'Copyright &copy;' . date('Y'),
//            'file' => '/home/vagrant/Code/PHPStormProjects/Laravel_SendMail/public/'
            'file' => '/home/kuzoncby/Code/PHPStormProjects/Laravel_SendMail/public/'
        ];
        $word = new WordController();
        $name = $word->create($mail);
        $mail['subject'] = $name;
        $mail['file'] = $mail['file'] . $name . '.docx';
        Mail::to($mail['target'])->send(new WorkReport($mail));
        return redirect('/');
    }
}
