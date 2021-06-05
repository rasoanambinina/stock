<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    protected $fillable =[
        'numeroBS','materielsId','personnelsId','quantiteSortie'
];
}
