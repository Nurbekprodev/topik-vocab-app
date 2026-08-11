<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\GrammarExample;
use App\Models\UserGrammarProgress;
use App\Models\Quiz;

class Grammar extends Model
{
    protected $fillable = [
        'title',
        'meaning',
        'explanation',
        'level',
        'order_number',
        'structure',
        'rules',
        'usage_notes',
        'commonly_used_with',
        'common_mistakes',
    ];

    public function examples(): HasMany
    {
        return $this->hasMany(GrammarExample::class);
    }

    public function userProgress(): HasMany
    {
        return $this->hasMany(UserGrammarProgress::class);
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
}