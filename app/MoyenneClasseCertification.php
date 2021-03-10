<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoyenneClasseCertification extends Model
{
    public function promotion()
    {
        return $this->belongsTo(Promotions::class);
    }
    public function matiere()
    {
        return $this->belongsTo(MatieresCertification::class);
    }
}
