<?php

namespace App\Http\Controllers;

use App\Models\ConditionPreservation;
use App\Models\LanguageSetting;
use Illuminate\Http\Request;

/**
 * Class ConditionPreservationController
 * @package App\Http\Controllers
 */
class ConditionPreservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditionPreservations = ConditionPreservation::paginate();

        return view('condition-preservation.index', compact('conditionPreservations'))
            ->with('i', (request()->input('page', 1) - 1) * $conditionPreservations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditionPreservation = new ConditionPreservation();
        $app_languges=  LanguageSetting::active()->get();

        return view('condition-preservation.create', compact('conditionPreservation', 'app_languges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ConditionPreservation::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new ConditionPreservation();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');

        $conditionPreservation = ConditionPreservation::create($data);

        return redirect()->route('condition-preservations.index')
            ->with('success', 'ConditionPreservation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conditionPreservation = ConditionPreservation::find($id);

        return view('condition-preservation.show', compact('conditionPreservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conditionPreservation = ConditionPreservation::find($id);
        $app_languges=  LanguageSetting::active()->get();

        return view('condition-preservation.edit', compact('conditionPreservation', 'app_languges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ConditionPreservation $conditionPreservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConditionPreservation $conditionPreservation)
    {
        request()->validate(ConditionPreservation::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new ConditionPreservation();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');

        $conditionPreservation->update($data);

        return redirect()->route('condition-preservations.index')
            ->with('success', 'ConditionPreservation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $conditionPreservation = ConditionPreservation::find($id)->delete();

        return redirect()->route('condition-preservations.index')
            ->with('success', 'ConditionPreservation deleted successfully');
    }
}
