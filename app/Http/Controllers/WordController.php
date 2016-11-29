<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class WordController extends Controller
{
    public function create(Request $request)
    {
        // Creating the new document...
        $phpWord = new PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...

        $section = $phpWord->addSection();
        $header = array('size' => 14, 'bold' => true);

        $title = '陈博洋' . date('Ymd') . '周工作报告';

        $section->addTitle($title);
        $table = $section->addTable();

        $table->addRow();
        $table->addCell(3000)->addText('本周完成的工作');
        $table->addCell(3000)->addText('本周没完成的计划工作及原因');
        $table->addCell(3000)->addText('下周工作计划');

        $table->addRow(900);
        $table->addCell(3000)->addText('听从长官的命令');
        $table->addCell(3000)->addText('无');
        $table->addCell(3000)->addText('等候长官的命令');

//        for ($r = 1; $r <= 8; $r++) {
//            $table->addRow();
//            for ($c = 1; $c <= 5; $c++) {
//                $table->addCell(1750)->addText("Row {$r}, Cell {$c}");
//            }
//        }

        // Saving the document as DOC file...
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($title . '.docx');
        return redirect('/');
    }
}
