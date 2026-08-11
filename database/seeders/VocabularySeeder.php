<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vocabulary;
use App\Models\VocabularyExample;

class VocabularySeeder extends Seeder
{
    public function run(): void
    {
        $words = [
            [
                'korean_word' => '학교',
                'english_meaning' => 'school',
                'word_type' => 'Noun',
                'level' => 'TOPIK 1',
                'difficulty' => 'Easy',
                'examples' => [
                    ['저는 학교에 가요.', 'I go to school.'],
                    ['학교에서 공부해요.', 'I study at school.'],
                ]
            ],
            [
                'korean_word' => '친구',
                'english_meaning' => 'friend',
                'word_type' => 'Noun',
                'level' => 'TOPIK 1',
                'difficulty' => 'Easy',
                'examples' => [
                    ['친구와 영화를 봐요.', 'I watch a movie with a friend.'],
                    ['제 친구는 친절해요.', 'My friend is kind.'],
                ]
            ],
            [
                'korean_word' => '공부하다',
                'english_meaning' => 'to study',
                'word_type' => 'Verb',
                'level' => 'TOPIK 1',
                'difficulty' => 'Easy',
                'examples' => [
                    ['매일 한국어를 공부해요.', 'I study Korean every day.'],
                    ['도서관에서 공부합니다.', 'I study at the library.'],
                ]
            ],
            [
                'korean_word' => '음식',
                'english_meaning' => 'food',
                'word_type' => 'Noun',
                'level' => 'TOPIK 1',
                'difficulty' => 'Easy',
                'examples' => [
                    ['한국 음식이 맛있어요.', 'Korean food is delicious.'],
                    ['음식을 많이 먹었어요.', 'I ate a lot of food.'],
                ]
            ],
            [
                'korean_word' => '가족',
                'english_meaning' => 'family',
                'word_type' => 'Noun',
                'level' => 'TOPIK 1',
                'difficulty' => 'Easy',
                'examples' => [
                    ['가족과 함께 살아요.', 'I live with my family.'],
                    ['우리 가족은 다섯 명이에요.', 'My family has five members.'],
                ]
            ],
            [
                'korean_word' => '회사',
                'english_meaning' => 'company',
                'word_type' => 'Noun',
                'level' => 'TOPIK 2',
                'difficulty' => 'Medium',
                'examples' => [
                    ['회사에서 일해요.', 'I work at a company.'],
                    ['그 회사는 유명해요.', 'That company is famous.'],
                ]
            ],
            [
                'korean_word' => '준비',
                'english_meaning' => 'preparation',
                'word_type' => 'Noun',
                'level' => 'TOPIK 2',
                'difficulty' => 'Medium',
                'examples' => [
                    ['시험 준비를 하고 있어요.', 'I am preparing for an exam.'],
                    ['여행 준비가 끝났어요.', 'The travel preparation is finished.'],
                ]
            ],
            [
                'korean_word' => '경험',
                'english_meaning' => 'experience',
                'word_type' => 'Noun',
                'level' => 'TOPIK 2',
                'difficulty' => 'Medium',
                'examples' => [
                    ['좋은 경험을 했어요.', 'I had a good experience.'],
                    ['한국에서 많은 경험을 쌓았어요.', 'I gained a lot of experience in Korea.'],
                ]
            ],
            [
                'korean_word' => '여행',
                'english_meaning' => 'travel',
                'word_type' => 'Noun',
                'level' => 'TOPIK 1',
                'difficulty' => 'Easy',
                'examples' => [
                    ['부산으로 여행을 갔어요.', 'I traveled to Busan.'],
                    ['여행이 정말 재미있었어요.', 'The trip was really fun.'],
                ]
            ],
            [
                'korean_word' => '운동하다',
                'english_meaning' => 'to exercise',
                'word_type' => 'Verb',
                'level' => 'TOPIK 1',
                'difficulty' => 'Easy',
                'examples' => [
                    ['매일 운동해요.', 'I exercise every day.'],
                    ['헬스장에서 운동했어요.', 'I exercised at the gym.'],
                ]
            ],
        ];

        foreach ($words as $wordData) {

            $examples = $wordData['examples'];
            unset($wordData['examples']);

            $vocabulary = Vocabulary::create($wordData);

            foreach ($examples as $example) {
                VocabularyExample::create([
                    'vocabulary_id' => $vocabulary->id,
                    'korean_sentence' => $example[0],
                    'english_translation' => $example[1],
                ]);
            }
        }
    }
}