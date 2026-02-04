<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name','doctor_id'];


    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }


    public function diseases()
    {
        return $this->belongsToMany(Disease::class);
    }
}
