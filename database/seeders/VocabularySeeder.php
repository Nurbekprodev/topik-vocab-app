<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Vocabulary;

class VocabularySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Look for .json files instead of .php
        $files = glob(database_path('data/vocabulary/batch_*.json'));

        if (empty($files)) {
            $this->command->info('No JSON batch files found in database/data/vocabulary/');
            return;
        }

        DB::transaction(function () use ($files) {
            foreach ($files as $file) {
                // 2. Read and decode the JSON file
                $jsonContent = File::get($file);
                $words = json_decode($jsonContent, true);

                // Safety check to ensure the JSON is valid before parsing
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $this->command->error('Invalid JSON syntax in file: ' . basename($file));
                    continue; 
                }

                foreach ($words as $word) {
                    // Fallback to empty array if 'examples' key is missing
                    $examples = $word['examples'] ?? []; 
                    unset($word['examples']);

                    $vocabulary = Vocabulary::updateOrCreate(
                        ['korean_word' => $word['korean_word']],
                        $word
                    );

                    // Replace existing examples with current data.
                    $vocabulary->examples()->delete();
                    
                    if (!empty($examples)) {
                        $vocabulary->examples()->createMany($examples);
                    }

                    // Your validation check
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
                
                // Optional: Output progress to the console
                $this->command->info('Successfully seeded: ' . basename($file));
            }
        });
    }
}