<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'recipes';
    protected $guarded = false;
    public $timestamps = true;

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'recipe_tags', 'recipe_id', 'tag_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'recipe_id', 'id');
    }

    public function scopeFullCollect($query) {
        $query->leftJoin('comments', 'recipes.id', '=', 'comments.recipe_id')
            ->join('categories', 'recipes.category_id', '=', 'categories.id')
            ->select('recipes.*', 'categories.title as category_title', DB::raw('count(comments.text) as comment_count'))
            ->whereNull('comments.delete_at')
            ->groupBy('recipes.id');
    }

}
