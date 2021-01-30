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
        'item_count',
        'company_name'
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

    public function getItemCountAttribute()
    {
        return $this->items()->count();
    }

    public function getCompanyNameAttribute()
    {
        return $this->contact->company->name;
    }

}
