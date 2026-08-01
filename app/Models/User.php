<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UserVocabularyProgress;
use App\Models\UserGrammarProgress;

class User extends Authenticatable
{
    public function vocabularyProgress(): HasMany
    {
        return $this->hasMany(UserVocabularyProgress::class);
    }

    public function grammarProgress(): HasMany
    {
        return $this->hasMany(UserGrammarProgress::class);
    }
}