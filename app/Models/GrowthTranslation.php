<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GrowthTranslation
 *
 * @property $id
 * @property $locale
 * @property $growth_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property Growth $growth
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GrowthTranslation extends Model
{
    use Sluggable;
    protected $table="growths_translations";

    static $rules = [
		'locale' => 'required',
		'growth_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','growth_id','title','slug','body','description'];
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
    public function growth()
    {
        return $this->hasOne('App\Models\Growth', 'id', 'growth_id');
    }
    

}
