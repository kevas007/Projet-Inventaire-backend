<?php

namespace Modules\Inventaire\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Inventaire\Database\factories\ReservationFactory::new();
    }

    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }
}
