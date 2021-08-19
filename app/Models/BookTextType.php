<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookTextType
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
class BookTextType extends Model
{
    protected $table='book_text_type';

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

    public static function GetById($id)
    {
        $model = self::find($id);

        return $model;
    }

}
