<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'place';
    protected $primaryKey = 'idPlace';
    protected $fillable = ['numPlace', 'etat'];
    public $timestamps = false;


        public function reserver()
    {
        return $this->hasMany('App\Reserver', 'idPlace');
    }
}
