<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeFactory> */
    use HasFactory;
    public function created_by()
    {
        return $this->belongsTo(Admin::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
        }

        public function category(){
            return $this->belongsTo(Category::class);
        }
}
