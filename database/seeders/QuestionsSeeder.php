<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionsList;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::query()->delete();
        QuestionsList::query()->delete();

        $questionLists = $this->getQuestionsLists();

        foreach ($questionLists as $questionListData) {
            $questionList = QuestionsList::create([
                'name' => $questionListData['name'],
                'is_public' => true,
            ]);
            foreach ($questionListData['questions'] as $questionData) {
                $questions[] = Question::create([
                    'text' => $questionData,
                    'locale' => 'en_US',
                    'is_public' => true,
                ])->id;
            }

            $questionList->questions()->sync($questions);
        }
    }

    private function getQuestionsLists()
    {
        return [
            [
                'name' => 'Self-reflection jumpstart',
                'questions' => [
                    'Am I using my time wisely?',
                    'Am I taking anything for granted?',
                    'Am I employing a healthy perspective?',
                    'Am I living true to myself?',
                    'Am I waking up in the morning ready to take on the day?',
                    'Am I thinking negative thoughts before I fall asleep?',
                    'Am I putting enough effort into my relationships?',
                    'Am I taking care of myself physically?',
                    'Am I letting matters that are out of my control stress me out?',
                    'Am I achieving the goals that I’ve set for myself?',
                ],
            ],
            [
                'name' => 'Get to know yourself better',
                'questions' => [
                    'Who am I, really?',
                    'What worries me most about the future?',
                    'If this were the last day of my life, would I have the same plans for today?',
                    'What am I really scared of?',
                    'Am I holding on to something I need to let go of?',
                    'If not now, then when?',
                    'What matters most in my life?',
                    'What am I doing about the things that matter most in my life?',
                    'Why do I matter?',
                    'Have I done anything lately that’s worth remembering?',
                    'Have I made someone smile today?',
                    'What have I given up on?',
                    'When did I last push the boundaries of my comfort zone?',
                    'If I had to instill one piece of advice in a newborn baby, what advice would I give?',
                    'What small act of kindness was I once shown that I will never forget?',
                    'How will I live, knowing I will die?',
                    'What do I need to change about myself?',
                    'Is it more important to love or be loved?',
                    'How many of my friends would I trust with my life?',
                    'Who has had the greatest impact on my life?',
                    'Would I break the law to save a loved one?',
                    'Would I steal to feed a starving child?',
                    'What do I want most in life?',
                    'What is life asking of me?',
                    'Which is worse: failing or never trying?',
                    'If I try to fail and succeed, what have I done?',
                    'What’s the one thing I’d like others to remember about me at the end of my life?',
                    'Does it really matter what others think about me?',
                    'To what degree have I actually controlled the course of my life?',
                    'When all is said and done, what will I have said more than I’ve done?',
                ],
            ],
            [
                'name' => 'A little bit extra',
                'questions' => [
                    'My favorite way to spend the day is . . .',
                    'If I could talk to my teenage self, the one thing I would say is . . .',
                    'The two moments I’ll never forget in my life are . . . (Describe them in great detail, and what makes them so unforgettable.)',
                    'Make a list of 30 things that make you smile.',
                    '“Write about a moment experienced through your body. Making love, making breakfast, going to a party, having a fight, an experience you’ve had or you imagine for your character. Leave out thought and emotion, and let all information be conveyed through the body and senses.”',
                    'The words I’d like to live by are . . .',
                    'I couldn’t imagine living without . . .',
                    'When I’m in pain—physical or emotional—the kindest thing I can do for myself is . . .',
                    'Make a list of the people in your life who genuinely support you, and whom you can genuinely trust. Then, make time to hang out with them.',
                    'What does unconditional love look like for you?',
                    'What things would you do if you loved yourself unconditionally? How can you act on these things, even if you’re not yet able to love yourself unconditionally?',
                    'I really wish others knew this about me . . .',
                    'Name what is enough for you.',
                    'If my body could talk, it would say . . .',
                    'Name a compassionate way you’ve supported a friend recently. Then, write down how you can do the same for yourself.',
                    'What do you love about life?',
                    'What always brings tears to your eyes? (As Paulo Coelho has said, “Tears are words that need to be written.”)',
                    'Write about a time when your work felt real, necessary and satisfying to you, whether the work was paid or unpaid, professional or domestic, physical or mental.',
                    'Write about your first love—whether it’s a person, place or thing.',
                    'Using 10 words, describe yourself.',
                    'What’s surprised you the most about your life or life in general?',
                    'What can you learn from your biggest mistakes?',
                    'I feel most energized when . . .',
                    '“Write a list of questions to which you urgently need answers.”',
                    'Make a list of everything that inspires you—whether books, websites, quotes, people, paintings, stores, or stars in the sky.',
                    'What’s one topic you need to learn more about to help you live a more fulfilling life? (Then, follow through and learn more about that topic.)',
                    'I feel happiest in my skin when . . .',
                    'Make a list of everything you’d like to say no to.',
                    'Make a list of everything you’d like to say yes to.',
                    'Write the words you need to hear.'
                ],
            ],
        ];
    }
}
