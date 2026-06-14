<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','course_id','semester'];

     public function students()
    {
        return $this->belongsTo(Student::class);
    }

     public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
