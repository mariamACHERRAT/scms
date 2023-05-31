<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
{
    $courses = Course::with('sections')->get();

    $data = [
        'title' => 'Welcome to ItSolutionStuff.com',
        'date' => date('m/d/Y'),
        'courses' => $courses
    ];

    $pdf = PDF::loadView('course_details', $data);

    return $pdf->download('itsolutionstuff.pdf');
 } }


