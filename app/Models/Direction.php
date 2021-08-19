<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Direction
 *
 * @property $id
 * @property $name
 * @property $faculty_id
 * @property $extra
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Faculty $faculty
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Direction extends Model
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
    protected $fillable = ['name','faculty_id','extra','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function faculty()
    {
        return $this->hasOne('App\Models\Faculty', 'id', 'faculty_id');
    }
    public function scopeActive($query)
    {
      return $query->where('status', 1);
    }


}
