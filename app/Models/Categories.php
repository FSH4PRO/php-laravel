<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $primaryKey = "category_id";
    public $timestamps = false;

    protected $fillable = ["name", "description"];

   

    public function posts()
    {
        return $this->belongsToMany(Post::class, "post_category","post_id");
    }



}
