<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'content',
        'other_information'
    ];
    protected $primaryKey = 'id_banner';
    protected $table = 'banners';
    public $timestamps = false;
}
