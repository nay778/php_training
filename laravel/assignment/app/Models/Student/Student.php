<?php

namespace App\Models\Student;

use App\Models\Student\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory; 

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
