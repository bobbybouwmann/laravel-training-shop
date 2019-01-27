<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street',
        'house_number',
        'house_number_addition',
        'zipcode',
        'country',
    ];

    /**
     * Get the user that owns this address.
     *
     * @return HasOne
     */
    public function billingUser(): HasOne
    {
        return $this->hasOne(User::class, 'billing_address_id');
    }

    /**
     * Get the user that owns this address.
     *
     * @return HasOne
     */
    public function shippingUser(): HasOne
    {
        return $this->hasOne(User::class, 'shipping_address_id');
    }
}
