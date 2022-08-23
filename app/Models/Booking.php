<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int $client_id
 * @property int $product_id
 * @property string $booked_on
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Booking newModelQuery()
 * @method static Builder|Booking newQuery()
 * @method static Builder|Booking query()
 * @method static Builder|Booking whereBookedOn($value)
 * @method static Builder|Booking whereClientId($value)
 * @method static Builder|Booking whereCreatedAt($value)
 * @method static Builder|Booking whereId($value)
 * @method static Builder|Booking whereProductId($value)
 * @method static Builder|Booking whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'product_id',
        'booked_on',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'booked_on' => 'datetime:Y-m-d H:i:s',
    ];


    /**
     * Client/Booking Relationship
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     *  Product/Booking Relationship
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


}
