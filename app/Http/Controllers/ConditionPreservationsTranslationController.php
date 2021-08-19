<?php

namespace App\Http\Controllers;

use App\Models\ConditionPreservationTranslation;
use Illuminate\Http\Request;

/**
 * Class ConditionPreservationsTranslationController
 * @package App\Http\Controllers
 */
class ConditionPreservationsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditionPreservationsTranslations = ConditionPreservationTranslation::paginate();

        return view('condition-preservations-translation.index', compact('conditionPreservationsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $conditionPreservationsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditionPreservationsTranslation = new ConditionPreservationTranslation();
        return view('condition-preservations-translation.create', compact('conditionPreservationsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ConditionPreservationTranslation::$rules);

        $conditionPreservationsTranslation = ConditionPreservationTranslation::create($request->all());

        return redirect()->route('condition-preservations-translations.index')
            ->with('success', 'ConditionPreservationTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conditionPreservationsTranslation = ConditionPreservationTranslation::find($id);

        return view('condition-preservations-translation.show', compact('conditionPreservationsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conditionPreservationsTranslation = ConditionPreservationTranslation::find($id);

        return view('condition-preservations-translation.edit', compact('conditionPreservationsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ConditionPreservationTranslation $conditionPreservationsTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConditionPreservationTranslation $conditionPreservationsTranslation)
    {
        request()->validate(ConditionPreservationTranslation::$rules);

        $conditionPreservationsTranslation->update($request->all());

        return redirect()->route('condition-preservations-translations.index')
            ->with('success', 'ConditionPreservationTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $conditionPreservationsTranslation = ConditionPreservationTranslation::find($id)->delete();

        return redirect()->route('condition-preservations-translations.index')
            ->with('success', 'ConditionPreservationTranslation deleted successfully');
    }
}
