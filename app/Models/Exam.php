<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'exam_name',
        'exam_description',
        'exam_image'
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User','exam_id','exam_id');
    }

    public function questions(){
        return $this->hasMany('App\Models\Question','exam_id','exam_id');
    }
}
