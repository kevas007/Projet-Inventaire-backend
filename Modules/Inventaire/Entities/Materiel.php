<?php

namespace Modules\Inventaire\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materiel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Inventaire\Database\factories\MaterielFactory::new();
    }
    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }
    public function utility()
    {
        return $this->belongsTo(Utility::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
