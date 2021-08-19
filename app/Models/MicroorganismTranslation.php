<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class MicroorganismsTranslation
 *
 * @property $id
 * @property $locale
 * @property $microorganism_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property Microorganism $microorganism
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MicroorganismTranslation extends Model
{
    use Sluggable;
    protected $table='microorganism_translations';

    static $rules = [
		'locale' => 'required',
		'microorganism_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
		'body' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','microorganism_id','title','slug','body','description'];
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
    public function microorganism()
    {
        return $this->hasOne('App\Models\Microorganism', 'id', 'microorganism_id');
    }
    

}
