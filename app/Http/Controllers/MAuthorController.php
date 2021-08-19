<?php

namespace App\Http\Controllers;

use App\Models\LanguageSetting;
use App\Models\MAuthor;
use Illuminate\Http\Request;

/**
 * Class MAuthorController
 * @package App\Http\Controllers
 */
class MAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mAuthors = MAuthor::paginate();

        return view('m-author.index', compact('mAuthors'))
            ->with('i', (request()->input('page', 1) - 1) * $mAuthors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mAuthor = new MAuthor();
        $app_languges=  LanguageSetting::active()->get();

        return view('m-author.create', compact('mAuthor', 'app_languges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(MAuthor::rules());

        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MAuthor();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');


        $mAuthor = MAuthor::create($data);

        return redirect()->route('m-authors.index')
            ->with('success', 'MAuthor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mAuthor = MAuthor::find($id);

        return view('m-author.show', compact('mAuthor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mAuthor = MAuthor::find($id);
        $app_languges=  LanguageSetting::active()->get();

        return view('m-author.edit', compact('mAuthor', 'app_languges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MAuthor $mAuthor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MAuthor $mAuthor)
    {
        request()->validate(MAuthor::rules());
        $app_languges=  LanguageSetting::active()->get();
        $data=[];
        foreach($app_languges as $k=>$v){
            $microCategory = new MAuthor();
            foreach($microCategory->translatedAttributes as $key=>$val){
                $data[$v->code][$val]=$request->input($val.'_'.$v->code);
            }
        }
        $data['status']=$request->input('status');

        $mAuthor->update($data);

        return redirect()->route('m-authors.index')
            ->with('success', 'MAuthor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mAuthor = MAuthor::find($id)->delete();

        return redirect()->route('m-authors.index')
            ->with('success', 'MAuthor deleted successfully');
    }
}
