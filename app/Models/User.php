<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

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
        'password',
        'profile_image',
        'phone',
        'address',
        'last_login_at',
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
        'last_login_at' => 'datetime', // Ensure this line is present
    ];

    /**
     * Get the reports for the user.
     */
    public function reports()
    {
        return $this->hasMany(Crime::class, 'reportedby_user_id');
    }

    /**
     * Set the user's last login at attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setLastLoginAtAttribute($value)
    {
        $this->attributes['last_login_at'] = $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value) : null;
    }
}
