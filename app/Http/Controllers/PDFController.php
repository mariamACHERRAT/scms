<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($courseId)
    {
        $course = Course::with('sections')->findOrFail($courseId);

        $data = [
            'course' => $course
        ];

        $pdf = PDF::loadView('coursePdf', $data);

        return $pdf->download('course.pdf');
    }
}



