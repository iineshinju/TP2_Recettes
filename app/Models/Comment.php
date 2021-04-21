<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //use HasFactory;
    // Précision du nom de table de la base données
    protected $table = 'comments';

    // Optionnel : Gestion des commentaires
    // Retourne l'id de la recette
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    // Retourne l'id de l'auteur
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
