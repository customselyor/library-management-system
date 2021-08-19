<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class MAuthorTranslation
 *
 * @property $id
 * @property $locale
 * @property $m_authors_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property MAuthor $mAuthor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MAuthorTranslation extends Model
{
    use Sluggable;
    protected $table='m_authors_translations';

    static $rules = [
		'locale' => 'required',
		'm_authors_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','m_authors_id','title','slug','body','description'];
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
    public function mAuthor()
    {
        return $this->hasOne('App\Models\MAuthor', 'id', 'm_authors_id');
    }
    

}
