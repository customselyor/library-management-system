<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SourceLocationIsolationsTranslation
 *
 * @property $id
 * @property $locale
 * @property $source_location_isolation_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property SourceLocationIsolation $sourceLocationIsolation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SourceLocationIsolationTranslation extends Model
{
    use Sluggable;
    static $rules = [
		'locale' => 'required',
		'source_location_isolation_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $table='source_location_isolations_translations';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','source_location_isolation_id','title','slug','body','description'];
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
    public function sourceLocationIsolation()
    {
        return $this->hasOne('App\Models\SourceLocationIsolation', 'id', 'source_location_isolation_id');
    }
    

}
