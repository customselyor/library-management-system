<?php

namespace App\Http\Controllers;

use App\Models\MicroParentCategoryTranslation;
use Illuminate\Http\Request;

/**
 * Class MicroParentCategoryTranslationController
 * @package App\Http\Controllers
 */
class MicroParentCategoryTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microParentCategoryTranslations = MicroParentCategoryTranslation::paginate();

        return view('micro-parent-category-translation.index', compact('microParentCategoryTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $microParentCategoryTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microParentCategoryTranslation = new MicroParentCategoryTranslation();
        return view('micro-parent-category-translation.create', compact('microParentCategoryTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MicroParentCategoryTranslation::$rules);

        $microParentCategoryTranslation = MicroParentCategoryTranslation::create($request->all());

        return redirect()->route('micro-parent-category-translations.index')
            ->with('success', 'MicroParentCategoryTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microParentCategoryTranslation = MicroParentCategoryTranslation::find($id);

        return view('micro-parent-category-translation.show', compact('microParentCategoryTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microParentCategoryTranslation = MicroParentCategoryTranslation::find($id);

        return view('micro-parent-category-translation.edit', compact('microParentCategoryTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MicroParentCategoryTranslation $microParentCategoryTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MicroParentCategoryTranslation $microParentCategoryTranslation)
    {
        request()->validate(MicroParentCategoryTranslation::$rules);

        $microParentCategoryTranslation->update($request->all());

        return redirect()->route('micro-parent-category-translations.index')
            ->with('success', 'MicroParentCategoryTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $microParentCategoryTranslation = MicroParentCategoryTranslation::find($id)->delete();

        return redirect()->route('micro-parent-category-translations.index')
            ->with('success', 'MicroParentCategoryTranslation deleted successfully');
    }
}
