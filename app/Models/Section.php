<?php
namespace App\Models;
use App\Models\TaskAnswer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'small_title',
        'type',
        'video_link',
        'description',
        'content',
        'course_id',
        'students_answers'
        ,"section_file",
       "score" 
        
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function taskAnswers()
{
    return $this->hasMany(TaskAnswer::class);
}
 
}
