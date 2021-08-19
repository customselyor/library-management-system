<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class BookInventarList
 *
 * @property $id
 * @property $invertar_number
 * @property $is_deleted
 * @property $comment
 * @property $qr_img
 * @property $status
 * @property $book_id
 * @property $book_inventar_id
 * @property $created_by
 * @property $updated_by
 * @property $extra1
 * @property $extra2
 * @property $extra3
 * @property $created_at
 * @property $updated_at
 *
 * @property Book $book
 * @property BookInventar $bookInventar
 * @property User $updater
 * @property User $creater
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BookInventarList extends Model
{
    
    static $rules = [
		'invertar_number' => 'required',
		'is_deleted' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['invertar_number','is_deleted','comment','qr_img','status','book_id','book_inventar_id','created_by','updated_by','extra1','extra2','extra3'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book()
    {
        return $this->hasOne('App\Models\Book', 'id', 'book_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookInventar()
    {
        return $this->hasOne('App\Models\BookInventar', 'id', 'book_inventar_id');
    }
    
   /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function updater()
    {
      return $this->hasOne('App\Models\User', 'id', 'updated_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creater()
    {
      return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    
    public function scopeActive($query)
    {
      return $query->where('status', 1);
    }
    
    /**
     * This is model Observer which helps to do the same actions automatically when you creating or updating models
     *
     * @var array
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });
        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }
}
