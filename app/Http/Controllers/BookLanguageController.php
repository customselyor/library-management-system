<?php

namespace App\Http\Controllers;

use App\Models\BookLanguage;
use Illuminate\Http\Request;

/**
 * Class BookLanguageController
 * @package App\Http\Controllers
 */
class BookLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookLanguages = BookLanguage::paginate();

        return view('book-language.index', compact('bookLanguages'))
            ->with('i', (request()->input('page', 1) - 1) * $bookLanguages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookLanguage = new BookLanguage();
        return view('book-language.create', compact('bookLanguage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookLanguage::$rules);

        $bookLanguage = BookLanguage::create($request->all());

        return redirect()->route('book-languages.index')
            ->with('success', 'BookLanguage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookLanguage = BookLanguage::find($id);

        return view('book-language.show', compact('bookLanguage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookLanguage = BookLanguage::find($id);

        return view('book-language.edit', compact('bookLanguage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookLanguage $bookLanguage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookLanguage $bookLanguage)
    {
        request()->validate(BookLanguage::$rules);

        $bookLanguage->update($request->all());

        return redirect()->route('book-languages.index')
            ->with('success', 'BookLanguage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookLanguage = BookLanguage::find($id)->delete();

        return redirect()->route('book-languages.index')
            ->with('success', 'BookLanguage deleted successfully');
    }
}
