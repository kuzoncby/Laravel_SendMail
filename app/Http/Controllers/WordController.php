<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;

class WordController extends Controller
{
    public function create($word)
    {
        // 陈博洋20161121-20161125周工作报告
        // Read doc
//        $file = '/home/vagrant/Code/PHPStormProjects/Laravel_SendMail/public/base.docx';
        $file = '/home/kuzoncby/Code/PHPStormProjects/Laravel_SendMail/public/base.docx';
        $end = $word['end'];

        $start = $word['start'];

        $templateProcessor = new TemplateProcessor($file);

        $templateProcessor->setValue('start_day', $start);
        $templateProcessor->setValue('end_day', $end);

        $templateProcessor->setValue('did1', '数据平台图表');
        $templateProcessor->setValue('did2', '整合Hive数据平台');

        $templateProcessor->setValue('failed1', 'Kubernetes Ingress(1.2)');

        $templateProcessor->setValue('planning1', '迁移Hadoop Web API');
        $templateProcessor->setValue('planning2', '制造更多图表');
        $templateProcessor->setValue('planning3', '编写测试');

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
