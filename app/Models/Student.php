<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
     use HasFactory;

    protected $fillable = ['name','email','department_id','photo'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

     public function department()
    {
        return $this->belongsTo(Department::class);
    }

     public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function events()
   {
    return $this->belongsToMany(Event::class)->withPivot('department_id');
   }
}
