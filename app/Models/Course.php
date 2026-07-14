<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    Use HasFactory;

    protected $fillable = ['course_name','department_id','teacher_id','day','start_time','end_time'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }

    
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
