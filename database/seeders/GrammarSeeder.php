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
[
    'title' => '-고 있다',
    'meaning' => 'be doing',
    'explanation' => 'Expresses an action currently in progress.',
    'structure' => 'Verb stem + 고 있다',
    'rules' => 'Attach directly to the verb stem.',
    'usage_notes' => 'Used for present continuous actions.',
    'commonly_used_with' => '먹다, 공부하다, 일하다',
    'common_mistakes' => 'Not used for all state verbs.',
    'level' => 'TOPIK 1',
    'order_number' => 4,
    'examples' => [
        ['지금 공부하고 있어요.', 'I am studying now.'],
        ['밥을 먹고 있어요.', 'I am eating.'],
    ]
],

[
    'title' => '-아서/어서',
    'meaning' => 'because, and then',
    'explanation' => 'Shows reason or sequence.',
    'structure' => 'Verb/Adjective stem + 아/어서',
    'rules' => 'Choose 아 or 어 according to vowel harmony.',
    'usage_notes' => 'Very common in speech.',
    'commonly_used_with' => '가다, 먹다, 바쁘다',
    'common_mistakes' => 'Cannot usually be used with commands.',
    'level' => 'TOPIK 1',
    'order_number' => 5,
    'examples' => [
        ['배가 아파서 학교에 못 갔어요.', 'I could not go to school because my stomach hurt.'],
        ['밥을 먹어서 배불러요.', 'I am full because I ate.'],
    ]
],

[
    'title' => '-지만',
    'meaning' => 'but, however',
    'explanation' => 'Shows contrast.',
    'structure' => 'Verb/Adjective stem + 지만',
    'rules' => 'Attach directly to the stem.',
    'usage_notes' => 'Commonly used in conversations.',
    'commonly_used_with' => '좋다, 가다, 먹다',
    'common_mistakes' => 'Do not confuse with 그런데.',
    'level' => 'TOPIK 2',
    'order_number' => 6,
    'examples' => [
        ['한국어는 어렵지만 재미있어요.', 'Korean is difficult but interesting.'],
        ['가고 싶지만 시간이 없어요.', 'I want to go but I have no time.'],
    ]
],

[
    'title' => '-(으)ㄹ 거예요',
    'meaning' => 'will, going to',
    'explanation' => 'Expresses future intention or prediction.',
    'structure' => 'Verb stem + (으)ㄹ 거예요',
    'rules' => 'Use 을 after consonants and ㄹ after vowels.',
    'usage_notes' => 'Very common future tense.',
    'commonly_used_with' => '가다, 공부하다, 먹다',
    'common_mistakes' => 'Confusing with present tense.',
    'level' => 'TOPIK 2',
    'order_number' => 7,
    'examples' => [
        ['내일 공부할 거예요.', 'I will study tomorrow.'],
        ['주말에 친구를 만날 거예요.', 'I will meet a friend on the weekend.'],
    ]
],

[
    'title' => '-고',
    'meaning' => 'and',
    'explanation' => 'Connects two actions or descriptions.',
    'structure' => 'Verb/Adjective stem + 고',
    'rules' => 'Attach directly to the stem.',
    'usage_notes' => 'Very common connector.',
    'commonly_used_with' => '가다, 먹다, 예쁘다',
    'common_mistakes' => 'Not for cause and effect.',
    'level' => 'TOPIK 2',
    'order_number' => 8,
    'examples' => [
        ['저는 학생이고 동생은 회사원이에요.', 'I am a student and my younger sibling is an office worker.'],
        ['밥을 먹고 학교에 갔어요.', 'I ate and went to school.'],
    ]
],

[
    'title' => '-(으)세요',
    'meaning' => 'please do',
    'explanation' => 'Polite request or command.',
    'structure' => 'Verb stem + (으)세요',
    'rules' => 'Use 으세요 after consonants.',
    'usage_notes' => 'Used when speaking politely.',
    'commonly_used_with' => '앉다, 가다, 먹다',
    'common_mistakes' => 'Avoid using to superiors in some situations.',
    'level' => 'TOPIK 2',
    'order_number' => 9,
    'examples' => [
        ['여기에 앉으세요.', 'Please sit here.'],
        ['천천히 말씀하세요.', 'Please speak slowly.'],
    ]
],

[
    'title' => '-지 않다',
    'meaning' => 'do not',
    'explanation' => 'Negates an action.',
    'structure' => 'Verb stem + 지 않다',
    'rules' => 'Attach directly to the stem.',
    'usage_notes' => 'Formal and common negative form.',
    'commonly_used_with' => '가다, 먹다, 공부하다',
    'common_mistakes' => 'Confusing with 안.',
    'level' => 'TOPIK 2',
    'order_number' => 10,
    'examples' => [
        ['학교에 가지 않아요.', 'I do not go to school.'],
        ['고기를 먹지 않아요.', 'I do not eat meat.'],
    ]
],

[
    'title' => '-고 나서',
    'meaning' => 'after doing',
    'explanation' => 'Indicates one action happens after another.',
    'structure' => 'Verb stem + 고 나서',
    'rules' => 'Attach directly to the verb stem.',
    'usage_notes' => 'Used to show sequence.',
    'commonly_used_with' => '먹다, 공부하다, 운동하다',
    'common_mistakes' => 'Not interchangeable with before expressions.',
    'level' => 'TOPIK 3',
    'order_number' => 11,
    'examples' => [
        ['밥을 먹고 나서 공부했어요.', 'I studied after eating.'],
        ['운동하고 나서 샤워했어요.', 'I showered after exercising.'],
    ]
],

[
    'title' => '-기 전에',
    'meaning' => 'before doing',
    'explanation' => 'Indicates an action before another action.',
    'structure' => 'Verb stem + 기 전에',
    'rules' => 'Change verb to 기 form.',
    'usage_notes' => 'Commonly used in daily life.',
    'commonly_used_with' => '자다, 먹다, 가다',
    'common_mistakes' => 'Mixing up before and after expressions.',
    'level' => 'TOPIK 3',
    'order_number' => 12,
    'examples' => [
        ['자기 전에 책을 읽어요.', 'I read a book before sleeping.'],
        ['학교에 가기 전에 아침을 먹어요.', 'I eat breakfast before going to school.'],
    ]
],

[
    'title' => '-(으)러 가다',
    'meaning' => 'go to do',
    'explanation' => 'Expresses purpose of movement.',
    'structure' => 'Verb stem + (으)러 가다',
    'rules' => 'Use after action verbs.',
    'usage_notes' => 'Frequently used with 가다 and 오다.',
    'commonly_used_with' => '공부하다, 먹다, 만나다',
    'common_mistakes' => 'Not used with descriptive verbs.',
    'level' => 'TOPIK 3',
    'order_number' => 13,
    'examples' => [
        ['한국어를 배우러 왔어요.', 'I came to learn Korean.'],
        ['친구를 만나러 가요.', 'I am going to meet a friend.'],
    ]
],

[
    'title' => '-네요',
    'meaning' => 'I see, wow',
    'explanation' => 'Expresses surprise or realization.',
    'structure' => 'Verb/Adjective stem + 네요',
    'rules' => 'Attach directly to the stem.',
    'usage_notes' => 'Used when noticing something.',
    'commonly_used_with' => '예쁘다, 많다, 크다',
    'common_mistakes' => 'Not usually used for planned statements.',
    'level' => 'TOPIK 3',
    'order_number' => 14,
    'examples' => [
        ['날씨가 좋네요.', 'The weather is nice.'],
        ['한국어를 잘하네요.', 'You speak Korean well.'],
    ]
],

[
    'title' => '-(으)니까',
    'meaning' => 'because, so',
    'explanation' => 'Expresses a reason.',
    'structure' => 'Verb/Adjective stem + (으)니까',
    'rules' => 'Use 으니까 after consonants.',
    'usage_notes' => 'Often used in spoken Korean.',
    'commonly_used_with' => '바쁘다, 가다, 먹다',
    'common_mistakes' => 'Confusing with 아/어서.',
    'level' => 'TOPIK 3',
    'order_number' => 15,
    'examples' => [
        ['비가 오니까 우산을 가져가세요.', 'Because it is raining, take an umbrella.'],
        ['늦었으니까 빨리 갑시다.', 'Since we are late, let us go quickly.'],
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