<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotesCertification extends Model
{
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
    public function matiere_certif()
    {
        return $this->belongsTo(MatieresCertification::class , "matiere_id");
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matiere', 'coefficient', 'note',
    ];
}
