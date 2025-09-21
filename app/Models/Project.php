<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory ,SoftDeletes ;
    protected $fillable = [
      'name',
      'user_id'  
    ];

    public function user(){
        return $this->belongsTo(User::class); 
    }

     public function tasks()   {
        return $this->hasMany(Task::class);
    }

   
    // public function scopeInactive($builder){
    //     return $builder->where('active', false);
    // }
    
    }

