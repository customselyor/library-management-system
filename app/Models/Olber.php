<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Olber
 *
 * @property $id
 * @property $kitobxon_id
 * @property $book_id
 * @property $status
 * @property $olgan_vaqti
 * @property $olgan_yil
 * @property $olgan_oy
 * @property $olgan_kun
 * @property $nechchi_kun
 * @property $qaytarish_vaqti
 * @property $qaytarish_yil
 * @property $qaytarish_oy
 * @property $qaytarish_kun
 * @property $qaytargan_vaqti
 * @property $qaytargan_yil
 * @property $qaytargan_oy
 * @property $qaytargan_kun
 * @property $fakultet_id
 * @property $book_inventar_id
 * @property $created_by
 * @property $updated_by
 * @property $created_at
 * @property $updated_at
 *
 * @property Book $book
 * @property Faculty $faculty
 * @property BookInventarList $book_inventar_id
 * @property User $kitobxon
 * @property User $updater
 * @property User $creater
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Olber extends Model
{

    protected $table = 'olber';
    public static $DELETED = 0;
    public static $GIVEN = 1;
    public static $TAKEN = 2;

    static $rules = [
        'status' => 'required',
        'olgan_vaqti' => 'required',
        'olgan_yil' => 'required',
        'olgan_oy' => 'required',
        'olgan_kun' => 'required',
        'nechchi_kun' => 'required',
        'qaytarish_yil' => 'required',
        'qaytarish_oy' => 'required',
        'qaytarish_kun' => 'required',
        'qaytargan_yil' => 'required',
        'qaytargan_oy' => 'required',
        'qaytargan_kun' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['kitobxon_id', 'book_id', 'status', 'olgan_vaqti', 'olgan_yil', 'olgan_oy', 'olgan_kun', 'nechchi_kun', 'qaytarish_vaqti', 'qaytarish_yil', 'qaytarish_oy', 'qaytarish_kun', 'qaytargan_vaqti', 'qaytargan_yil', 'qaytargan_oy', 'qaytargan_kun', 'fakultet_id', 'book_inventar_id', 'created_by', 'updated_by'];


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
    public function book_inventar()
    {
        return $this->hasOne('App\Models\BookInventarList', 'id', 'book_inventar_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function faculty()
    {
        return $this->hasOne('App\Models\Faculty', 'id', 'fakultet_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kitobxon()
    {
        return $this->hasOne('App\Models\User', 'id', 'kitobxon_id');
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

    public static function getStatusText($status_code = 0)
    {
        if ($status_code == 0) {
            return "O'chirilgan";
        } elseif ($status_code == 1) {
            return "Berilgan";
        } else {
            return "Qaytarib olingan";
        }
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