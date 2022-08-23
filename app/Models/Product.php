<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string $description
 * @property int $capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCapacity($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereTitle($value)
 * @method static Builder|Product whereType($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;


    public const EXCURSIONS = 'excursions';
    public const CUSTOM_PACKAGES = 'custom_packages';
    public const CRUISES = 'cruises';
    public const TRANSFERS = 'transfers';

    protected $fillable = [
        'title',
        'type',
        'description',
        'capacity'
    ];

    protected $appends = ['is_available'];

    /**
     * check if there are any available slots
     * @return bool
     */
    public function getIsAvailableAttribute(): bool
    {
        return !($this->bookings->count() >= $this->capacity);
    }

    /**
     * Products/Bookings Relationship
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

}
