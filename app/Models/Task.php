<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory , SoftDeletes;
    
     protected $fillable = [
      'title',
      'description',
      'project_id',
      'assigned_to'
       
    ];

    public function project(){
        return $this->belongsTo(Project::class); 
    }

     public function user(){
        return $this->belongsTo(User::class,'assigned_to'); 
    }
 
     public function labels(){
        return $this->belongsToMany(Label::class,'label_task'); 
    }

    
}