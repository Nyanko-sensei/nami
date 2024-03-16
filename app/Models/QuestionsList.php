<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class QuestionsList extends Model
{
    use HasFactory;

    protected $table = 'questions_lists';
    protected $fillable = [
        'name',
        'is_public',
    ];

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }
}
