<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PageTranslation
 *
 * @property $id
 * @property $locale
 * @property $page_id
 * @property $title
 * @property $slug
 * @property $body
 * @property $description
 *
 * @property Page $page
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PageTranslation extends Model
{
    
    static $rules = [
		'locale' => 'required',
		'page_id' => 'required',
		'title' => 'required',
		'slug' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['locale','page_id','title','slug','body','description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function page()
    {
        return $this->hasOne('App\Models\Page', 'id', 'page_id');
    }
    

}
