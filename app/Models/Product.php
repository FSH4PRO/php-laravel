<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'created_at', 'updated_at'];

    // app/Models/Product.php

    public function stores()
    {
        // You MUST add withPivot('quantity') here
        return $this->belongsToMany(Store::class)->withPivot('quantity')->withTimestamps();
    }

    public function warehouses()
    {
        // You MUST add withPivot('quantity') here
        return $this->belongsToMany(Warehouse::class)->withPivot('quantity')->withTimestamps();
    }
}
