<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\TaskAnswerController;

use App\Http\Middleware\CheckRoles;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cours', [CourseController::class, 'display'])->name('cours');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.show');

//forgot password 
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
     ->middleware('guest')
     ->name('password.request');

// Envoyer l'e-mail de réinitialisation du mot de passe
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
     ->middleware('guest')
     ->name('password.email');

// Afficher le formulaire de réinitialisation du mot de passe
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
     ->middleware('guest')
     ->name('password.reset');

// Réinitialiser le mot de passe
Route::post('/reset-password', [NewPasswordController::class, 'store'])
     ->middleware('guest')
     ->name('password.update');


// Connecter l'utilisateur et rediriger selon le rôle

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('role:is_admin')->group(function () {
        //student
        Route::get("/student",[StudentController::class,"student_list"])->name("student_list");
        Route::get("/student/create",[StudentController::class,"create"])->name("student.create");
        Route::post("/students", [StudentController::class, "store"])->name("students.store");
        Route::get('/students/{id}/edit',[StudentController::class,"edit"])->name('students.edit');
        Route::put('/students/{id}',[StudentController::class,"update"])->name('students.update');
        Route::delete('/students/{id}',[StudentController::class,"destroy"])->name('students.destroy');

        //teacher

        Route::get("/teacher",[TeacherController::class,"teacher_list"])->name("teacher_list");
        Route::get("/teacher/create",[TeacherController::class,"create"])->name("teacher.create");
        Route::get("store",[TeacherController::class,"store"])->name('teacher-store');
        Route::get('/teachers/{id}/edit',[TeacherController::class,"edit"])->name('teachers.edit');
        Route::put('/teachers/{id}',[TeacherController::class,"update"])->name('teachers.update');
        Route::delete('/teachers/{id}',[TeacherController::class,"destroy"])->name('teachers.destroy');



    });

    Route::middleware('role:is_prof')->group(function () {
        //coure
        Route::get("/courses",[CourseController::class,"index"])->name("teacher_coureses");
        Route::get("/course/create",[CourseController::class,"create"])->name("course.create");
        Route::post("store",[CourseController::class,"store"])->name('courses.store');
        Route::get('/courses/{id}/edit',[CourseController::class,"edit"])->name('courses.edit');
        Route::put('/courses/{id}',[CourseController::class,"update"])->name('courses.update');
        Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
       Route::get('/courses/{course}/publish',[CourseController::class, 'publish'])->name('publish-course');
       Route::post('/task-answers/{taskAnswerId}/send-score', [TaskAnswerController::class, 'sendScore'])->name('send-score');

    //    Route::get('/sections/{section}/view-answers', [TaskAnswerController::class, 'viewAnswers'])->name('sections.view-answers');


        //section
        Route::get('/add-section', function () {
            return view('add-section');
        })->name("add.section");
        Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
        Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
        Route::get('/courses/{course_id}/sections/create', [SectionController::class, 'create'])->name('sections.create');
        Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
        Route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');
        Route::get('/sections/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');
        Route::put('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');


        //tasks answers
        Route::get('/task-answers/{sectionId}', [TaskAnswerController::class, 'showTaskAnswers'])->name('task-answers');




    });

    Route::get('/requests', [RequestController::class, 'showRequests'])->name('requests');
    Route::get('/sections/{id}', [SectionController::class, 'show'])->name('sections.show');
    Route::get('/send-request/{student_name}/{course_id}', [RequestController::class, 'sendRequest'])->name('send-request');
    Route::get('/confirm-request/{request}', [RequestController::class, 'confirmRequest'])->name('confirm-request');
    Route::get('/my-course',[StudentCourseController::class, 'myCourse'] )->name('my-course');
    
    Route::post('/send-task-answer/{userName}/{sectionId}', [TaskAnswerController::class, 'sendTaskAnswer'])->name('send-task-answer');
    Route::get('/task-answers/student/{sectionId}', [TaskAnswerController::class, 'showTaskAnswersForStudent'])->name('task-answers.student');





    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});



require __DIR__.'/auth.php';

// Route::post('/login', [AuthController::class, 'edit'])->name('profile.edit');





