<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'code'];
    
    public function transactions()
    {
    	return $this->hasMany('\App\Transaction');
    }

    public function category()
    {

    	return $this->belongsTo('\App\Category');
    }

    public function locations()
    {

    	return $this->belongsToMany('App\Location', 'location_product', 'product_id', 'location_id')
    				->withPivot('stocks');

    }
}
