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
    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }
    public function moyennes()
    {
        return $this->hasMany(Moyenne::class);
    }
    public function moyenne_classes()
    {
        return $this->hasMany(MoyenneClasse::class);
    }
}
