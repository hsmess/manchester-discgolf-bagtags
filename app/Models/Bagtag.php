<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagtag extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class)->using(BagtagUser::class)->withTimestamps();
    }

    public function owner()
    {
        return $this->users->sortByDesc('pivot.created_at')->first();
    }
}
