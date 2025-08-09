<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = "post_id";

    public $timestamps = false;

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
        return $this->belongsToMany(Categories::class, "post-category", "post_id", "category_id");
    }

}
