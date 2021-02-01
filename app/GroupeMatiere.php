<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupeMatiere extends Model
{
    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
