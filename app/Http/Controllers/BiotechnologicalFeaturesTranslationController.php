<?php

namespace App\Http\Controllers;

use App\Models\BiotechnologicalFeatureTranslation;
use Illuminate\Http\Request;

/**
 * Class BiotechnologicalFeaturesTranslationController
 * @package App\Http\Controllers
 */
class BiotechnologicalFeaturesTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biotechnologicalFeaturesTranslations = BiotechnologicalFeatureTranslation::paginate();

        return view('biotechnological-features-translation.index', compact('biotechnologicalFeaturesTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $biotechnologicalFeaturesTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biotechnologicalFeaturesTranslation = new BiotechnologicalFeatureTranslation();
        return view('biotechnological-features-translation.create', compact('biotechnologicalFeaturesTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BiotechnologicalFeatureTranslation::$rules);

        $biotechnologicalFeaturesTranslation = BiotechnologicalFeatureTranslation::create($request->all());

        return redirect()->route('biotechnological-features-translations.index')
            ->with('success', 'BiotechnologicalFeatureTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biotechnologicalFeaturesTranslation = BiotechnologicalFeatureTranslation::find($id);

        return view('biotechnological-features-translation.show', compact('biotechnologicalFeaturesTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biotechnologicalFeaturesTranslation = BiotechnologicalFeatureTranslation::find($id);

        return view('biotechnological-features-translation.edit', compact('biotechnologicalFeaturesTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BiotechnologicalFeatureTranslation $biotechnologicalFeaturesTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BiotechnologicalFeatureTranslation $biotechnologicalFeaturesTranslation)
    {
        request()->validate(BiotechnologicalFeatureTranslation::$rules);

        $biotechnologicalFeaturesTranslation->update($request->all());

        return redirect()->route('biotechnological-features-translations.index')
            ->with('success', 'BiotechnologicalFeatureTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $biotechnologicalFeaturesTranslation = BiotechnologicalFeatureTranslation::find($id)->delete();

        return redirect()->route('biotechnological-features-translations.index')
            ->with('success', 'BiotechnologicalFeatureTranslation deleted successfully');
    }
}
