<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer_id',
        'answer_body',
        'answer_status',
        'question_id'
    ];

    public function question(){
        return $this->belongsTo('App\Models\Question');
    }
}
