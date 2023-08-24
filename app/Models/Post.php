<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* dico che può usare la STR per lo slug */
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'slug'];

    /* faccio la funzione che crea lo slug del titolo */
    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
