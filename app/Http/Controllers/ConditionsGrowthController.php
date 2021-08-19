<?php

namespace App\Http\Controllers;

use App\Models\ConditionsGrowth;
use App\Models\LanguageSetting;
use Illuminate\Http\Request;

/**
 * Class ConditionsGrowthController
 * @package App\Http\Controllers
 */
class ConditionsGrowthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditionsGrowths = ConditionsGrowth::paginate();

        return view('conditions-growth.index', compact('conditionsGrowths'))
            ->with('i', (request()->input('page', 1) - 1) * $conditionsGrowths->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditionsGrowth = new ConditionsGrowth();
        $app_languges=  LanguageSetting::active()->get();

        return view('conditions-growth.create', compact('conditionsGrowth', 'app_languges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ConditionsGrowth::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new ConditionsGrowth();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');


        $conditionsGrowth = ConditionsGrowth::create($data);

        return redirect()->route('conditions-growths.index')
            ->with('success', 'ConditionsGrowth created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conditionsGrowth = ConditionsGrowth::find($id);

        return view('conditions-growth.show', compact('conditionsGrowth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conditionsGrowth = ConditionsGrowth::find($id);
        $app_languges=  LanguageSetting::active()->get();

        return view('conditions-growth.edit', compact('conditionsGrowth', 'app_languges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ConditionsGrowth $conditionsGrowth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConditionsGrowth $conditionsGrowth)
    {
        request()->validate(ConditionsGrowth::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new ConditionsGrowth();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $conditionsGrowth->update($data);
        return redirect()->route('conditions-growths.index')
            ->with('success', 'ConditionsGrowth updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $conditionsGrowth = ConditionsGrowth::find($id)->delete();

        return redirect()->route('conditions-growths.index')
            ->with('success', 'ConditionsGrowth deleted successfully');
    }
}
