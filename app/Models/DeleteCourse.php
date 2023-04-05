<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeleteCourse extends Model
{
    protected $table = 'delete_course';
    protected $fillable = [
        'user_id','course_id','status'
    ];

}