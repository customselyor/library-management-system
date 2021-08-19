<?php

namespace App\Http\Controllers;

use App\Models\BookTextType;
use Illuminate\Http\Request;

/**
 * Class BookTextTypeController
 * @package App\Http\Controllers
 */
class BookTextTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookTextTypes = BookTextType::paginate();

        return view('book-text-type.index', compact('bookTextTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $bookTextTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookTextType = new BookTextType();
        return view('book-text-type.create', compact('bookTextType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookTextType::$rules);

        $bookTextType = BookTextType::create($request->all());

        return redirect()->route('book-text-types.index')
            ->with('success', 'BookTextType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookTextType = BookTextType::find($id);

        return view('book-text-type.show', compact('bookTextType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookTextType = BookTextType::find($id);

        return view('book-text-type.edit', compact('bookTextType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookTextType $bookTextType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookTextType $bookTextType)
    {
        request()->validate(BookTextType::$rules);

        $bookTextType->update($request->all());

        return redirect()->route('book-text-types.index')
            ->with('success', 'BookTextType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookTextType = BookTextType::find($id)->delete();

        return redirect()->route('book-text-types.index')
            ->with('success', 'BookTextType deleted successfully');
    }
}
