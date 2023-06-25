<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JournalPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'sport_level_id',
        'main_focus',
        'meal_1',
        'meal_2',
        'meal_3',
        'work_on_side_project',
        'video_games',
        'meditation',
    ];

    /**
     * Get the user that owns the DailyJournal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the user that owns the DailyJournal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sportLevel(): BelongsTo
    {
        return $this->belongsTo(SportLevel::class);
    }
}
