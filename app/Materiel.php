<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $fillable = [
        'referenceMateriel','nom','prixUnitaire','stock'
    ];
}
