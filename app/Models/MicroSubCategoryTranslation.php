<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class MicroSubCategoryTranslation
 *
 * @property $id
 * @property $locale
 * @property $micro_sub_category_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property MicroSubCategory $microSubCategory
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MicroSubCategoryTranslation extends Model
{

    use Sluggable;

    static $rules = [
		'locale' => 'required',
		'micro_sub_category_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','micro_sub_category_id','title','slug','body','description'];
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
    public function microSubCategory()
    {
        return $this->hasOne('App\Models\MicroSubCategory', 'id', 'micro_sub_category_id');
    }
    

}
