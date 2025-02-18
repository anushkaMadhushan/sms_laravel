<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course'; 
    protected $fillable = ['name'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_courses');
    }
}
