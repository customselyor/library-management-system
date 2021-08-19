<?php

namespace App\Http\Controllers;

use App\Models\LanguageSetting;
use App\Models\MicroCategory;
use App\Models\MicroSubCategory;
use Illuminate\Http\Request;

/**
 * Class MicroSubCategoryController
 * @package App\Http\Controllers
 */
class MicroSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microSubCategories = MicroSubCategory::paginate();

        return view('micro-sub-category.index', compact('microSubCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $microSubCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microSubCategory = new MicroSubCategory();
        $app_languges=  LanguageSetting::active()->get();
        $microCategories = MicroCategory::active()->get(); 

        return view('micro-sub-category.create', compact('microSubCategory', 'app_languges', 'microCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MicroSubCategory::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MicroSubCategory();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        } 
        $data['micro_category_id']=$request->input('micro_category_id');
        $data['status']=$request->input('status');
         
        $microSubCategory = MicroSubCategory::create($data);

        return redirect()->route('micro-sub-categories.index')
            ->with('success', 'MicroSubCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microSubCategory = MicroSubCategory::find($id);

        return view('micro-sub-category.show', compact('microSubCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microSubCategory = MicroSubCategory::find($id);
        $app_languges=  LanguageSetting::active()->get();
        $microCategories = MicroCategory::active()->get(); 

        return view('micro-sub-category.edit', compact('microSubCategory', 'app_languges', 'microCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MicroSubCategory $microSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MicroSubCategory $microSubCategory)
    {
        request()->validate(MicroSubCategory::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MicroSubCategory();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        } 
        $data['micro_category_id']=$request->input('micro_category_id');
        $data['status']=$request->input('status');
        $microSubCategory->update($data);
        return redirect()->route('micro-sub-categories.index')
            ->with('success', 'MicroSubCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $microSubCategory = MicroSubCategory::find($id)->delete();

        return redirect()->route('micro-sub-categories.index')
            ->with('success', 'MicroSubCategory deleted successfully');
    }
    
    public function findSubCategoryId($id)
    {
        $data = MicroSubCategory::where('micro_category_id', $id)
                    ->with('translations')
                    ->get(['id'])
                    ->transform(function($faq, $key) {
                        return [
                            'id' => $faq->id,
                            'title' => $faq->translate(config('app.locale'))->title,
                        ];
                    });
        return response()->json($data);
    }

}
