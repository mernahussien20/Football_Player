<?php

namespace App\Models;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Births extends Model
{
    use HasFactory;
    protected $table = 'births';
    protected $guarded =['id'];
    public function players()
    {
        return $this->hasMany(Player::class, 'birth_id'); // Ensure the foreign key 'birth_id' exists in the players table
    }
}
