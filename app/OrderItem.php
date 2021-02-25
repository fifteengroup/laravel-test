<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }

    // Working float values
    public function getPriceAttribute($value){
        return number_format($value/100,2,'.','');
    }
    public function setPriceAttribute($value){
        $this->attributes['price'] = $value*100;
    }
}
