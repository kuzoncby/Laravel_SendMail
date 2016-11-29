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
        $end = 20161125;
        $start = date('Ymd', strtotime($end . '- 4 days'));

        $mail = [
            'end' => $end,
            'start' => $start,
            'target' => [
                'chenby@openbigdata.org.cn',
//                'lijd@openbigdata.org.cn',
//                'cheng@openbigdata.org.cn',
//                'niuy@openbigdata.org.cn',
//                'chidx@openbigdata.org.cn',
//                'liudx@openbigdata.org.cn',
//                'lihs@openbigdata.org.cn'
            ],
            'subject' => '测试邮件-主题',
            'logo' => [
                'alt' => 'obd',
                'href' => 'http://cdn.wallpapersafari.com/76/63/SiYTkU.jpg',
            ],
            'name' => '各位中云的长官们，同事们，朋友们',
            'content' => '根据最新的指示更新了此报告。上星期Spark造成发工作报告的设备出了一些问题，给各位长官们和同事们带来麻烦。我深表歉意，同时将会尽快修复这个问题，加强同事之间的沟通，为公司的成功作出应有的贡献。这封邮件在' . date('Y-m-d H:i:s e') . '重新发出。',
            'copyright' => 'Copyright &copy;' . date('Y'),
            'file' => '/home/vagrant/Code/PHPStormProjects/Laravel_SendMail/public/'
        ];
        $word = new WordController();
        $name = $word->create($mail);
        $mail['subject'] = $name;
        $mail['file'] = $mail['file'] . $name . '.docx';
        Mail::to($mail['target'])->send(new WorkReport($mail));
        return redirect('/');
    }
}
