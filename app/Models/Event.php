<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','department_id','time'];

    public function department()
{
    return $this->belongsTo(Department::class);
}

public function students()
{
    return $this->belongsToMany(Student::class);
}
}
