<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
   protected $fillable = ['name', 'type', 'wh_id'];

   	public function warehouse()
    {

    	return $this->belongsTo('\App\Warehouse','wh_id','id');

    }

    public function products()
    {

    	return $this->belongsToMany('App\Location', 'location_product', 'location_id', 'product_id');

    }

}
