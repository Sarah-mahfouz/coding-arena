<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    public function created_by()
    {
        return $this->belongsTo(Admin::class);
    }
    public function challenges(){
        return $this->hasMany(Challenge::class);
    }
}
