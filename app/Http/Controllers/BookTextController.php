<?php

namespace App\Http\Controllers;

use App\Models\BookText;
use Illuminate\Http\Request;

/**
 * Class BookTextController
 * @package App\Http\Controllers
 */
class BookTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookTexts = BookText::paginate();

        return view('book-text.index', compact('bookTexts'))
            ->with('i', (request()->input('page', 1) - 1) * $bookTexts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookText = new BookText();
        return view('book-text.create', compact('bookText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookText::$rules);

        $bookText = BookText::create($request->all());

        return redirect()->route('book-texts.index')
            ->with('success', 'BookText created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookText = BookText::find($id);

        return view('book-text.show', compact('bookText'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookText = BookText::find($id);

        return view('book-text.edit', compact('bookText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookText $bookText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookText $bookText)
    {
        request()->validate(BookText::$rules);

        $bookText->update($request->all());

        return redirect()->route('book-texts.index')
            ->with('success', 'BookText updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookText = BookText::find($id)->delete();

        return redirect()->route('book-texts.index')
            ->with('success', 'BookText deleted successfully');
    }
}
