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

        // Adding Text element to the Section having font styled by default...
        $section->addText(
            htmlspecialchars(
                '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
            )
        );

        // Saving the document as DOC file...
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('HelloWorld.docx');
        return redirect('/');
    }
}
