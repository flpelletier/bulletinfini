<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }
    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
    public function periodes()
    {
        return $this->hasMany(Periode::class);
    }
    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
