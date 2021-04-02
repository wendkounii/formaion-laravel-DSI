<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 
        'designation', 
        'description', 
        'prix', 
        'like', 
        'pays_source', 
        'poids',
        'image'
    ];
    public function commandeProduit()
    {
        return $this->hasMany(Commande::class);
    }


    /**
     * les utilisateurs des produits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
