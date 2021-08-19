<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Auth; 
/**
 * Class MicroChildSubCategory
 *
 * @property $id
 * @property $key
 * @property $image
 * @property $is_favorite
 * @property $status
 * @property $hits_count
 * @property $micro_category_id
 * @property $micro_sub_category_id
 * @property $created_by
 * @property $updated_by
 * @property $created_at
 * @property $updated_at
 *
 * @property Microorganism[] $microorganisms
 * @property MicroCategory $microCategory
 * @property MicroChildSubCategoryTranslation[] $microChildSubCategoryTranslations
 * @property MicroSubCategory $microSubCategory
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MicroChildSubCategory extends Model implements TranslatableContract
{
    use Translatable; // 2. To add translation methods
    public $translatedAttributes = ['title', 'locale', 'slug'];

    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','image','is_favorite','status','hits_count','micro_category_id','micro_sub_category_id','created_by','updated_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microorganisms()
    {
        return $this->hasMany('App\Models\Microorganism', 'micro_child_sub_category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microCategory()
    {
        return $this->hasOne('App\Models\MicroCategory', 'id', 'micro_category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microChildSubCategoryTranslations()
    {
        return $this->hasMany('App\Models\MicroChildSubCategoryTranslation', 'micro_child_sub_category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microSubCategory()
    {
        return $this->hasOne('App\Models\MicroSubCategory', 'id', 'micro_sub_category_id');
    }
    
     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creater()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function updater()
    {
        return $this->hasOne('App\Models\User', 'id', 'updated_by');
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


    public static function rules(){
        $rules = [
            'micro_category_id' => 'required',
            'micro_sub_category_id' => 'required',
        ];
        $app_languges=  LanguageSetting::active()->get();
        foreach($app_languges as $k=>$v){
            $rules['title_'.$v->code]='required';
        }

        return $rules;
    }


}
