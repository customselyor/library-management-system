<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    const STATUS_EMPLOYEE = 'E';
    const STATUS_READER = 'R';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function GetKlassCodeFromRole($role = null)
    {
        if ($role == "SuperAdmin" | $role == "Admin" | $role == "Manager") {
            return self::STATUS_EMPLOYEE;
        } elseif ($role == "Reader") {
            return self::STATUS_READER;
        } else {
            return null;
        }
    }
    public static function GetQRNumber()
    {
        return str_pad(User::all()->count() + 1, 4, '0', STR_PAD_LEFT);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\UserProfile', 'user_id', 'id');
    }
}