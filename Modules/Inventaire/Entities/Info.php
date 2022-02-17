<?php

namespace Modules\Inventaire\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Inventaire\Database\factories\InfoFactory::new();
    }
    public function materiel(){
        return $this->belongsTo(Materiel::class);
    }
    public function stockage(){
        return $this->belongsTo(Stockage::class);
    }
}
