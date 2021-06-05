<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
protected $fillable = [
    'personnelsId','materielsId','validation'
];
}