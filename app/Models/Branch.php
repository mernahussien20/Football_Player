<?php
namespace App\Models;
use App\Models\Player;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
