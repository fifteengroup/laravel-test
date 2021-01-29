<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{
    protected $fillable = [
        'line1',
        'line2',
        'line3',
        'town',
        'postcode',
        'contact_id'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
