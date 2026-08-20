<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\QuizQuestion;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $quizzes = [

            [
                'grammar_id' => 1,
                'title' => '-고 싶다 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '한국어를 공부___ 싶어요.',
                        'option_a' => '고',
                        'option_b' => '는',
                        'option_c' => '도',
                        'option_d' => '만',
                        'correct_answer' => '고',
                        'explanation' => '-고 싶다 expresses a desire to do something.'
                    ],
                ],
            ],

            [
                'grammar_id' => 2,
                'title' => '-(으)ㄹ 수 있다 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '저는 한국어를 할 ___ 있어요.',
                        'option_a' => '고',
                        'option_b' => '수',
                        'option_c' => '때',
                        'option_d' => '만',
                        'correct_answer' => '수',
                        'explanation' => '-(으)ㄹ 수 있다 expresses ability or possibility.'
                    ],
                ],
            ],

            [
                'grammar_id' => 3,
                'title' => '-아/어도 되다 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '여기에 앉아도 ___?',
                        'option_a' => '싶어요',
                        'option_b' => '있어요',
                        'option_c' => '돼요',
                        'option_d' => '해요',
                        'correct_answer' => '돼요',
                        'explanation' => '-아/어도 되다 is used to ask for or give permission.'
                    ],
                ],
            ],

            [
                'grammar_id' => 4,
                'title' => '-고 있다 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '지금 책을 읽고 ___어요.',
                        'option_a' => '싶',
                        'option_b' => '있',
                        'option_c' => '되',
                        'option_d' => '가',
                        'correct_answer' => '있',
                        'explanation' => '-고 있다 expresses an action that is currently happening.'
                    ],
                ],
            ],

            [
                'grammar_id' => 5,
                'title' => '-아서/어서 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '배가 아파___ 학교에 못 갔어요.',
                        'option_a' => '지만',
                        'option_b' => '서',
                        'option_c' => '고',
                        'option_d' => '도',
                        'correct_answer' => '서',
                        'explanation' => '-아서/어서 can express a reason.'
                    ],
                ],
            ],

            [
                'grammar_id' => 6,
                'title' => '-지만 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '한국어는 어렵___ 재미있어요.',
                        'option_a' => '고',
                        'option_b' => '지만',
                        'option_c' => '어서',
                        'option_d' => '도',
                        'correct_answer' => '지만',
                        'explanation' => '-지만 expresses contrast and means "but".'
                    ],
                ],
            ],

            [
                'grammar_id' => 7,
                'title' => '-(으)ㄹ 거예요 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '내일 공부할 ___예요.',
                        'option_a' => '수',
                        'option_b' => '거',
                        'option_c' => '지',
                        'option_d' => '때',
                        'correct_answer' => '거',
                        'explanation' => '-(으)ㄹ 거예요 expresses a future plan or prediction.'
                    ],
                ],
            ],

            [
                'grammar_id' => 8,
                'title' => '-고 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '밥을 먹___ 학교에 갔어요.',
                        'option_a' => '지만',
                        'option_b' => '고',
                        'option_c' => '어서',
                        'option_d' => '니까',
                        'correct_answer' => '고',
                        'explanation' => '-고 connects two actions or descriptions.'
                    ],
                ],
            ],

            [
                'grammar_id' => 9,
                'title' => '-(으)세요 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '여기에 앉___',
                        'option_a' => '으세요',
                        'option_b' => '지만',
                        'option_c' => '어요',
                        'option_d' => '고',
                        'correct_answer' => '으세요',
                        'explanation' => '-(으)세요 is used for polite requests or commands.'
                    ],
                ],
            ],

            [
                'grammar_id' => 10,
                'title' => '-지 않다 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '학교에 가___ 않아요.',
                        'option_a' => '고',
                        'option_b' => '지',
                        'option_c' => '서',
                        'option_d' => '도',
                        'correct_answer' => '지',
                        'explanation' => '-지 않다 is used to make a negative sentence.'
                    ],
                ],
            ],

            [
                'grammar_id' => 11,
                'title' => '-고 나서 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '밥을 먹___ 나서 공부했어요.',
                        'option_a' => '고',
                        'option_b' => '지만',
                        'option_c' => '어서',
                        'option_d' => '니까',
                        'correct_answer' => '고',
                        'explanation' => '-고 나서 means "after doing something".'
                    ],
                ],
            ],

            [
                'grammar_id' => 12,
                'title' => '-기 전에 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '자___ 전에 책을 읽어요.',
                        'option_a' => '기',
                        'option_b' => '고',
                        'option_c' => '지만',
                        'option_d' => '서',
                        'correct_answer' => '기',
                        'explanation' => '-기 전에 means "before doing something".'
                    ],
                ],
            ],

            [
                'grammar_id' => 13,
                'title' => '-(으)러 가다 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '친구를 만나___ 가요.',
                        'option_a' => '러',
                        'option_b' => '고',
                        'option_c' => '지만',
                        'option_d' => '어서',
                        'correct_answer' => '러',
                        'explanation' => '-(으)러 가다 expresses the purpose of going somewhere.'
                    ],
                ],
            ],

            [
                'grammar_id' => 14,
                'title' => '-네요 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '날씨가 정말 좋___!',
                        'option_a' => '네요',
                        'option_b' => '지만',
                        'option_c' => '어요',
                        'option_d' => '니까',
                        'correct_answer' => '네요',
                        'explanation' => '-네요 expresses surprise or realization.'
                    ],
                ],
            ],

            [
                'grammar_id' => 15,
                'title' => '-(으)니까 Quiz',
                'type' => 'multiple_choice',
                'level' => 'TOPIK 1',
                'questions' => [
                    [
                        'question' => '비가 오___ 우산을 가져가세요.',
                        'option_a' => '지만',
                        'option_b' => '니까',
                        'option_c' => '고',
                        'option_d' => '네요',
                        'correct_answer' => '니까',
                        'explanation' => '-(으)니까 expresses a reason or cause.'
                    ],
                ],
            ],

        ];

        foreach ($quizzes as $quizData) {
            $questions = $quizData['questions'];

            unset($quizData['questions']);

            $quiz = Quiz::create($quizData);

            foreach ($questions as $question) {
                QuizQuestion::create([
                    'quiz_id' => $quiz->id,
                    'question' => $question['question'],
                    'option_a' => $question['option_a'],
                    'option_b' => $question['option_b'],
                    'option_c' => $question['option_c'],
                    'option_d' => $question['option_d'],
                    'correct_answer' => $question['correct_answer'],
                    'explanation' => $question['explanation'],
                ]);
            }
        }
    }
}