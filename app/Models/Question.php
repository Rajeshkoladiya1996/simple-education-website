<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = [
        'user_id','course_admin','course_id','question','reply','status'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}