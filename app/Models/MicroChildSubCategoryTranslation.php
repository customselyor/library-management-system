<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class MicroChildSubCategoryTranslation
 *
 * @property $id
 * @property $locale
 * @property $micro_child_sub_category_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property MicroChildSubCategory $microChildSubCategory
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MicroChildSubCategoryTranslation extends Model
{
    use Sluggable;

    static $rules = [
		'locale' => 'required',
		'micro_child_sub_category_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','micro_child_sub_category_id','title','slug','body','description'];
    public $timestamps = false;

    /**
       * Return the sluggable configuration array for this model.
       *
       * @return array
       */
      public function sluggable(): array
      {
          return [
              'slug' => [
                  'source' => 'title'
              ]
          ];
      }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microChildSubCategory()
    {
        return $this->hasOne('App\Models\MicroChildSubCategory', 'id', 'micro_child_sub_category_id');
    }
    

}
