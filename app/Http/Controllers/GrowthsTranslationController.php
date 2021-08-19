<?php

namespace App\Http\Controllers;

use App\Models\GrowthTranslation;
use Illuminate\Http\Request;

/**
 * Class GrowthsTranslationController
 * @package App\Http\Controllers
 */
class GrowthsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $growthsTranslations = GrowthTranslation::paginate();

        return view('growths-translation.index', compact('growthsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $growthsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $growthsTranslation = new GrowthTranslation();
        return view('growths-translation.create', compact('growthsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(GrowthTranslation::$rules);

        $growthsTranslation = GrowthTranslation::create($request->all());

        return redirect()->route('growths-translations.index')
            ->with('success', 'GrowthTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $growthsTranslation = GrowthTranslation::find($id);

        return view('growths-translation.show', compact('growthsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $growthsTranslation = GrowthTranslation::find($id);

        return view('growths-translation.edit', compact('growthsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  GrowthTranslation $growthsTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrowthTranslation $growthsTranslation)
    {
        request()->validate(GrowthTranslation::$rules);

        $growthsTranslation->update($request->all());

        return redirect()->route('growths-translations.index')
            ->with('success', 'GrowthTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $growthsTranslation = GrowthTranslation::find($id)->delete();

        return redirect()->route('growths-translations.index')
            ->with('success', 'GrowthTranslation deleted successfully');
    }
}
