<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sections()
{
    return $this->hasMany('App\Models\Section');
} public function professor()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function acceptedStudents()
{
    return $this->belongsToMany(User::class, 'requests')->wherePivot('status', 'accepted');
}



    protected $fillable = ['title', 'image', 'content', 'skills','user_id,is_publick'];

}

