<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Auth; 
/**
 * Class MicroCategory
 *
 * @property $id
 * @property $key
 * @property $image
 * @property $is_favorite
 * @property $status
 * @property $hits_count
 * @property $created_by
 * @property $updated_by
 * @property $created_at
 * @property $updated_at
 *
 * @property Microorganism[] $microorganisms
 * @property MicroCategoryTranslation[] $microCategoryTranslations
 * @property MicroChildSubCategory[] $microChildSubCategories
 * @property MicroSubCategory[] $microSubCategories
 * @property User $creater
 * @property User $updater
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MicroCategory extends Model implements TranslatableContract
{
    use Translatable; // 2. To add translation methods
    public $translatedAttributes = ['title', 'locale', 'slug'];

    
    // static $rules = RuleFactory::make([
    //     'translations.%title%' => 'required|string',
    //     // 'translations.%content%' => ['required_with:translations.%title%', 'string'],
    // ]);
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','image','is_favorite','status', 'micro_parent_category_id', 'hits_count','created_by','updated_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microorganisms()
    {
        return $this->hasMany('App\Models\Microorganism', 'micro_category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microCategoryTranslations()
    {
        return $this->hasMany('App\Models\MicroCategoryTranslation', 'micro_category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microChildSubCategories()
    {
        return $this->hasMany('App\Models\MicroChildSubCategory', 'micro_category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microSubCategories()
    {
        return $this->hasMany('App\Models\MicroSubCategory', 'micro_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microParentCategory()
    {
        return $this->hasOne('App\Models\MicroParentCategory', 'id', 'micro_parent_category_id');
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
            'micro_parent_category_id' => 'required',
        ];
        $app_languges=  LanguageSetting::active()->get();
        foreach($app_languges as $k=>$v){
            $rules['title_'.$v->code]='required';
        }

        return $rules;
    }
}
