<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class Player_role extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}