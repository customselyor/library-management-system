<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class BookInventar
 *
 * @property $id
 * @property $faculty_id
 * @property $direction_id
 * @property $arrived_year
 * @property $summarka_number
 * @property $faculty_code
 * @property $copies
 * @property $inventar_number_begin
 * @property $inventar_number_end
 * @property $qr_code_lists
 * @property $inventar_number_removed
 * @property $book_id
 * @property $created_by
 * @property $updated_by
 * @property $created_at
 * @property $updated_at
 *
 * @property Book $book
 * @property Direction $direction
 * @property Faculty $faculty
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BookInventar extends Model
{
    
    static $rules = [
		'arrived_year' => 'required',
		'copies' => 'required',
		'inventar_number_begin' => 'required',
		'inventar_number_end' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['faculty_id','direction_id','arrived_year','summarka_number','faculty_code','copies','inventar_number_begin','inventar_number_end','qr_code_lists','inventar_number_removed','book_id','created_by','updated_by'];


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
    public function direction()
    {
        return $this->hasOne('App\Models\Direction', 'id', 'direction_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function faculty()
    {
        return $this->hasOne('App\Models\Faculty', 'id', 'faculty_id');
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
