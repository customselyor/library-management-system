<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProfile
 *
 * @property $id
 * @property $phone_number
 * @property $pnf_code
 * @property $passport_seria_number
 * @property $passport_copy
 * @property $image
 * @property $date_of_birth
 * @property $kursi
 * @property $klassi
 * @property $raqami
 * @property $qr_code
 * @property $faculty_id
 * @property $direction_id
 * @property $gender_id
 * @property $user_id
 * @property $user_type_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Direction $direction
 * @property Faculty $faculty
 * @property Gender $gender
 * @property User $user
 * @property UserType $userType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserProfile extends Model
{
    protected $table='user_profile';

    static $rules = [
		'phone_number' => 'required',
		'qr_code' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['phone_number','pnf_code','passport_seria_number','passport_copy','image','date_of_birth','kursi','klassi','raqami','qr_code','faculty_id','direction_id','gender_id','user_id','user_type_id'];


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
    public function gender()
    {
        return $this->hasOne('App\Models\Gender', 'id', 'gender_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userType()
    {
        return $this->hasOne('App\Models\UserType', 'id', 'user_type_id');
    }
    

}
