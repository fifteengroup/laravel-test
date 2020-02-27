<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contact
 *
 * @property-read \App\Company $company
 * @property-read \App\ContactRole $contactRole
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $company_id
 * @property int $contact_role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereContactRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereUpdatedAt($value)
 */
class Address extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_line',
        'second_line',
        'postcode',
		'contact_id'
    ];
}
