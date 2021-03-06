<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
