<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_comic';
    protected $fillable = [
        'cover',
        'comic_name',
        'episode',
        'status',
        'type',
        'description',
        'author_id',
    ];
}
