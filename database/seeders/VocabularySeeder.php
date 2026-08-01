<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vocabulary;

class VocabularySeeder extends Seeder
{
    public function run(): void
    {
        Vocabulary::create([
            'korean_word' => '학교',
            'english_meaning' => 'school',
            'word_type' => 'noun',
            'level' => 'TOPIK 1',
            'difficulty' => 'easy',
        ]);

        Vocabulary::create([
            'korean_word' => '친구',
            'english_meaning' => 'friend',
            'word_type' => 'noun',
            'level' => 'TOPIK 1',
            'difficulty' => 'easy',
        ]);

        Vocabulary::create([
            'korean_word' => '공부하다',
            'english_meaning' => 'to study',
            'word_type' => 'verb',
            'level' => 'TOPIK 1',
            'difficulty' => 'easy',
        ]);
    }
}