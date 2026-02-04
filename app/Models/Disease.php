<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{

    protected $table = "diseases";
    protected $fillable = ['name'];

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }
}
