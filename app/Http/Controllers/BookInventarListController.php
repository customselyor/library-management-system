<?php

namespace App\Http\Controllers;

use App\Models\BookInventarList;
use Illuminate\Http\Request;

/**
 * Class BookInventarListController
 * @package App\Http\Controllers
 */
class BookInventarListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookInventarLists = BookInventarList::paginate();

        return view('book-inventar-list.index', compact('bookInventarLists'))
            ->with('i', (request()->input('page', 1) - 1) * $bookInventarLists->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookInventarList = new BookInventarList();
        return view('book-inventar-list.create', compact('bookInventarList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookInventarList::$rules);

        $bookInventarList = BookInventarList::create($request->all());

        return redirect()->route('book-inventar-lists.index')
            ->with('success', 'BookInventarList created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookInventarList = BookInventarList::find($id);

        return view('book-inventar-list.show', compact('bookInventarList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookInventarList = BookInventarList::find($id);

        return view('book-inventar-list.edit', compact('bookInventarList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookInventarList $bookInventarList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookInventarList $bookInventarList)
    {
        request()->validate(BookInventarList::$rules);

        $bookInventarList->update($request->all());

        return redirect()->route('book-inventar-lists.index')
            ->with('success', 'BookInventarList updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookInventarList = BookInventarList::find($id)->delete();

        return redirect()->route('book-inventar-lists.index')
            ->with('success', 'BookInventarList deleted successfully');
    }
}
