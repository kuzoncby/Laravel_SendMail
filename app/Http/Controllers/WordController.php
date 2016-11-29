<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;

class WordController extends Controller
{
    public function create($word)
    {
        // 陈博洋20161121-20161125周工作报告
        // Read doc
        $file = '/home/vagrant/Code/PHPStormProjects/Laravel_SendMail/public/base.docx';

        $end = $word['end'];

        $start = $word['start'];

        $templateProcessor = new TemplateProcessor($file);

        $templateProcessor->setValue('start_day', $start);
        $templateProcessor->setValue('end_day', $end);

        $templateProcessor->setValue('was', '完成PySpark和Spark集群的对接');
        $templateProcessor->setValue('is', '修复邮件（Spark破坏了DNS和域认证，邮件没有自动发送）');
        $templateProcessor->setValue('will_be', '完成PySpark和网站的对接即HDFS文件的自动上传');
        $templateProcessor->setValue('will_be_two', '完成深度学习框架的调研');

        if ($word['content'] != null) {
            $templateProcessor->setValue('note', '注意：' . $word['content']);
        } else {
            $templateProcessor->setValue('note', date('Ymd'));
        }

        $target = '陈博洋' . $start . '-' . $end . '周工作报告';

        $templateProcessor->saveAs($target . '.docx');
        return $target;
    }
}
