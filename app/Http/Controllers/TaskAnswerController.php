<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Section;
use App\Models\TaskAnswer;
use Illuminate\Support\Facades\Redirect;
use Auth;

use Illuminate\Http\Request;

class TaskAnswerController extends Controller
{

    public function showTaskAnswers($sectionId)
    {
        $section = Section::findOrFail($sectionId);
        $taskAnswers = TaskAnswer::where('section_id', $sectionId)->get();
    
        return view('task-answers', compact('section', 'taskAnswers'));
    }
    public function showTaskAnswersForStudent($sectionId)
    {
        $section = Section::findOrFail($sectionId);
        $taskAnswer = TaskAnswer::where('section_id', $sectionId)
            ->where('user_id', Auth::user()->id)
            ->first();
    
        return view('show_section', compact('section', 'taskAnswer'));
    }
    
    public function sendTaskAnswer(Request $request, $userName, $sectionId)
    {
    // Find the user by their name
    $section = Section::findOrFail($sectionId);
    $user = User::where('name', $userName)->first();

    if (!$user) {
        // Handle the case where the user is not found
        return redirect()->back()->with('error', 'User not found');
    }

    // Create a new task answer instance
    $taskAnswer = new TaskAnswer();
    $taskAnswer->user_id = $user->id;
    $taskAnswer->section_id = $section->id;
    $taskAnswer->task_answer = $request->input('task_answer');
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $fileName);
        $taskAnswer->answer_file = $fileName;
    }
    $taskAnswer->save();

    // Logic to notify the teacher about the request
    // You can send a notification or an email to the teacher informing about the request

    // Redirect back with a success message
    return Redirect::route('sections.index')->with('success', 'Request sent successfully');

}

public function sendScore(Request $request, $taskAnswerId)
{
    // Find the task answer by its ID
    $taskAnswer = TaskAnswer::findOrFail($taskAnswerId);

    // Update the task answer with the submitted score and feedback
    $taskAnswer->note = $request->input('note');
    $taskAnswer->point = $request->input('point');
    $taskAnswer->save();

    // Redirect back or to any other page as needed
    return redirect()->back()->with('success', 'Score sent successfully');
}  


}
