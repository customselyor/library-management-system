<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
/**
 * Class Morganism
 *
 * @property $id
 * @property $micro_parent_category_id
 * @property $counter
 * @property $strain_in_collection
 * @property $date_of_isolation
 * @property $date_of_receipt
 * @property $halophility
 * @property $acidophility
 * @property $alcaliphility
 * @property $thermophility
 * @property $source_location_isolation_id
 * @property $identified_by_id
 * @property $deposited_by_id
 * @property $conditions_preservation_id
 * @property $conditions_growth_id
 * @property $growth_salt_presence_id
 * @property $growth_ph_lt_7_id
 * @property $growth_ph_mt_7_id
 * @property $growth_higher_t_id
 * @property $biotechnological_features_id
 * @property $role_id
 * @property $image
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property BiotechnologicalFeature $biotechnologicalFeature
 * @property ConditionsGrowth $conditionsGrowth
 * @property ConditionPreservation $conditionPreservation
 * @property Growth $growthPhMt7
 * @property Growth $growthSaltPresence
 * @property Growth $growthHigherT
 * @property Growth $growthPhLt7
 * @property MicroParentCategory $microParentCategory
 * @property MorganismTranslation[] $morganismsTranslations
 * @property MAuthor $deposited
 * @property MAuthor $identified
 * @property SourceLocationIsolation $sourceLocationIsolation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Morganism extends Model implements TranslatableContract
{


    use Translatable; // 2. To add translation methods
    public $translatedAttributes = ['title', 'locale', 'slug', 'strain_label','enzymatic_activity_extreme_conditions_protein','characteristics_produced_compounds','pathogenicity','comments'];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['micro_parent_category_id','counter','strain_in_collection','date_of_isolation','date_of_receipt','halophility','acidophility','alcaliphility','thermophility','source_location_isolation_id','identified_by_id','deposited_by_id','conditions_preservation_id','conditions_growth_id','growth_salt_presence_id','growth_ph_lt_7_id','growth_ph_mt_7_id','growth_higher_t_id','biotechnological_features_id', 'role_id', 'image','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function biotechnologicalFeature()
    {
        return $this->hasOne('App\Models\BiotechnologicalFeature', 'id', 'biotechnological_features_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('Spatie\Permission\Models\Role', 'id', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function conditionsGrowth()
    {
        return $this->hasOne('App\Models\ConditionsGrowth', 'id', 'conditions_growth_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function conditionPreservation()
    {
        return $this->hasOne('App\Models\ConditionPreservation', 'id', 'conditions_preservation_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function growthPhMt7()
    {
        return $this->hasOne('App\Models\Growth', 'id', 'growth_ph_mt_7_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function growthSaltPresence()
    {
        return $this->hasOne('App\Models\Growth', 'id', 'growth_salt_presence_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function growthHigherT()
    {
        return $this->hasOne('App\Models\Growth', 'id', 'growth_higher_t_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function growthPhLt7()
    {
        return $this->hasOne('App\Models\Growth', 'id', 'growth_ph_lt_7_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function microParentCategory()
    {
        return $this->hasOne('App\Models\MicroParentCategory', 'id', 'micro_parent_category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function morganismsTranslations()
    {
        return $this->hasMany('App\Models\MorganismTranslation', 'morganisms_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function deposited()
    {
        return $this->hasOne('App\Models\MAuthor', 'id', 'deposited_by_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function identified()
    {
        return $this->hasOne('App\Models\MAuthor', 'id', 'identified_by_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sourceLocationIsolation()
    {
        return $this->hasOne('App\Models\SourceLocationIsolation', 'id', 'source_location_isolation_id');
    }

    public static function rules(){
        $app_languges=  LanguageSetting::active()->get();
        $rules=[
            'micro_parent_category_id' => 'required',
            'role_id' => 'required',
        ];

        foreach($app_languges as $k=>$v){
            $rules['title_'.$v->code]='required';
        }

        return $rules;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
