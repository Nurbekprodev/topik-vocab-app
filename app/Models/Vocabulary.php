<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\VocabularyExample;
use App\Models\UserVocabularyProgress;

class Vocabulary extends Model
{
    protected $fillable = [
        'korean_word',
        'english_meaning',
        'word_type',
        'level',
        'difficulty',
    ];

    public function examples(): HasMany
    {
        return $this->hasMany(VocabularyExample::class);
    }

    public function userProgress(): HasMany
    {
        return $this->hasMany(UserVocabularyProgress::class);
    }
}