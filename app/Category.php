<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

    /*public function addSubcategory($subcategory)
    {
        $this->subcategories()->create($subcategory);
    }*/

    public function beacons()
    {
        return $this->belongsToMany('App\Beacon', 'category_beacon');
    }
}
