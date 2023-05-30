<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\TaskAnswer;
use App\Models\Question;
use Auth;

use App\Models\Choice;


class SectionController extends Controller
{
    public function index()
    {
        

        return view('course_details');
    }
    public function create($id)
    {
        return view('add-section', compact("id"));
    }



public function store(Request $request)
{
    // dd($request);
    
    $section = new Section;
    $section->title = $request->title;
    $section->content = $request->content ?? null;
    $section->type = $request->type;
    $section->small_title = $request->small_title ?? null;
    $section->video_link = $request->video_link ?? null;
    $section->description = $request->description ?? null;
    $section->course_id = $request->id;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $fileName);
        $section->section_file = $fileName;
    }
    $section->save();

    if ($request->type === 'test') {
        $questions = $request->input('questions');
    
        foreach ($questions as $index => $question) {
            
            // Check if the question is not empty
            if (!empty($question)) {
                $newQuestion = new Question;
                $newQuestion->question = $question["question"];
                $newQuestion->answer_type = $question["answer_type"];
                $newQuestion->section_id = $section["id"];
                $newQuestion->save();
               
                if (isset($question["choices"])) { // Check if choices exist for the current question
                    $qchoices = $question["choices"];
                    $correct = $question["is_correct"];
                    foreach ($qchoices as $key => $value) {
                        $choice = new Choice; // Create a new Choice instance
                        $choice->question_id = $newQuestion->id;
                        $choice->choice = $value;
                        $choice->is_correct = in_array($key, $correct);
                        $choice->save();
                    }
                }
            }
        }
    } 

    return redirect('/sections/'.$section->id);
}









    public function show($id)
{
    $section = Section::findOrFail($id); // renvoie une erreur 404 si aucune section avec cet ID n'est trouvée
    
    $taskAnswer = TaskAnswer::where('section_id', $section->id)
            ->where('user_id', Auth::user()->id)
            ->first();
    
        return view('show_section', compact('section', 'taskAnswer')); // utilisez le nom de variable singulier pour correspondre à la vue
}

public function destroy($id)
{
    $section = Section::findOrFail($id); // renvoie une erreur 404 si aucune section avec cet ID n'est trouvée
    
    $section->delete(); // supprime la section de la base de données
    
    return redirect('/courses');
}


public function edit($id)
{
    $section = Section::find($id);

    return view('sections_edit', compact('section'));
}

public function update(Request $request, $id)
{
    $section = Section::find($id);

    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required_if:type,text',
        'video_link' => 'required_if:type,video',
        'description' => 'required_if:type,task',
    ]);

    $section->title = $validatedData['title'];
    $section->type = $request->input('type');

    if ($request->input('type') === 'text') {
        $section->content = $validatedData['content'];
        $section->video_link = null;
        $section->description = null;
    } elseif ($request->input('type') === 'video') {
        $section->content = null;
        $section->video_link = $validatedData['video_link'];
        $section->description = null;
    } elseif ($request->input('type') === 'task') {
        $section->content = null;
        $section->video_link = null;
        $section->description = $validatedData['description'];

    }

    $section->save();

    return redirect('/sections/'.$section->id);
}



  
}
