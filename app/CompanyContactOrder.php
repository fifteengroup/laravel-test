<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyContactOrder
 * @package App
 */
class CompanyContactOrder extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_id',
        'product_name',
        'price_pennies',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
