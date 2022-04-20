<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentEntry extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->hasOne(TournamentPayment::class,'tournament_entry_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
