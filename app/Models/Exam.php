<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use App\Models\Date;
use App\Models\Result;
class Exam extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function nextExam()
    {
        return $this->hasOne(Exam::class, 'previous_exam_id');
    }
}
