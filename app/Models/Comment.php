<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';
    protected $guarded = false;

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function recipe() {
        return $this->hasOne(Recipe::class, 'id', 'recipe_id');
    }
}
