<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price');
    }

    public function addProducts($items)
    {
        foreach($items as $item) {
           $this->products()->attach($item->id, [ 'price' => $item->price ]);
        }
    }

}
