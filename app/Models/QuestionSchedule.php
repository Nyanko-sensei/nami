<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionSchedule extends Model
{
    use HasFactory;

    protected $table = 'question_schedule';
    protected $fillable = [
        'user_id',
        'question_id',
        'date_time_to_ask',
        'answered',
    ];
    protected $casts = [
        'date_time_to_ask' => 'date',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
