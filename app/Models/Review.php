<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "stars", "text"];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
