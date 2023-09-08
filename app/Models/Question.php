<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $fillable = ['question', 'user_id'];

    public function users(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function options(){
        return $this->HasMany('App\Models\Option','question_id', 'id');
    }
    
    public function votes(){
        return $this->HasMany('App\Models\Voter','question_id', 'id');
    }
}
