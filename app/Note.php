<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
