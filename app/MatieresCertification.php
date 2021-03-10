<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatieresCertification extends Model
{
    public function certif_notes()
    {
        return $this->hasMany(NotesCertification::class , "matiere_id");
    }
}
