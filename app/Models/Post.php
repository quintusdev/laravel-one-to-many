<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* dico che può usare la STR per lo slug */
use Illuminate\Support\Str;

use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'slug', 'type_id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class); //relazione uno a molti tra post e tipo di post
    }
    /* faccio la funzione che crea lo slug del titolo */
    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
