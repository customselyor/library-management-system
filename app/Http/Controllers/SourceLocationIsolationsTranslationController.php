<?php

namespace App\Http\Controllers;

use App\Models\SourceLocationIsolationsTranslation;
use Illuminate\Http\Request;

/**
 * Class SourceLocationIsolationsTranslationController
 * @package App\Http\Controllers
 */
class SourceLocationIsolationsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sourceLocationIsolationsTranslations = SourceLocationIsolationsTranslation::paginate();

        return view('source-location-isolations-translation.index', compact('sourceLocationIsolationsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $sourceLocationIsolationsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sourceLocationIsolationsTranslation = new SourceLocationIsolationsTranslation();
        return view('source-location-isolations-translation.create', compact('sourceLocationIsolationsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SourceLocationIsolationsTranslation::$rules);

        $sourceLocationIsolationsTranslation = SourceLocationIsolationsTranslation::create($request->all());

        return redirect()->route('source-location-isolations-translations.index')
            ->with('success', 'SourceLocationIsolationsTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sourceLocationIsolationsTranslation = SourceLocationIsolationsTranslation::find($id);

        return view('source-location-isolations-translation.show', compact('sourceLocationIsolationsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sourceLocationIsolationsTranslation = SourceLocationIsolationsTranslation::find($id);

        return view('source-location-isolations-translation.edit', compact('sourceLocationIsolationsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SourceLocationIsolationsTranslation $sourceLocationIsolationsTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceLocationIsolationsTranslation $sourceLocationIsolationsTranslation)
    {
        request()->validate(SourceLocationIsolationsTranslation::$rules);

        $sourceLocationIsolationsTranslation->update($request->all());

        return redirect()->route('source-location-isolations-translations.index')
            ->with('success', 'SourceLocationIsolationsTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sourceLocationIsolationsTranslation = SourceLocationIsolationsTranslation::find($id)->delete();

        return redirect()->route('source-location-isolations-translations.index')
            ->with('success', 'SourceLocationIsolationsTranslation deleted successfully');
    }
}
