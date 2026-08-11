<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Grammar;

class GrammarExample extends Model
{
    protected $fillable = [
        'grammar_id',
        'korean_sentence',
        'english_translation',
    ];

    public function grammar(): BelongsTo
    {
        return $this->belongsTo(Grammar::class);
    }
}