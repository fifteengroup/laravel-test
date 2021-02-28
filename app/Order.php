<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'contact_id',
    ];

    protected $appends = [
        'total_value'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($model){
            $model->reference = str_pad($model->id, 8, 0, STR_PAD_LEFT);
            $model->save();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function getTotalValueAttribute(){
        $total_value = 0;

        foreach($this->items as $item){
            $total_value += ($item->price*100);
        }

        return number_format($total_value/100,2,'.','');
    }
}
