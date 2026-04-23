<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Warehouse extends Model
{
    protected $fillable = ['name', 'location'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'warehouse_product')->withTimestamps();
    }
}
