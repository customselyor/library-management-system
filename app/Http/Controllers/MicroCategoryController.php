<?php

namespace App\Http\Controllers;

use App\Models\LanguageSetting;
use App\Models\MicroCategory;
use App\Models\MicroParentCategory;
use Illuminate\Http\Request;

/**
 * Class MicroCategoryController
 * @package App\Http\Controllers
 */
class MicroCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microCategories = MicroCategory::paginate();
        
        return view('micro-category.index', compact('microCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $microCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microCategory = new MicroCategory();
        $app_languges=  LanguageSetting::active()->get();
        $microParentCategory=  MicroParentCategory::active()->get();
       
        return view('micro-category.create', compact('microCategory', 'app_languges', 'microParentCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(MicroCategory::rules());
 
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MicroCategory();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $data['micro_parent_category_id']=$request->input('micro_parent_category_id');
         // Now just pass this array to regular Eloquent function and Voila!    
        MicroCategory::create($data);


        // $microCategory = MicroCategory::create($request->all());

        // micro_category_id

        return redirect()->route('micro-categories.index')
            ->with('success', 'MicroCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microCategory = MicroCategory::find($id);

        return view('micro-category.show', compact('microCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microCategory = MicroCategory::find($id);
        $app_languges=  LanguageSetting::active()->get();
        $microParentCategory=  MicroParentCategory::active()->get();

        return view('micro-category.edit', compact('microCategory', 'app_languges', 'microParentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MicroCategory $microCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MicroCategory $microCategory)
    {
        request()->validate(MicroCategory::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategoryOld = new MicroCategory();
            foreach($microCategoryOld->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');
        $data['micro_parent_category_id']=$request->input('micro_parent_category_id');

         
        $microCategory->update($data);
        return redirect()->route('micro-categories.index')
            ->with('success', 'MicroCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $microCategory = MicroCategory::find($id)->delete();

        return redirect()->route('micro-categories.index')
            ->with('success', 'MicroCategory deleted successfully');
    }
   

}
