<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;
    protected $table = "votes";
    protected $fillable = ['question_id', 'option_id', 'selected_option', 'email'];

    public function questions(): BelongsTo
    {
        return $this->belongsTo('App\Models\Question', 'question_id', 'id');
    }
    public function options(): BelongsTo
    {
        return $this->belongsTo('App\Models\Option', 'option_id', 'id');
    }
}
