<?php

namespace App\Http\Controllers;

use App\Models\Olber;
use Illuminate\Http\Request;

/**
 * Class OlberController
 * @package App\Http\Controllers
 */
class OlberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $olbers = Olber::paginate();

        return view('olber.index', compact('olbers'))
            ->with('i', (request()->input('page', 1) - 1) * $olbers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $olber = new Olber();
        return view('olber.create', compact('olber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Olber::$rules);
        $olber = Olber::create($request->all());

        return redirect()->route('olbers.index')
            ->with('success', 'Olber created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $olber = Olber::find($id);

        return view('olber.show', compact('olber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $olber = Olber::find($id);

        return view('olber.edit', compact('olber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Olber $olber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olber $olber)
    {
        request()->validate(Olber::$rules);

        $olber->update($request->all());

        return redirect()->route('olbers.index')
            ->with('success', 'Olber updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $olber = Olber::find($id)->delete();

        return redirect()->route('olbers.index')
            ->with('success', 'Olber deleted successfully');
    }
}