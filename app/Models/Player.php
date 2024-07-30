<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Births;
use App\Models\Player_role;
use App\Models\Branch;
use App\Models\Result;
use App\Models\Fail;
class Player extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    public function birth()
    {
        return $this->belongsTo(Births::class);
    }

    public function role()
    {
        return $this->belongsTo(Player_role::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function fails()
    {
        return $this->hasMany(Fail::class);
    }
}

