<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function groupe_matiere()
    {
        return $this->belongsTo(GroupeMatiere::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
    public function prof()
    {
        return $this->belongsTo(Prof::class);
    }
}
