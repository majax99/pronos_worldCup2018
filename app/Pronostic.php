<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pronostic extends Model
{
    // Table name
    protected $table = 'pronostics';

    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

}
