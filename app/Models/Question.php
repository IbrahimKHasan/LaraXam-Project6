<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'question_body',
        'exam_id',
    ];
    public function exam(){
        return $this->belongsTo('App\Models\Exam','question_id','exam_id');
    }
    public function answers(){
        return $this->hasMany('App\Models\Answer','question_id','question_id');
    }
}
