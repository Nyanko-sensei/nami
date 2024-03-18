<?php

namespace App\Models;

use App\Http\Resources\ScheduledQuestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    protected $fillable = [
        'user_id',
        'question_id',
        'question_schedule_id',
        'answer',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function scheduledQuestion(): BelongsTo
    {
        return $this->belongsTo(ScheduledQuestion::class);
    }
}
