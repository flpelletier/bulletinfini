<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneClasse extends Model
{
    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
