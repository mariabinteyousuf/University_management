<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','department1_id','department2_id','time'];

    public function departmentOne()
{
    return $this->belongsTo(Department::class,'department1_id');
}

public function departmentTwo()
{
    return $this->belongsTo(Department::class,'department2_id');
}

public function students()
{
    return $this->belongsToMany(Student::class)->withPivot('department_id');
}
}
