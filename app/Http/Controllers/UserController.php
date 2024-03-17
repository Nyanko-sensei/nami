<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduledQuestion;
use App\Models\User;
use App\Services\Scheduler\QuestionsSchedulerInterface;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends Controller
{
    public function __construct(
        private readonly QuestionsSchedulerInterface $scheduler
    )
    {
    }

    public function schedule(User $user)
    {
        $this->scheduler->schedule($user);
        return response('ok');
    }

    public function getTodayQuestions(User $user)
    {
        $todaysBegining = Carbon::now()->startOfDay();
        $sheduledItems = $user->questionSchedule()
            ->whereBetween(
                'date_time_to_ask',
                [
                    $todaysBegining->toISOString(),
                    $todaysBegining->addDays(2)->toISOString()
                ]
            )
            ->get();

        return ScheduledQuestion::collection($sheduledItems);
    }
}
