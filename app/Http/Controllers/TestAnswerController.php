<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\TestResult;
use App\Models\TestAnswer;
use App\Models\Section;
use App\Models\Choice;
use Illuminate\Http\Request;

class TestAnswerController extends Controller
{
    public function showresult(Section $section, TestResult $result)
    {
        // Perform any necessary logic to display the test result
        return view('test-result', compact('section', 'result'));
    }
    public function submit(Request $request, Section $section)
    {
        // dd($request);
        $answers = $request->input('answers');
        $totalQuestions = count($answers);
        $score = 0;
    
        foreach ($answers as $key=>$answers) {
            $question = Question::find($key);
            $qs = 0;
            $correctChoices = $question->choices()->where('is_correct', true)->get();
             $numCorrectChoices = $correctChoices->count();
            foreach ($answers as $k => $answer) {
                $result = new TestAnswer;
            $result->user_id = auth()->user()->id; 
            $result->question_id = $key; 
            $result->choice_id = $answer; 
            $result->save();
            $answerData = Choice::find($answer);

            
            if ($answerData->is_correct) {
                $qs ++;
              
            }
            }
            $score += $qs /$numCorrectChoices;
            
        }
        $calculatedScore = ($score / $totalQuestions) * 20;
        $finalScore = min($calculatedScore, 20);
        // Store the test result for the current student
        $result = new TestResult;
        $result->section_id = $section->id;
        $result->user_id = auth()->user()->id; // Assuming you have authentication implemented
        $result->score = $calculatedScore;
        $result->save();
    
        return redirect()->route('tests.result', [$section, $result]);
    }
}
