<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'type_id',
        'technologies',
        'cover_img'
    ];

    /*
        Relationships
    */

    public function type()
    {
        return $this->belongsTo(Type::class); // un Post ha solo un Type
        // funzione che indentifica la relazione one-to-many
        // e Post è la taballa dipendente
        // in cui Type è la tabella indipendente
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class); // un Post ha solo un Type
        // funzione che indentifica la relazione many-to-many
    }
}
