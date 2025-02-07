<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class Fail extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
