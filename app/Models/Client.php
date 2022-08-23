<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $passport_num
 * @property string $gender
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereEmail($value)
 * @method static Builder|Client whereFirstName($value)
 * @method static Builder|Client whereGender($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client whereLastName($value)
 * @method static Builder|Client wherePassportNum($value)
 * @method static Builder|Client whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Client extends Model
{
    use HasFactory;

    public const MALE = 'male';
    public const FEMALE = 'female';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'passport_no',
    ];

    /**
     * get fullname attributes
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get Clients Bookings
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->HasMany(Booking::class);
    }
}
