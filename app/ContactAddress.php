<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contact
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactAddress query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $address
 * @property string $post_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactAddress wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactAddress whereUpdatedAt($value)
 */
class ContactAddress extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'post_code',
        'contact_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
