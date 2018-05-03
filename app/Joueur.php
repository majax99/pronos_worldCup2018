<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{

    // Table name
    protected $table = 'joueurs';

    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function equipe(){
        return $this->belongsTo('App\Equipe');
    }
}
