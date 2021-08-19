<?php

namespace App\Http\Controllers;

use App\Models\MicroorganismsTranslation;
use Illuminate\Http\Request;

/**
 * Class MicroorganismsTranslationController
 * @package App\Http\Controllers
 */
class MicroorganismsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microorganismsTranslations = MicroorganismsTranslation::paginate();

        return view('microorganisms-translation.index', compact('microorganismsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $microorganismsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $microorganismsTranslation = new MicroorganismsTranslation();
        return view('microorganisms-translation.create', compact('microorganismsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MicroorganismsTranslation::$rules);

        $microorganismsTranslation = MicroorganismsTranslation::create($request->all());

        return redirect()->route('microorganisms-translations.index')
            ->with('success', 'MicroorganismsTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microorganismsTranslation = MicroorganismsTranslation::find($id);

        return view('microorganisms-translation.show', compact('microorganismsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microorganismsTranslation = MicroorganismsTranslation::find($id);

        return view('microorganisms-translation.edit', compact('microorganismsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MicroorganismsTranslation $microorganismsTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MicroorganismsTranslation $microorganismsTranslation)
    {
        request()->validate(MicroorganismsTranslation::$rules);

        $microorganismsTranslation->update($request->all());

        return redirect()->route('microorganisms-translations.index')
            ->with('success', 'MicroorganismsTranslation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $microorganismsTranslation = MicroorganismsTranslation::find($id)->delete();

        return redirect()->route('microorganisms-translations.index')
            ->with('success', 'MicroorganismsTranslation deleted successfully');
    }
}
