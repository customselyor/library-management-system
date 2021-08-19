<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MorganismTranslation
 *
 * @property $id
 * @property $locale
 * @property $morganism_id
 * @property $title
 * @property $slug
 * @property $strain_label
 * @property $enzymatic_activity_extreme_conditions_protein
 * @property $characteristics_produced_compounds
 * @property $pathogenicity
 * @property $comments
 * @property $body
 * @property $description
 *
 * @property Morganism $morganism
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MorganismTranslation extends Model
{
    protected $table='morganisms_translations';
    use Sluggable;
    static $rules = [
		'locale' => 'required',
		'morganism_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','morganism_id','title','slug','strain_label','enzymatic_activity_extreme_conditions_protein','characteristics_produced_compounds','pathogenicity','comments','body','description'];
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
    public function morganism()
    {
        return $this->hasOne('App\Models\Morganism', 'id', 'morganism_id');
    }
    

}
