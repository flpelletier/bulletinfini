<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

}
