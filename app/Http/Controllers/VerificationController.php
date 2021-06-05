<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Materiel;
use App\Personnel;
use App\Verification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::latest()->paginate(5);
        $d= demande::get();
        $verifications = demande::join('personnels','demandes.personnelsId', '=', 'personnels.id')
            ->join('materiels', 'demandes.materielsId', '=', 'materiels.id')
            ->get(['demandes.*', 'materiels.nom as nomMateriel', 'personnels.nom as nomPersonnel']);

        $listepersonnels = Personnel::get();
        // dd($listePersonnels);
        $listeMateriels = Materiel::get();
        //dd($listeMateriels);

        // dd($demandes);
        return view('verifications.index',compact('verifications'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('listePersonnels', $listepersonnels)
            ->with('listeMateriels', $listeMateriels);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Demande $verification)
    {
        if ($request->request->get('a') == 1) {
            $verification->validation ='valider';
            $verification->save();
        }
        elseif ($request->request->get('a') == 2) {
            $verification->validation ='rejeter';
            $verification->save();
        }

        return redirect()->route('verifications');
    }

}
