<?php

namespace App\Http\Controllers;

use App\Models\LanguageSetting;
use App\Models\SourceLocationIsolation;
use Illuminate\Http\Request;

/**
 * Class SourceLocationIsolationController
 * @package App\Http\Controllers
 */
class SourceLocationIsolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sourceLocationIsolations = SourceLocationIsolation::paginate();

        return view('source-location-isolation.index', compact('sourceLocationIsolations'))
            ->with('i', (request()->input('page', 1) - 1) * $sourceLocationIsolations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sourceLocationIsolation = new SourceLocationIsolation();
        $app_languges=  LanguageSetting::active()->get();

        return view('source-location-isolation.create', compact('sourceLocationIsolation', 'app_languges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SourceLocationIsolation::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new SourceLocationIsolation();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $sourceLocationIsolation = SourceLocationIsolation::create($data);
        return redirect()->route('source-location-isolations.index')
            ->with('success', 'SourceLocationIsolation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sourceLocationIsolation = SourceLocationIsolation::find($id);

        return view('source-location-isolation.show', compact('sourceLocationIsolation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sourceLocationIsolation = SourceLocationIsolation::find($id);
        $app_languges=  LanguageSetting::active()->get();

        return view('source-location-isolation.edit', compact('sourceLocationIsolation','app_languges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SourceLocationIsolation $sourceLocationIsolation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceLocationIsolation $sourceLocationIsolation)
    {
        request()->validate(SourceLocationIsolation::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new SourceLocationIsolation();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $sourceLocationIsolation->update($data);
        return redirect()->route('source-location-isolations.index')
            ->with('success', 'SourceLocationIsolation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sourceLocationIsolation = SourceLocationIsolation::find($id)->delete();

        return redirect()->route('source-location-isolations.index')
            ->with('success', 'SourceLocationIsolation deleted successfully');
    }
}
