<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['titre'];
    
    /**
     * Une categorie a plusieurs jeux
     *
     * @return void
     */
    public function jeux(){
        return $this->hasMany(Jeu::class);
    }

}
