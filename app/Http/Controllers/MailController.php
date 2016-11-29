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

        ];
        $word = new WordController();
        $name = $word->create($mail);
        $mail['subject'] = $name;
        $mail['file'] = $mail['file'] . $name . '.docx';
        Mail::to($mail['target'])->send(new WorkReport($mail));
        return redirect('/');
    }
}
