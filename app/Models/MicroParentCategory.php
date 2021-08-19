<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
/**
 * Class MicroParentCategory
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
 * @property MicroParentCategoryTranslation[] $microParentCategoryTranslations
 * @property User $creater
 * @property User $updater
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MicroParentCategory extends Model implements TranslatableContract
{
    
    use Translatable; // 2. To add translation methods
    public $translatedAttributes = ['title', 'locale', 'slug'];

    protected $table='micro_parent_category';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','image','is_favorite','status','hits_count','created_by','updated_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microParentCategoryTranslations()
    {
        return $this->hasMany('App\Models\MicroParentCategoryTranslation', 'micro_parent_category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microCategories()
    {
        return $this->hasMany('App\Models\MicroCategory', 'micro_parent_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function microOrganisms()
    {
        return $this->hasMany('App\Models\Morganism', 'micro_parent_category_id', 'id');
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
        $rules=[];
        $app_languges=  LanguageSetting::active()->get();
        foreach($app_languges as $k=>$v){
            $rules['title_'.$v->code]='required';
        }

        return $rules;
    }
}
