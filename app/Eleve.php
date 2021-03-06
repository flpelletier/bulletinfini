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
    public function certif_notes()
    {
        return $this->hasMany(NotesCertification::class);
    }

    public function moyennes()
    {
        return $this->hasMany(Moyenne::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
    public function moyennes_certif()
    {
        return $this->hasMany(MoyenneCertification::class);
    }



}
