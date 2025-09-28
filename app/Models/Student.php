<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'firstname',
        'middlename',
        'email',
        'phone',
        'parent_phone',
        'date_of_birth',
        'address',
        'joining_date',
        'admission_date',
        'admission_fee',
        'faculty_id',
        'course',
        'branch',
        'batch_time',
        'status',
        'enrollment_number',
    ];
    
    public function faculty(){ 
        return $this->belongsTo(User::class,'faculty_id'); 
    }
}
