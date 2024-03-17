<?php

namespace App\Services\Scheduler;

use App\Models\QuestionSchedule;
use App\Models\User;
use App\Repositories\QuestionsRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class QuestionsScheduler implements QuestionsSchedulerInterface
{
    private const STARTER_QUESTIONS_COUNT = 3;
    private const TYPICAL_QUESTIONS_COUNT = 5;
    private const EXPERIENCED_QUESTIONS_COUNT = 5;

    public function __construct(
        private readonly QuestionsRepository $questionsRepository
    )
    {
    }

    public function schedule(User $user): void
    {
        $dateForQuestion = Carbon::now();
        $starterQuestions = $this->questionsRepository->getRandomByListName(
            'Self-reflection jumpstart',
            self::STARTER_QUESTIONS_COUNT
        );
        $this->addQuestionsToSchedule($user, $dateForQuestion, $starterQuestions);

        $typicalQuestions = $this->questionsRepository->getRandomByListName(
            'Get to know yourself better',
            self::TYPICAL_QUESTIONS_COUNT
        );
        $this->addQuestionsToSchedule($user, $dateForQuestion,  $typicalQuestions);

        $expertQuestions = $this->questionsRepository->getRandomByListName(
            'A little bit extra',
            self::EXPERIENCED_QUESTIONS_COUNT
        );
        $this->addQuestionsToSchedule($user, $dateForQuestion,  $expertQuestions);
    }

    private function addQuestionsToSchedule(User $user, Carbon $date, Collection $questions)
    {
        foreach ($questions as $question) {
            $date->addDay();
            QuestionSchedule::create([
                'user_id' => $user->id,
                'question_id' => $question->id,
                'date_time_to_ask' => $date,
            ]);
        }
    }
}
