<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

        protected $fillable = ["title", "content", "user_id"];

      public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "post_id");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, "post-category", "post_id", "category_id");
    }
}