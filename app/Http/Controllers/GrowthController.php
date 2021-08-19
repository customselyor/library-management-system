<?php

namespace App\Http\Controllers;

use App\Models\Growth;
use App\Models\LanguageSetting;
use Illuminate\Http\Request;

/**
 * Class GrowthController
 * @package App\Http\Controllers
 */
class GrowthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $growths = Growth::paginate();

        return view('growth.index', compact('growths'))
            ->with('i', (request()->input('page', 1) - 1) * $growths->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $growth = new Growth();
        $app_languges=  LanguageSetting::active()->get();

        return view('growth.create', compact('growth', 'app_languges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Growth::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new Growth();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
         $growth = Growth::create($data);

        return redirect()->route('growths.index')
            ->with('success', 'Growth created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $growth = Growth::find($id);

        return view('growth.show', compact('growth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $growth = Growth::find($id);
        $app_languges=  LanguageSetting::active()->get();
        return view('growth.edit', compact('growth','app_languges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Growth $growth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Growth $growth)
    {
        request()->validate(Growth::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new Growth();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $growth->update($data);
        return redirect()->route('growths.index')
            ->with('success', 'Growth updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $growth = Growth::find($id)->delete();

        return redirect()->route('growths.index')
            ->with('success', 'Growth deleted successfully');
    }
}
