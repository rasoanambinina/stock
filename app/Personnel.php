<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
        'referencePersonnel','nom','prenom','numCIN','telephone','adresse','fonction'
    ];
}
