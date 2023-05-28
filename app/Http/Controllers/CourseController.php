<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use App\Models\Section;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $courses = Course::where('user_id', $user->id)->get();
        return view('teacher_courses', compact('courses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("add_course");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $request->validate([
        //     "title"=>"required",
        //     "image"=>"required",
        //     "content"=>"required",
        //     "user_id"=>"required",

        // ]);
    
        // create a new course record
        $course = new Course();
        $course->title = $request->title;
        $course->content=$request->content;
        $course->skills=$request->skills;
        $course->user_id = $request->user_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $course->image = $filename;
        }
        
        
        $course->save(); 
    
        return redirect("/courses");
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function show($id)
{
    $course = Course::with('sections')->findOrFail($id);
    return view('course_details', compact('course'));
}

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('edit_course', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
        public function update(Request $request, $id){
            // retrieve the course record
            $course = Course::findOrFail($id);
        
            // update the course record with the new values
            $course->title = $request->title;
            $course->content=$request->content;
            $course->skills=$request->skills;
            $course->user_id = $request->user_id;
        
            // check if a new image was uploaded
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
        
                // delete the old image if it exists
                if ($course->image) {
                    $oldImage = public_path('images/' . $course->image);
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
        
                // update the course record with the new image filename
                $course->image = $filename;
            }
        
            // save the updated course record
            $course->save();
        
            // redirect to the courses index page
            return redirect("/courses");
        }
        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // retrieve the course record
        $course = Course::findOrFail($id);
    
        // delete the related sections
        $course->sections()->delete();
    
        // delete the course record
        $course->delete();
    
        // redirect to the courses index page
        return redirect("/courses");
    }
//publish
public function publish(Course $course)
{
    $course->is_publick = true;
    $course->save();

    // Redirect or return a response as needed
    return redirect()->back()->with('success', 'Course published successfully.');
}




//display courses 

public function display()
{
    $courses = Course::where('is_publick', true)->get();
    return view('cours', compact('courses'));
}


public function viewAnswers($sectionId)
    {
        $section = Section::findOrFail($sectionId);
        
        // Check if the logged-in user is the professor who created the section
        if ($section->course->professor_id !== Auth::user()->id) {
            abort(403, 'Unauthorized');
        }
        
        $answers = $section->answers;
        
        return view('professor-view-answers', compact('section', 'answers'));
    }
}
