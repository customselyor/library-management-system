<?php

namespace App\Http\Controllers;

use App\Models\BookInventar;
use Illuminate\Http\Request;

/**
 * Class BookInventarController
 * @package App\Http\Controllers
 */
class BookInventarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookInventars = BookInventar::paginate();

        return view('book-inventar.index', compact('bookInventars'))
            ->with('i', (request()->input('page', 1) - 1) * $bookInventars->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookInventar = new BookInventar();
        return view('book-inventar.create', compact('bookInventar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookInventar::$rules);

        $bookInventar = BookInventar::create($request->all());

        return redirect()->route('book-inventars.index')
            ->with('success', 'BookInventar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookInventar = BookInventar::find($id);

        return view('book-inventar.show', compact('bookInventar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookInventar = BookInventar::find($id);

        return view('book-inventar.edit', compact('bookInventar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookInventar $bookInventar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookInventar $bookInventar)
    {
        request()->validate(BookInventar::$rules);

        $bookInventar->update($request->all());

        return redirect()->route('book-inventars.index')
            ->with('success', 'BookInventar updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookInventar = BookInventar::find($id)->delete();

        return redirect()->route('book-inventars.index')
            ->with('success', 'BookInventar deleted successfully');
    }
}
