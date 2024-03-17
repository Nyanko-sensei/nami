<?php

namespace App\Repositories;



use App\Models\QuestionsList;
use Illuminate\Support\Collection;

class QuestionsRepository
{
    public function getRandomByListName(string $questionListName, int $questionCount = 3): Collection
    {
        return QuestionsList::where('name', '=', $questionListName)
            ->first()
            ?->questions()
            ->inRandomOrder()
            ->limit($questionCount)
            ->get();
    }
}
