<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Address
 *
 * @property-read \App\Contact $contact
 * @mixin \Eloquent
 * @property int $id
 * @property string $line_1
 * @property string $line_2
 * @property string $line_3
 * @property string $town
 * @property string $city
 * @property string $county
 * @property string $country
 * @property string $postcode
 * @property int $contact_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id',
       'line_1',
       'line_2',
       'line_3',
       'town',
       'city',
       'county',
       'country',
       'postcode',
       'contact_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->hasMany(Company::class);
    }
}
