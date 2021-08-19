<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Faculty
 *
 * @property $id
 * @property $name
 * @property $abbreviation
 * @property $code
 * @property $created_at
 * @property $updated_at
 *
 * @property BookInventar[] $bookInventars
 * @property Direction[] $directions
 * @property UserProfile[] $userProfiles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Faculty extends Model
{
    
    static $rules = [
		'name' => 'required',
		'abbreviation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','abbreviation','code'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookInventars()
    {
        return $this->hasMany('App\Models\BookInventar', 'faculty_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directions()
    {
        return $this->hasMany('App\Models\Direction', 'faculty_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userProfiles()
    {
        return $this->hasMany('App\Models\UserProfile', 'faculty_id', 'id');
    }
    
    public static function GetById($id)
    {
        $faculty = self::find($id);

        return $faculty;
    }

}
