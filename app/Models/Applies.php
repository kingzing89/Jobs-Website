<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applies extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'job_id',
        'email',
        'cv',
    ];

    
    public function user(){
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function belongsTojob(){
        return $this->belongsTo(Job::class, 'job_id');
        
    }


  


}
