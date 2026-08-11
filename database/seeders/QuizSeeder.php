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
                        'explanation' => '-고 싶다 is used to express a desire.'
                    ]
                ]
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
                        'explanation' => '-(으)ㄹ 수 있다 expresses ability.'
                    ]
                ]
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
                        'explanation' => '-아/어도 되다 is used for permission.'
                    ]
                ]
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