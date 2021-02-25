<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Order
 *
 * @property-read \App\Contact $contact
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $product_name
 * @property double $price
 * @property int $quantity
 * @property int $contact_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereUpdatedAt($value)
 */
class Order extends Model
{
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'price',
        'quantity',
        'contact_id'
    ];

    public $sortable = ['price', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
