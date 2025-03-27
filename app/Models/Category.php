<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'image', 'created_by'];
    public function created_by()
    {
        return $this->belongsTo(Admin::class);
    }
    public function challenges(){
        return $this->hasMany(Challenge::class);
    }
}
