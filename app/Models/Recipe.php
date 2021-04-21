<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // On utilise une factory du nom de RecipeFactory
    use HasFactory;
    // Précision du nom de table de la base données
    protected $table = 'recipes';
    protected $fillable = ['title'];

    /**
     * Get the user that authored the recipe.
     */

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
