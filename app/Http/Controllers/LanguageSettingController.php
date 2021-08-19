<?php

namespace App\Http\Controllers;

use App\Models\LanguageSetting;
use Illuminate\Http\Request;

/**
 * Class LanguageSettingController
 * @package App\Http\Controllers
 */
class LanguageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languageSettings = LanguageSetting::paginate();

        return view('language-setting.index', compact('languageSettings'))
            ->with('i', (request()->input('page', 1) - 1) * $languageSettings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languageSetting = new LanguageSetting();
        return view('language-setting.create', compact('languageSetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LanguageSetting::$rules);
        
        $status=false;
        $set_as_default=false;
        if(array_key_exists('status', $request->all())&&$request['status']=='on'){
            $status=true;
        }
        if(array_key_exists('set_as_default', $request->all())&&$request['set_as_default']=='on'){
            $set_as_default=true;
        }
        $data=[
            'code'=>$request['code'],
            'title'=>$request['title'],
            'status'=>$status,
            'set_as_default'=>$set_as_default,
            'icon'=>$request['icon'],
        ];
        $languageSetting = LanguageSetting::create($data);
        return redirect()->route('language-settings.index')
            ->with('success', 'LanguageSetting created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $languageSetting = LanguageSetting::find($id);

        return view('language-setting.show', compact('languageSetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languageSetting = LanguageSetting::find($id);

        return view('language-setting.edit', compact('languageSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LanguageSetting $languageSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LanguageSetting $languageSetting)
    {
        request()->validate(LanguageSetting::$rules);
        $status=false;
        $set_as_default=false;
        if(array_key_exists('status', $request->all())&&$request['status']=='on'){
            $status=true;
        }
        if(array_key_exists('set_as_default', $request->all())&&$request['set_as_default']=='on'){
            $set_as_default=true;
        }
        $data=[
            'code'=>$request['code'],
            'title'=>$request['title'],
            'status'=>$status,
            'set_as_default'=>$set_as_default,
            'icon'=>$request['icon'],
        ];

        $languageSetting->update($data);
        return redirect()->route('language-settings.index')
            ->with('success', 'LanguageSetting updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $languageSetting = LanguageSetting::find($id)->delete();

        return redirect()->route('language-settings.index')
            ->with('success', 'LanguageSetting deleted successfully');
    }
}
