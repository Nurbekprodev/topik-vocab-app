<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vocabulary;

class VocabularySeeder extends Seeder
{
    public function run(): void
    {
        $files = glob(database_path('data/vocabulary/batch_*.php'));

        DB::transaction(function () use ($files) {
            foreach ($files as $file) {
                $words = require $file;

                foreach ($words as $word) {
                    $examples = $word['examples'];

                    unset($word['examples']);

                    $vocabulary = Vocabulary::updateOrCreate(
                        ['korean_word' => $word['korean_word']],
                        $word
                    );

                    // Replace existing examples with current data.
                    $vocabulary->examples()->delete();

                    $vocabulary->examples()->createMany($examples);

                    foreach ($examples as $example) {
    if (!isset($example['korean_sentence'], $example['english_translation'])) {
        dd([
            'file' => basename($file),
            'word' => $word['korean_word'],
            'example' => $example,
        ]);
    }
}
                }
            }
        });
    }
}
