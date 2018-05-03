<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipe extends Model
{
    protected $table = 'equipes';

    protected $fillable = [
        'nom', 'pays', 'rang',
    ];
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function joueurs(){
        return $this->hasMany('App\Joueur');
    }
}
