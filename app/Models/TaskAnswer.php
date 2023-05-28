<?php

namespace App\Models;
use App\Models\User;
use App\Models\Section;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAnswer extends Model
{
    use HasFactory;
    protected $table = "tasks_answers";
    protected $fillable = ['task_answer',"note","point","answer_file"];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'course_id');
    }
}