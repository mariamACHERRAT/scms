<?php

namespace App\Models;
use App\Models\User;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    use HasFactory;
    protected $table = "tests_answers";
    protected $fillable = ["score"];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'user_id');
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class, 'user_id');
    }

}
