<?php

namespace App\Http\Controllers;

use App\Models\MorganismTranslation;
use Illuminate\Http\Request;

/**
 * Class MorganismsTranslationController
 * @package App\Http\Controllers
 */
class MorganismsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $morganismsTranslations = MorganismTranslation::paginate();

        return view('morganisms-translation.index', compact('morganismsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $morganismsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $morganismsTranslation = new MorganismTranslation();
        return view('morganisms-translation.create', compact('morganismsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MorganismTranslation::$rules);

        $morganismsTranslation = MorganismTranslation::create($request->all());

        return redirect()->route('morganisms-translations.index')
            ->with('success', 'MorganismTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $morganismsTranslation = MorganismTranslation::find($id);

        return view('morganisms-translation.show', compact('morganismsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $morganismsTranslation = MorganismTranslation::find($id);

        return view('morganisms-translation.edit', compact('morganismsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MorganismTranslation $morganismsTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MorganismTranslation $morganismsTranslation)
    {
        request()->validate(MorganismTranslation::$rules);

        $morganismsTranslation->update($request->all());

        return redirect()->route('morganisms-translations.index')
            ->with('success', 'MorganismTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $morganismsTranslation = MorganismTranslation::find($id)->delete();

        return redirect()->route('morganisms-translations.index')
            ->with('success', 'MorganismTranslation deleted successfully');
    }
}
