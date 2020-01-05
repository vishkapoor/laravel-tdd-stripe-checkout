<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';

    protected $guarded = [];

    public function getPrice() 
    {
    	return $this->price / 100;
    }
}
