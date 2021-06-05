<?php

namespace App\Http\Controllers;

use App\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::latest()->paginate(5);

        return view('personnels.index',compact('personnels'))
            ->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personnels.create');
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
            'referencePersonnel' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'numCIN' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'fonction' => 'required',
        ]);

        Personnel::create($request->all());

        return redirect()->route('personnels')
            ->with('success', 'personnel crée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        return view('personnels.show',compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        return view('personnels.edit',compact('personnel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'referencePersonnel' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'numCIN' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'fonction' => 'required',

        ]);
        $personnel->update($request->all());

        return redirect()->route('personnels')
            ->with('success', 'personnel modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->delete();

        return redirect()->route('personnels')
            ->with('success', 'personnel supprimé avec succès.');
    }

    /**
     * get personne qui sont dépositaire comptable
     *
     * @return \Illuminate\Http\Response
     */
    public function depositaireComptable()
    {
        $personnels = Personnel::where('fonction', '=', 'Dépositaire comptable')->latest()->paginate(5);

        return view('personnels.dpComptable',compact('personnels'))
            ->with('i',(request()->input('page',1) - 1) * 5);
    }
}
