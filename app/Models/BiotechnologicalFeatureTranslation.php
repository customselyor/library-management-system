<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BiotechnologicalFeatureTranslation
 *
 * @property $id
 * @property $locale
 * @property $biotechnological_feature_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property BiotechnologicalFeature $biotechnologicalFeature
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BiotechnologicalFeatureTranslation extends Model
{
    use Sluggable;
    protected $table="biotechnological_features_translations";

    static $rules = [
		'locale' => 'required',
		'biotechnological_feature_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','biotechnological_feature_id','title','slug','body','description'];

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
    public function biotechnologicalFeature()
    {
        return $this->hasOne('App\Models\BiotechnologicalFeature', 'id', 'biotechnological_feature_id');
    }
    

}
