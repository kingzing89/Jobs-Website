<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = "professions";
    public $timestamps = false; // Disable timestamps

    protected $fillable = ['Title', 'Salary', 'created_by'];


    public function employer(){
        return $this->belongsTo(User::class);
    }

    public function applies(){
        return $this->hasMany(Applies::class);
    }
    
}
