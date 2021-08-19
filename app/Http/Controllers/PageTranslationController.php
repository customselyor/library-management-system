<?php

namespace App\Http\Controllers;

use App\Models\PageTranslation;
use Illuminate\Http\Request;

/**
 * Class PageTranslationController
 * @package App\Http\Controllers
 */
class PageTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTranslations = PageTranslation::paginate();

        return view('page-translation.index', compact('pageTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $pageTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTranslation = new PageTranslation();
        return view('page-translation.create', compact('pageTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PageTranslation::$rules);

        $pageTranslation = PageTranslation::create($request->all());

        return redirect()->route('page-translations.index')
            ->with('success', 'PageTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTranslation = PageTranslation::find($id);

        return view('page-translation.show', compact('pageTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTranslation = PageTranslation::find($id);

        return view('page-translation.edit', compact('pageTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PageTranslation $pageTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageTranslation $pageTranslation)
    {
        request()->validate(PageTranslation::$rules);

        $pageTranslation->update($request->all());

        return redirect()->route('page-translations.index')
            ->with('success', 'PageTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pageTranslation = PageTranslation::find($id)->delete();

        return redirect()->route('page-translations.index')
            ->with('success', 'PageTranslation deleted successfully');
    }
}
