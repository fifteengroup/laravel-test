<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'contact_id'
    ];
    protected $appends = [
        'total_cost',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalCostAttribute()
    {
        return $this->items()->sum('price');
    }

}
