<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'recipes';
    protected $guarded = false;

    public function tags() {
        return $this->belongsToMany(Tag::class, 'recipe_tags', 'recipe_id', 'tag_id');
    }

}
