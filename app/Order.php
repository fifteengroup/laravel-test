<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['unique_number', 'contact_id'];

    public function items()
    {
    	return $this->hasMany(OrderItem::class);
    }

    public function contact()
    {
    	return $this->belongsTo(Contact::class);
    }
}
