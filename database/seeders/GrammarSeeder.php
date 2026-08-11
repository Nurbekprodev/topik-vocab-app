<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grammar;
use App\Models\GrammarExample;

class GrammarSeeder extends Seeder
{
    public function run(): void
    {
        $grammars = [

            [
    'title' => '-고 싶다',
    'meaning' => 'want to',
    'explanation' => 'Used to express a desire or wish to do something.',
    'structure' => 'Verb stem + 고 싶다',
    'rules' => 'Attach directly to a verb stem. Usually expresses the speaker’s desire.',
    'usage_notes' => 'Very common in everyday conversation.',
    'commonly_used_with' => '가다, 먹다, 공부하다, 보다',
    'common_mistakes' => 'Do not use directly for another person’s desire.',
    'level' => 'TOPIK 1',
    'order_number' => 1,
    'examples' => [
        ['한국어를 공부하고 싶어요.', 'I want to study Korean.'],
        ['집에 가고 싶어요.', 'I want to go home.'],
    ]
],

[
    'title' => '-(으)ㄹ 수 있다',
    'meaning' => 'can, be able to',
    'explanation' => 'Used to express ability or possibility.',
    'structure' => 'Verb stem + (으)ㄹ 수 있다',
    'rules' => 'Use 을 수 있다 after consonants and ㄹ 수 있다 after vowels.',
    'usage_notes' => 'Used to talk about skills and possibilities.',
    'commonly_used_with' => '하다, 가다, 읽다, 말하다',
    'common_mistakes' => 'Confusing ability with permission.',
    'level' => 'TOPIK 1',
    'order_number' => 2,
    'examples' => [
        ['한국어를 할 수 있어요.', 'I can speak Korean.'],
        ['오늘 만날 수 있어요.', 'I can meet today.'],
    ]
],

[
    'title' => '-아/어도 되다',
    'meaning' => 'may, be allowed to',
    'explanation' => 'Used to ask for or give permission.',
    'structure' => 'Verb stem + 아/어도 되다',
    'rules' => 'Choose 아 or 어 according to normal vowel harmony rules.',
    'usage_notes' => 'Frequently used when asking for permission.',
    'commonly_used_with' => '앉다, 먹다, 들어가다, 사용하다',
    'common_mistakes' => 'Confusing permission with ability.',
    'level' => 'TOPIK 1',
    'order_number' => 3,
    'examples' => [
        ['여기에 앉아도 돼요?', 'May I sit here?'],
        ['사진을 찍어도 됩니다.', 'You may take pictures.'],
    ]
],

        ];

        foreach ($grammars as $grammarData) {

            $examples = $grammarData['examples'];
            unset($grammarData['examples']);

            $grammar = Grammar::create($grammarData);

            foreach ($examples as $example) {

                GrammarExample::create([
                    'grammar_id' => $grammar->id,
                    'korean_sentence' => $example[0],
                    'english_translation' => $example[1],
                ]);
            }
        }
    }
}