<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['assignment_id', 'type', 'question', 'options', 'correct_answer'];
protected $casts = ['options' => 'array'];

public function assignment()
{
    return $this->belongsTo(Assignment::class);
}

}
