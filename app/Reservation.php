<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   
	protected $primaryKey = 'idReservation';
    protected $table = 'reserver';
    protected $fillable = ['idReservation', 'finPeriode', 'idUser', 'idPlace', 'debutPeriode'];

}

public static function boot()
{
	parent::boot();

	static::creating(function ($model) 
	{
		$model->created_at = $model->freshTimestamp();
	});
}

public function user()
{
	return $this->belongsToMany('App\User', 'id_user');
}

public function place()
{
	return $this->belongsToMany('App\Place', 'idPlace');
}

public function periode()
{
	return $this->belongsToMany('App\Periode', 'debutPeriode');
}

