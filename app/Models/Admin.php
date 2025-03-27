<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function challenges(){
        return $this->hasMany(Challenge::class);
       }
   public function badges(){
    return $this->hasMany(Badge::class);
   }
   public function leaderboards(){
        return $this->hasMany(Leaderboard::class);
   }
//    public function users(){
//        return $this->hasMany(User::class);
//    }

}
