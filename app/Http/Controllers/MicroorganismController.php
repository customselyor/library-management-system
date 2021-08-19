<?php

namespace App\Http\Controllers;

use App\Models\LanguageSetting;
use App\Models\MicroCategory;
use App\Models\Microorganism;
use Illuminate\Http\Request;

/**
 * Class MicroorganismController
 * @package App\Http\Controllers
 */
class MicroorganismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microorganisms = Microorganism::paginate();
         return view('microorganism.index', compact('microorganisms'))
            ->with('i', (request()->input('page', 1) - 1) * $microorganisms->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microorganism = new Microorganism();
        $app_languges=  LanguageSetting::active()->get();
        $microCategories = MicroCategory::active()->get();
        
        return view('microorganism.create', compact('microorganism', 'app_languges', 'microCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Microorganism::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new Microorganism();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        } 
        $data['micro_category_id']=$request->input('micro_category_id');
        $data['micro_sub_category_id']=$request->input('micro_sub_category_id');
        $data['micro_child_sub_category_id']=$request->input('micro_child_sub_category_id');
        $data['status']=$request->input('status');
         
        $microorganism = Microorganism::create($data);

        return redirect()->route('microorganisms.index')
            ->with('success', 'Microorganism created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microorganism = Microorganism::find($id);
 
        return view('microorganism.show', compact('microorganism'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microorganism = Microorganism::find($id);
        $app_languges=  LanguageSetting::active()->get();
        $microCategories = MicroCategory::active()->get();
        
        return view('microorganism.edit', compact('microorganism', 'app_languges', 'microCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Microorganism $microorganism
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Microorganism $microorganism)
    {
        request()->validate(Microorganism::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new Microorganism();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        } 
        $data['micro_category_id']=$request->input('micro_category_id');
        $data['micro_sub_category_id']=$request->input('micro_sub_category_id');
        $data['micro_child_sub_category_id']=$request->input('micro_child_sub_category_id');
        $data['status']=$request->input('status');
        $microorganism->update($data);

        return redirect()->route('microorganisms.index')
            ->with('success', 'Microorganism updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $microorganism = Microorganism::find($id)->delete();

        return redirect()->route('microorganisms.index')
            ->with('success', 'Microorganism deleted successfully');
    }
}
