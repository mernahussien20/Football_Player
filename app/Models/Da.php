<?php

namespace App\Models;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Da extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table= "dates";

    // public function exams()
    // {
    //     return $this->hasMany(Exam::class);
    // }
}
