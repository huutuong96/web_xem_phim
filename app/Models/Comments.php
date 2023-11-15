<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'date',
        'id_user',
        'id_film',
        'id_blog',
        'rule',
        'reply_for_id_msg'
    ];
    protected $primaryKey = 'id_msg';
    protected $table = 'comments';
    public  $timestamps = false;
}
