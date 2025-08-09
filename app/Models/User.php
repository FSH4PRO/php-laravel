<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = "user_id";

    public $timestamps = false ;

    protected $fillable = ["username","email","password","is_admin"];

    public function posts(){
        return $this->hasMany(Post::class,"user_id");
    } 

    public function comments(){
        return $this->hasMany(Comment::class,"user_id");
    }
        
    }

