<?php

namespace App\Http\Controllers;

use App\Models\ConditionsGrowthTranslation;
use Illuminate\Http\Request;

/**
 * Class ConditionsGrowthsTranslationController
 * @package App\Http\Controllers
 */
class ConditionsGrowthsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditionsGrowthsTranslations = ConditionsGrowthTranslation::paginate();

        return view('conditions-growths-translation.index', compact('conditionsGrowthsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $conditionsGrowthsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditionsGrowthsTranslation = new ConditionsGrowthTranslation();
        return view('conditions-growths-translation.create', compact('conditionsGrowthsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ConditionsGrowthTranslation::$rules);

        $conditionsGrowthsTranslation = ConditionsGrowthTranslation::create($request->all());

        return redirect()->route('conditions-growths-translations.index')
            ->with('success', 'ConditionsGrowthTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conditionsGrowthsTranslation = ConditionsGrowthTranslation::find($id);

        return view('conditions-growths-translation.show', compact('conditionsGrowthsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conditionsGrowthsTranslation = ConditionsGrowthTranslation::find($id);

        return view('conditions-growths-translation.edit', compact('conditionsGrowthsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ConditionsGrowthTranslation $conditionsGrowthsTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConditionsGrowthTranslation $conditionsGrowthsTranslation)
    {
        request()->validate(ConditionsGrowthTranslation::$rules);

        $conditionsGrowthsTranslation->update($request->all());

        return redirect()->route('conditions-growths-translations.index')
            ->with('success', 'ConditionsGrowthTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $conditionsGrowthsTranslation = ConditionsGrowthTranslation::find($id)->delete();

        return redirect()->route('conditions-growths-translations.index')
            ->with('success', 'ConditionsGrowthTranslation deleted successfully');
    }
}
