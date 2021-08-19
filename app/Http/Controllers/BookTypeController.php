<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;

/**
 * Class BookTypeController
 * @package App\Http\Controllers
 */
class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookTypes = BookType::select([ 'id', 'name', 'code', 'status'])->paginate();
        // $bookTypes = BookType::paginate();
        
        return view('book-type.index', compact('bookTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $bookTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookType = new BookType();
        return view('book-type.create', compact('bookType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookType::$rules);

        $bookType = BookType::create($request->all());

        return redirect()->route('book-types.index')
            ->with('success', 'BookType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookType = BookType::find($id);

        return view('book-type.show', compact('bookType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookType = BookType::find($id);

        return view('book-type.edit', compact('bookType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookType $bookType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookType $bookType)
    {
        request()->validate(BookType::$rules);

        $bookType->update($request->all());

        return redirect()->route('book-types.index')
            ->with('success', 'BookType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookType = BookType::find($id)->delete();

        return redirect()->route('book-types.index')
            ->with('success', 'BookType deleted successfully');
    }
}
