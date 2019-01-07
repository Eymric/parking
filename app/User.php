<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'membres';
    protected $primaryKey = 'id_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pseudo','nom', 'prenom','email', 'password', 'ligue', 'rang'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->admin; 
    }

    public function isValide()
    {
        return $this->valide;
    }

    public function reserver()
    {
        return $this->hasMany('App\Reserver', 'idUser');
    }
}
