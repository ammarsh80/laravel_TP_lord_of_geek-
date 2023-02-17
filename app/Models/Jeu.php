<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    use HasFactory;
    protected $table = 'jeux';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['titre'];
    
    /**
     * Un jeu appartient à une categorie
     *
     * @return void
     */
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Un jeu a plusieurs tags
     *
     * @return void
     */
    public function tags(){
        return $this->belongsToMany(Tag::class, 'pivot_tags');
    }
}
