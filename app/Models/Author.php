<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_author';
    protected $fillable = [
        'username',
        'author_name',
        'email',
        'instagram'
    ];

}
