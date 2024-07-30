<?php
namespace App\Models;
use App\Models\Player;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}