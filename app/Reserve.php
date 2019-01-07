<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
	protected $primaryKey = 'idReservation';
    protected $table = 'reserver';
    protected $fillable = ['idReservation', 'finPeriode', 'idUser', 'idPlace', 'debutPeriode'];
    public $timestamps = false;
    // protected $dates = ['finPeriode', 'debutPeriode'];
}
