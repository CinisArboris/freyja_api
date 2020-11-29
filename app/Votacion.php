<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votacion extends Model{
    protected $table = 'votacion';
    protected $fillable = [
        'idmesa', 'idcandidato', 'voto',
    ];
}
