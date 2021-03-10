<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneCertification extends Model
{
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
    public function matiere()
    {
        return $this->belongsTo(MatieresCertification::class);
    }
}
