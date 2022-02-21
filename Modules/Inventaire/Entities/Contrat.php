<?php

namespace Modules\Inventaire\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Inventaire\Database\factories\ContratFactory::new();
    }

    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }

    public function preteur()
    {
        return $this->belongsTo(User::class, 'preteur_id');
    }

    public function emprunteur()
    {
        return $this->belongsTo(Emprunteur::class);
    }

    public function team_id()
    {
        return $this->belongsTo(User::class, 'team_id');
    }

    public function statut()
    {
        return $this->belongsTo(StatutContrat::class);
    }
}
