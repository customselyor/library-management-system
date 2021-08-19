<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Microorganism
 *
 * @property $id
 * @property $key
 * @property $image
 * @property $is_favorite
 * @property $status
 * @property $hits_count
 * @property $micro_category_id
 * @property $micro_sub_category_id
 * @property $micro_child_sub_category_id
 * @property $created_by
 * @property $updated_by
 * @property $created_at
 * @property $updated_at
 *
 * @property MicroorganismsTranslation[] $microorganismsTranslations
 * @property MicroCategory $microCategory
 * @property MicroChildSubCategory $microChildSubCategory
 * @property MicroSubCategory $microSubCategory
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Microorganism extends Model implements TranslatableContract
{
    
    use Translatable; // 2. To add translation methods
    public $translatedAttributes = ['title', 'locale', 'body', 'slug'];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','image','is_favorite','status','hits_count','micro_category_id','micro_sub_category_id','micro_child_sub_category_id','created_by','updated_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microorganismTranslations()
    {
        return $this->hasMany('App\Models\MicroorganismTranslation', 'microorganism_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microCategory()
    {
        return $this->hasOne('App\Models\MicroCategory', 'id', 'micro_category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microChildSubCategory()
    {
        return $this->hasOne('App\Models\MicroChildSubCategory', 'id', 'micro_child_sub_category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microSubCategory()
    {
        return $this->hasOne('App\Models\MicroSubCategory', 'id', 'micro_sub_category_id');
    }
    
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
    
    public static function rules(){
        $rules=[
            'micro_category_id' => 'required',
            'micro_sub_category_id' => 'required',
            'micro_child_sub_category_id' => 'required',
        ];
        $app_languges=  LanguageSetting::active()->get();
        foreach($app_languges as $k=>$v){
            $rules['title_'.$v->code]='required';
            $rules['body_'.$v->code]='required';
        }

        return $rules;
    }

}
