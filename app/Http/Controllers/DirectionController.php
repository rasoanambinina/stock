<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Product;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = Direction::latest()->paginate(5);

        return view('directions.index',compact('directions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeDirection' => 'required',
            'nom' => 'required',
        ]);

        Direction::create($request->all());

        return redirect()->route('directions')
            ->with('success', 'direction crée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        return view('directions.show',compact('direction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction)
    {
        return view('directions.edit',compact('direction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction)
    {
        $request->validate([
            'codeDirection' => 'required',
            'nom' => 'required',
        ]);

        $direction->update($request->all());

        return redirect()->route('directions')
            ->with('success', 'direction modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();

        return redirect()->route('directions')
            ->with('success','Direction supprimé avec succès.');
    }
}
