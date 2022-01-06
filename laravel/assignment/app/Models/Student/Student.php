<?php

namespace App\Models\Student;

use App\Models\Major\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory; 
    protected $fillable = [
        'name',
        'email', 
        'address', 
        'major_id', 
        'created_at', 
    ];
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
