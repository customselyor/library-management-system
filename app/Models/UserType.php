<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserType
 *
 * @property $id
 * @property $name
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property UserProfile[] $userProfiles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserType extends Model
{
    
    static $rules = [
		'name' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userProfiles()
    {
        return $this->hasMany('App\Models\UserProfile', 'user_type_id', 'id');
    }

    public function scopeActive($query)
    {
      return $query->where('status', 1);
    }


}
