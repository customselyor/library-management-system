<?php

namespace App\Http\Controllers;

use App\Models\BiotechnologicalFeature;
use App\Models\ConditionPreservation;
use App\Models\ConditionsGrowth;
use App\Models\Growth;
use App\Models\LanguageSetting;
use App\Models\MAuthor;
use App\Models\MicroParentCategory;
use App\Models\Morganism;
use App\Models\SourceLocationIsolation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * Class MorganismController
 * @package App\Http\Controllers
 */
class MorganismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $morganisms = Morganism::paginate();

        return view('morganism.index', compact('morganisms'))
            ->with('i', (request()->input('page', 1) - 1) * $morganisms->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $morganism = new Morganism();
        $app_languges=  LanguageSetting::active()->get();
        $microParentCategory=  MicroParentCategory::active()->get();
        $sourceLocationIsolation=  SourceLocationIsolation::active()->get();
        $author=  MAuthor::active()->get();
        $conditionPreservation=  ConditionPreservation::active()->get();
        $conditionsGrowth=  ConditionsGrowth::active()->get();
        $growth=  Growth::active()->get();
        $biotechnologicalFeature=  BiotechnologicalFeature::active()->get();
        $roles=  Role::orderBy('id','DESC')->get();

        return view('morganism.create', compact('morganism', 'app_languges', 'microParentCategory','sourceLocationIsolation', 'author','conditionPreservation', 'conditionsGrowth', 'growth', 'biotechnologicalFeature', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Morganism::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new Morganism();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $data['micro_parent_category_id']=$request->input('micro_parent_category_id');
        $data['role_id']=$request->input('role_id');
        $data['counter']=$request->input('counter');
        $data['strain_in_collection']=$request->input('strain_in_collection');
        $data['date_of_isolation']=$request->input('date_of_isolation');
        $data['date_of_receipt']=$request->input('date_of_receipt');
        $data['halophility']=$request->input('halophility');
        $data['acidophility']=$request->input('acidophility');
        $data['alcaliphility']=$request->input('alcaliphility');
        $data['thermophility']=$request->input('thermophility');
        $data['source_location_isolation_id']=$request->input('source_location_isolation_id');
        $data['identified_by_id']=$request->input('identified_by_id');
        $data['deposited_by_id']=$request->input('deposited_by_id');
        $data['conditions_preservation_id']=$request->input('conditions_preservation_id');
        $data['conditions_growth_id']=$request->input('conditions_growth_id');
        $data['growth_salt_presence_id']=$request->input('growth_salt_presence_id');
        $data['growth_ph_lt_7_id']=$request->input('growth_ph_lt_7_id');
        $data['growth_ph_mt_7_id']=$request->input('growth_ph_mt_7_id');
        $data['growth_higher_t_id']=$request->input('growth_higher_t_id');
        $data['biotechnological_features_id']=$request->input('biotechnological_features_id');

        $morganism = Morganism::create($data);

        return redirect()->route('morganisms.index')
            ->with('success', 'Morganism created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $morganism = Morganism::find($id);

        return view('morganism.show', compact('morganism'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $morganism = Morganism::find($id);
        $app_languges=  LanguageSetting::active()->get();
        $microParentCategory=  MicroParentCategory::active()->get();
        $sourceLocationIsolation=  SourceLocationIsolation::active()->get();
        $author=  MAuthor::active()->get();
        $conditionPreservation=  ConditionPreservation::active()->get();
        $conditionsGrowth=  ConditionsGrowth::active()->get();
        $growth=  Growth::active()->get();
        $biotechnologicalFeature=  BiotechnologicalFeature::active()->get();
        $roles=  Role::orderBy('id','DESC')->get();

        return view('morganism.edit', compact('morganism', 'app_languges', 'microParentCategory','sourceLocationIsolation', 'author','conditionPreservation', 'conditionsGrowth', 'growth', 'biotechnologicalFeature', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Morganism $morganism
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Morganism $morganism)
    {
         request()->validate(Morganism::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new Morganism();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $data['role_id']=$request->input('role_id');

        $data['micro_parent_category_id']=$request->input('micro_parent_category_id');
        $data['counter']=$request->input('counter');
        $data['strain_in_collection']=$request->input('strain_in_collection');
        $data['date_of_isolation']=$request->input('date_of_isolation');
        $data['date_of_receipt']=$request->input('date_of_receipt');
        $data['halophility']=$request->input('halophility');
        $data['acidophility']=$request->input('acidophility');
        $data['alcaliphility']=$request->input('alcaliphility');
        $data['thermophility']=$request->input('thermophility');
        $data['source_location_isolation_id']=$request->input('source_location_isolation_id');
        $data['identified_by_id']=$request->input('identified_by_id');
        $data['deposited_by_id']=$request->input('deposited_by_id');
        $data['conditions_preservation_id']=$request->input('conditions_preservation_id');
        $data['conditions_growth_id']=$request->input('conditions_growth_id');
        $data['growth_salt_presence_id']=$request->input('growth_salt_presence_id');
        $data['growth_ph_lt_7_id']=$request->input('growth_ph_lt_7_id');
        $data['growth_ph_mt_7_id']=$request->input('growth_ph_mt_7_id');
        $data['growth_higher_t_id']=$request->input('growth_higher_t_id');
        $data['biotechnological_features_id']=$request->input('biotechnological_features_id');

        $morganism->update($data);

        return redirect()->route('morganisms.index')
            ->with('success', 'Morganism updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $morganism = Morganism::find($id)->delete();

        return redirect()->route('morganisms.index')
            ->with('success', 'Morganism deleted successfully');
    }
}
