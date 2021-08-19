<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 *
 * @property $id
 * @property $name
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gender extends Model
{
    protected $table='gender';

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


    public function scopeActive($query)
    {
      return $query->where('status', 1);
    }


}
