<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'film_name',
        'film_image',
        'film_desc',
        'link',
        'film_genre',
        'epsode',
        'view',
        'star',
        'id_categori',
        'author',
        'other_information',
        'type'
    ];
    protected $primaryKey = 'id_film';
    protected $table = 'films';
    public  $timestamps = false;
}
