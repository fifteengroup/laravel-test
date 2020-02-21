<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ContactAddress extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_line',
        'second_line',
        'third_line',
        'postcode',
        'contact_id'
    ];

}