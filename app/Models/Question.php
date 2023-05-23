<?php

namespace App\Models;
use App\Models\Section;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
