<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Question;
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
    
    $section = new Section;
    $section->title = $request->title;
    $section->content = $request->content ?? null;
    $section->type = $request->type;
    $section->small_title = $request->small_title ?? null;
    $section->video_link = $request->video_link ?? null;
    $section->description = $request->description ?? null;
    $section->course_id = $request->id;
    $section->save();

    if ($request->type === 'test') {
        $questions = $request->input('questions');
        $answerTypes = $request->input('answer_types');
        $textAnswers = $request->input('text_answers');
    
        foreach ($questions as $index => $question) {
            $answerType = $answerTypes[$index];
            
            // Check if the question is not empty
            if (!empty($question)) {
                $newQuestion = new Question;
                $newQuestion->question = $question;
                $newQuestion->answer_type = $answerType;
                $newQuestion->section_id = $section->id;
                $newQuestion->save();
               
                if (isset($request["choices_".$index+1])) { // Check if choices exist for the current question
                    $qchoices = $request["choices_".$index+1];
                    foreach ($qchoices as $key => $value) {
                        $choice = new Choice; // Create a new Choice instance
                        $choice->question_id = $newQuestion->id;
                        $choice->choice = $value["choice"];
                        $choice->is_correct = $value["is_correct"];
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
    
    return view('show_section', compact('section')); // utilisez le nom de variable singulier pour correspondre à la vue
}

public function destroy($id)
{
    $section = Section::findOrFail($id); // renvoie une erreur 404 si aucune section avec cet ID n'est trouvée
    
    $section->delete(); // supprime la section de la base de données
    
    return redirect('/courses')->with('success', 'La section a été supprimée avec succès.');
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

    return redirect()->route('sections');
}





  
}
