<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ConditionPreservationTranslation
 *
 * @property $id
 * @property $locale
 * @property $condition_preservation_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property ConditionPreservation $conditionPreservation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ConditionPreservationTranslation extends Model
{
    use Sluggable;
    protected $table="condition_preservations_translations";

    static $rules = [
		'locale' => 'required',
		'condition_preservation_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','condition_preservation_id','title','slug','body','description'];
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
    public function conditionPreservation()
    {
        return $this->hasOne('App\Models\ConditionPreservation', 'id', 'condition_preservation_id');
    }
    

}
