<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['titre'];
/**
 * Un tag appartient a plusieurs jeux
 *
 * @return void
 */
    public function jeux()
    {
        return $this->belongsToMany(Jeu::class, 'pivot_tags');
    }
}
