<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Book
 *
 * @property $id
 * @property $title
 * @property $author
 * @property $subject
 * @property $isbn
 * @property $author_lists
 * @property $date
 * @property $description
 * @property $contributor
 * @property $rights
 * @property $relation
 * @property $publisher
 * @property $format
 * @property $source
 * @property $identifier
 * @property $coverage
 * @property $city
 * @property $published_year
 * @property $image
 * @property $full_text
 * @property $UDK
 * @property $BBK
 * @property $K
 * @property $betlar_soni
 * @property $price
 * @property $status
 * @property $exists_electron_format
 * @property $exists_in_library
 * @property $book_text_type_id
 * @property $book_type_id
 * @property $book_language_id
 * @property $book_text_id
 * @property $created_by
 * @property $updated_by
 * @property $created_at
 * @property $updated_at
 *
 * @property BookLanguage $bookLanguage
 * @property BookText $bookText
 * @property BookTextType $bookTextType
 * @property BookType $bookType
 * @property User $updater
 * @property User $creater
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{
    
    static $rules = [
		'title' => 'required',
		'author' => 'required',
		'published_year' => 'required',
		'betlar_soni' => 'required',
        'file' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048', // 2MB Max
        'arrived_year' => 'required|integer',
        'summarka_number' => 'nullable|integer',
        'faculty_id' => 'required',
        'copies' => 'required|integer',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','author','subject', 'isbn', 'author_lists','date','description','contributor','rights','relation','publisher','format','source','identifier','coverage','city','published_year','image','full_text','UDK','BBK','K','betlar_soni', 'price', 'status', 'exists_electron_format', 'exists_in_library', 'book_text_type_id','book_type_id','book_language_id','book_text_id','created_by','updated_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookLanguage()
    {
        return $this->hasOne('App\Models\BookLanguage', 'id', 'book_language_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookText()
    {
        return $this->hasOne('App\Models\BookText', 'id', 'book_text_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookTextType()
    {
        return $this->hasOne('App\Models\BookTextType', 'id', 'book_text_type_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookType()
    {
        return $this->hasOne('App\Models\BookType', 'id', 'book_type_id');
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
    
    public function scopeExistsinelectronformat($query)
    {
      return $query->where('exists_electron_format', 1);
    }
    
    public function scopeExistsinlibrary($query)
    {
      return $query->where('exists_in_library', 1);
    }
    public static function GetBookById($book_id=null){
        return self::find($book_id);
    }

    public static function GetInvertarBegins($faculty_id=null)
    {
        $inventars= BookInventar::get();
        // BookInventar::sum('copies');

        $copies=0;
        foreach($inventars as $v){
            $copies += $v->copies;
        }

        return $copies;
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
