<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $fillable = ['debutPeriode'];
     public $timestamps = false;

        public function reserver()
    {
        return $this->hasMany('App\Reserver', 'debutPeriode');
    }
}
