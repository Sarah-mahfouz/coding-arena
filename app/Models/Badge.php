<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    /** @use HasFactory<\Database\Factories\BadgeFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "image",
        "admin_id",
    ];
    public function created_by()
    {
        return $this->belongsTo(Admin::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }


}
