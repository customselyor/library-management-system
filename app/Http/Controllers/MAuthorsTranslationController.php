<?php

namespace App\Http\Controllers;

use App\Models\MAuthorTranslation;
use Illuminate\Http\Request;

/**
 * Class MAuthorsTranslationController
 * @package App\Http\Controllers
 */
class MAuthorsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mAuthorsTranslations = MAuthorTranslation::paginate();

        return view('m-authors-translation.index', compact('mAuthorsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $mAuthorsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mAuthorsTranslation = new MAuthorTranslation();
        return view('m-authors-translation.create', compact('mAuthorsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MAuthorTranslation::$rules);

        $mAuthorsTranslation = MAuthorTranslation::create($request->all());

        return redirect()->route('m-authors-translations.index')
            ->with('success', 'MAuthorTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mAuthorsTranslation = MAuthorTranslation::find($id);

        return view('m-authors-translation.show', compact('mAuthorsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mAuthorsTranslation = MAuthorTranslation::find($id);

        return view('m-authors-translation.edit', compact('mAuthorsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MAuthorTranslation $mAuthorsTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MAuthorTranslation $mAuthorsTranslation)
    {
        request()->validate(MAuthorTranslation::$rules);

        $mAuthorsTranslation->update($request->all());

        return redirect()->route('m-authors-translations.index')
            ->with('success', 'MAuthorTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mAuthorsTranslation = MAuthorTranslation::find($id)->delete();

        return redirect()->route('m-authors-translations.index')
            ->with('success', 'MAuthorTranslation deleted successfully');
    }
}
