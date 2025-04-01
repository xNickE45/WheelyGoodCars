<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use app\Models\Car;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function isSuspicious()
    {
        $reasons = [];

        if (is_null($this->phonenumber)) {
            $reasons[] = 'No phone number provided.';
        }

        if ($this->cars()->where(function ($query) {
            $query->where('production_year', '<', now()->year - 10)
                ->where('mileage', '<', 50000);
        })->exists()) {
            $reasons[] = 'Has cars older than 10 years with low mileage.';
        }

        if ($this->cars()
            ->where('price', '>', 10000)
            ->whereNotNull('sold_at')
            ->whereDate('created_at', '=', now()->toDateString())
            ->count() > 3) {
            $reasons[] = 'Sold more than 3 expensive cars on the same day.';
        }

        if ($this->cars()->where('price', '<', 1000)->exists()) {
            $reasons[] = 'Has cars priced below $1,000.';
        }

        return $reasons;
    }
}
