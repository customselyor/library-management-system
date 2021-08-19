<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ConditionsGrowthTranslation
 *
 * @property $id
 * @property $locale
 * @property $conditions_growth_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property ConditionsGrowth $conditionsGrowth
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ConditionsGrowthTranslation extends Model
{
    use Sluggable;
    static $rules = [
		'locale' => 'required',
		'conditions_growth_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];
    protected $table="conditions_growths_translations";

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','conditions_growth_id','title','slug','body','description'];
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
    public function conditionsGrowth()
    {
        return $this->hasOne('App\Models\ConditionsGrowth', 'id', 'conditions_growth_id');
    }
    

}
