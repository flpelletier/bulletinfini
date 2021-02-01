<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
