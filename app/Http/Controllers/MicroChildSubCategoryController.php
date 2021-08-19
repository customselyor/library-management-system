<?php

namespace App\Http\Controllers;

use App\Models\LanguageSetting;
use App\Models\MicroCategory;
use App\Models\MicroChildSubCategory;
use App\Models\MicroSubCategory;
use Illuminate\Http\Request;

/**
 * Class MicroChildSubCategoryController
 * @package App\Http\Controllers
 */
class MicroChildSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microChildSubCategories = MicroChildSubCategory::paginate();

        return view('micro-child-sub-category.index', compact('microChildSubCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $microChildSubCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microChildSubCategory = new MicroChildSubCategory();
        $app_languges=  LanguageSetting::active()->get();
        $microCategories = MicroCategory::active()->get();
        
        return view('micro-child-sub-category.create', compact('microChildSubCategory', 'app_languges', 'microCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MicroChildSubCategory::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MicroChildSubCategory();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        } 
        $data['micro_category_id']=$request->input('micro_category_id');
        $data['micro_sub_category_id']=$request->input('micro_sub_category_id');
        $data['status']=$request->input('status');
         
        $microChildSubCategory = MicroChildSubCategory::create($data);

        return redirect()->route('micro-child-sub-categories.index')
            ->with('success', 'MicroChildSubCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microChildSubCategory = MicroChildSubCategory::find($id);

        return view('micro-child-sub-category.show', compact('microChildSubCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microChildSubCategory = MicroChildSubCategory::find($id);
        $app_languges=  LanguageSetting::active()->get();
        $microCategories = MicroCategory::active()->get(); 
        
        return view('micro-child-sub-category.edit', compact('microChildSubCategory','app_languges', 'microCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MicroChildSubCategory $microChildSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MicroChildSubCategory $microChildSubCategory)
    {
        request()->validate(MicroChildSubCategory::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MicroChildSubCategory();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        } 
        $data['micro_category_id']=$request->input('micro_category_id');
        $data['micro_sub_category_id']=$request->input('micro_sub_category_id');
        $data['status']=$request->input('status');

        
        $microChildSubCategory->update($data);

        return redirect()->route('micro-child-sub-categories.index')
            ->with('success', 'MicroChildSubCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $microChildSubCategory = MicroChildSubCategory::find($id)->delete();

        return redirect()->route('micro-child-sub-categories.index')
            ->with('success', 'MicroChildSubCategory deleted successfully');
    }


    public function findChildSubCategoryId($id)
    {
        $data = MicroChildSubCategory::where('micro_sub_category_id', $id)
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
