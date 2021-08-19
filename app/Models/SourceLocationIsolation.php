<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
/**
 * Class SourceLocationIsolation
 *
 * @property $id
 * @property $image
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property SourceLocationIsolationsTranslation[] $sourceLocationIsolationsTranslations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SourceLocationIsolation extends Model implements TranslatableContract
{
    use Translatable; // 2. To add translation methods
    public $translatedAttributes = ['title', 'locale', 'slug'];



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sourceLocationIsolationsTranslations()
    {
        return $this->hasMany('App\Models\SourceLocationIsolationsTranslation', 'source_location_isolations_id', 'id');
    }

    public static function rules(){
        $app_languges=  LanguageSetting::active()->get();
        foreach($app_languges as $k=>$v){
            $rules['title_'.$v->code]='required';
        }

        return $rules;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
