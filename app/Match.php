<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    // Table name
    protected $table = 'matchs';

    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;


}
