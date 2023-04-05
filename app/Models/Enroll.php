<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $table = 'enroll_course';
    protected $fillable = [
        'user_id','course_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id')->with('user');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Enroll', 'user_id');
    }
    


}