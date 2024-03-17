<?php

declare(strict_types=1);

namespace App\Services\Scheduler;

use App\Models\User;

interface QuestionsSchedulerInterface
{
    public function schedule(User $user): void;
}
