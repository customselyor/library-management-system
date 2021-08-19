<?php

namespace App\Http\Controllers;

use App\Models\MicroParentCategory;
use App\Models\LanguageSetting;
use Illuminate\Http\Request;

/**
 * Class MicroParentCategoryController
 * @package App\Http\Controllers
 */
class MicroParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microParentCategories = MicroParentCategory::paginate();

        return view('micro-parent-category.index', compact('microParentCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $microParentCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microParentCategory = new MicroParentCategory();
        $app_languges=  LanguageSetting::active()->get();

        return view('micro-parent-category.create', compact('microParentCategory', 'app_languges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MicroParentCategory::rules());
         $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MicroParentCategory();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');

        $microParentCategory = MicroParentCategory::create($data);

        return redirect()->route('micro-parent-categories.index')
            ->with('success', 'MicroParentCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microParentCategory = MicroParentCategory::find($id);

        return view('micro-parent-category.show', compact('microParentCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microParentCategory = MicroParentCategory::find($id);
        $app_languges=  LanguageSetting::active()->get();

        return view('micro-parent-category.edit', compact('microParentCategory', 'app_languges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MicroParentCategory $microParentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MicroParentCategory $microParentCategory)
    {
        request()->validate(MicroParentCategory::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MicroParentCategory();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');

        $microParentCategory->update($data);

        return redirect()->route('micro-parent-categories.index')
            ->with('success', 'MicroParentCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $microParentCategory = MicroParentCategory::find($id);
        $microParentCategory->status=false;
        $microParentCategory->save();

        return redirect()->route('micro-parent-categories.index')
            ->with('success', 'MicroParentCategory deleted successfully');
    }
}
