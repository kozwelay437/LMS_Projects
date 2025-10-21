<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_title',
        'description',
        'document',
        'upload_date',
        'due_date',
    ];

    protected $casts = [
        'upload_date' => 'datetime',
        'due_date' => 'datetime',
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

