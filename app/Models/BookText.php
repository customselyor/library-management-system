<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookText
 *
 * @property $id
 * @property $name
 * @property $code
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BookText extends Model
{
    
    static $rules = [
		'name' => 'required',
		'code' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','code','status'];

    public function scopeActive($query)
    {
      return $query->where('status', 1);
    }

    public static function GetById($id)
    {
        $model = self::find($id);

        return $model;
    }
}
