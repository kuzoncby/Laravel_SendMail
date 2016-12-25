<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;

class WordController extends Controller
{
    public function create($word)
    {
        // 陈博洋20161121-20161125周工作报告
        // Read doc
        $file = '/home/vagrant/Code/Laravel_SendMail/public/base.docx';

        $end = $word['end'];

        $start = $word['start'];

        $templateProcessor = new TemplateProcessor($file);

        $templateProcessor->setValue('start_day', $start);
        $templateProcessor->setValue('end_day', $end);

        $templateProcessor->setValue('was', '开始使用TensorFlow');
        $templateProcessor->setValue('was_two', '从Hbase中导出数据而不是HDFS');
        $templateProcessor->setValue('is', '显示图表（JS人不够）');
        $templateProcessor->setValue('will_be', '数据平台图表');
        $templateProcessor->setValue('will_be_two', '整合Hive入数据平台');

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
