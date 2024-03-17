<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Scheduler\QuestionsSchedulerInterface;

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
}
