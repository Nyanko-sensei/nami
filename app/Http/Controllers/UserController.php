<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Scheduler\QuestionsSchedulerInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(
        readonly private QuestionsSchedulerInterface $scheduler
    )
    {
    }

    public function schedule()
    {
        /** @var User $user */
        $user = Auth::user();
        $this->scheduler->schedule($user);
        return response('ok');
    }
}
