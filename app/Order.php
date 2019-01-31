<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    public const STATUS_CREATED = 0;
    public const STATUS_PROCESSING = 1;
    public const STATUS_COMPLETED = 2;
    public const STATUS_CANCELLED = 3;
    public const STATUS_REFUNDED = 4;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
    ];

    public function getStatusLabelAttribute(): string
    {
        switch ($this->attributes['status']) {
            case 0:
                return 'Created';
                break;
            case 1:
                return 'Processing';
                break;
            case 2:
                return 'Completed';
                break;
            case 3:
                return 'Cancelled';
                break;
            case 4:
                return 'Refunded';
                break;
        }
    }

    /**
     * Get the user that created this order.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the products that belong to this order.
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('name', 'price', 'quantity');
    }
}
