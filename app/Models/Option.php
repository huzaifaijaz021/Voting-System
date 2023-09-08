<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory;
    protected $table = "options";
    protected $fillable = ['option1','option2','option3','option4', 'question_id'];

    public function questions(): BelongsTo
    {
        return $this->belongsTo('App\Models\Question', 'question_id', 'id');
    }
    public function votes(){
        return $this->HasMany('App\Models\Voter','option_id', 'id');
    }
}
