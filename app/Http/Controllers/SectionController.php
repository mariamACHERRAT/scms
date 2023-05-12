<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function create()
    {
        return view('add-section');
    }

    public function store(Request $request)
    {
        $section = new Section;
        $section->title = $request->title;
        $section->content = $request->content;
        $section->type = $request->type;
        $section->save();

        return redirect('/sections/'.$section->id);
    }

    public function show(Section $section)
    {
        return view('sections.show', compact('section'));
    }
}
