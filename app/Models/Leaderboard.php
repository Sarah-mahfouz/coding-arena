<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    /** @use HasFactory<\Database\Factories\LeaderboardFactory> */
    use HasFactory;

    public function created_by()
    {
        return $this->belongsTo(Admin::class);
    }
}
