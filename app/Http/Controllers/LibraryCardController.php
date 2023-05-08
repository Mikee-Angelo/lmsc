<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\Student;
use App\Models\StudentId;

class LibraryCardController extends Controller
{
    //
    public function show(StudentId $student_id) { 

        $fpdi = new FPDI; 
        $filePath = public_path("pdf/library_card.pdf");
        $count = $fpdi->setSourceFile($filePath); 

        for ($i = 1; $i <= $count; $i++) { 
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $fpdi->SetFont("helvetica", "", 12);
        
            //Library Card No.
            $left = $size['width'] / 2 - 15;
            $top = ($size['height'] / 2) - 42;
            $text = 1000;
            $fpdi->Text($left,$top,$text);

            //Student No.
            $left = $size['width'] / 2 - (15 + strlen($student_id->student_number));
            $top = ($size['height'] / 2) - 33.5;
            $text = $student_id->student_number;
            $fpdi->Text($left,$top,$text);

            //Student Name
            $left = $size['width'] / 2 - (23 + strlen($student_id->student_latest->name));
            $top = ($size['height'] / 2) - 14;
            $text = $student_id->student_latest->name;
            $fpdi->Text($left,$top,$text);

            //Program
            $left = $size['width'] / 2 + (30 - strlen($student_id->student_latest->course));
            $top = ($size['height'] / 2) - 14;
            $text = $student_id->student_latest->course;
            $fpdi->Text($left,$top,$text);
        }

        $fpdi->Output();
    }
}
