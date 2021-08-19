<?php

namespace App\Http\Controllers;

use App\Models\BiotechnologicalFeature;
use App\Models\LanguageSetting;
use Illuminate\Http\Request;

/**
 * Class BiotechnologicalFeatureController
 * @package App\Http\Controllers
 */
class BiotechnologicalFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biotechnologicalFeatures = BiotechnologicalFeature::paginate();

        return view('biotechnological-feature.index', compact('biotechnologicalFeatures'))
            ->with('i', (request()->input('page', 1) - 1) * $biotechnologicalFeatures->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biotechnologicalFeature = new BiotechnologicalFeature();
        $app_languges=  LanguageSetting::active()->get();

        return view('biotechnological-feature.create', compact('biotechnologicalFeature', 'app_languges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BiotechnologicalFeature::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new BiotechnologicalFeature();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');

        $biotechnologicalFeature = BiotechnologicalFeature::create($data);

        return redirect()->route('biotechnological-features.index')
            ->with('success', 'BiotechnologicalFeature created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biotechnologicalFeature = BiotechnologicalFeature::find($id);

        return view('biotechnological-feature.show', compact('biotechnologicalFeature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biotechnologicalFeature = BiotechnologicalFeature::find($id);
        $app_languges=  LanguageSetting::active()->get();
        return view('biotechnological-feature.edit', compact('biotechnologicalFeature', 'app_languges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BiotechnologicalFeature $biotechnologicalFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BiotechnologicalFeature $biotechnologicalFeature)
    {
        request()->validate(BiotechnologicalFeature::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new BiotechnologicalFeature();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');

        $biotechnologicalFeature->update($data);

        return redirect()->route('biotechnological-features.index')
            ->with('success', 'BiotechnologicalFeature updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $biotechnologicalFeature = BiotechnologicalFeature::find($id)->delete();

        return redirect()->route('biotechnological-features.index')
            ->with('success', 'BiotechnologicalFeature deleted successfully');
    }
}
