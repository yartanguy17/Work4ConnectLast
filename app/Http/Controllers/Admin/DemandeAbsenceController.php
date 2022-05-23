<?php

namespace App\Http\Controllers\Admin;

use App\Models\DemandeAbsence;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValideAbsenceRequest;

class DemandeAbsenceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandeabsences = DemandeAbsence::orderBy('created_at', 'desc')->get(); //Get all demande absence

        return view('admin.demandeabsences.index', compact('demandeabsences'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demandeabsences = DemandeAbsence::findOrFail($id); //Get all demande absence

        return view('admin.demandeabsences.show', compact('demandeabsences'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demandeabsences = DemandeAbsence::findOrFail($id);
        $demandeabsences->delete(); //function in delete

        return redirect()->route('admin.demandeabsences.index')->with('success', 'Demande supprimée avec succès.'); //return
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateValidate($id)
    {
        $demandeabsences = DemandeAbsence::findOrFail($id);

        return view('admin.demandeabsences.validate', compact('demandeabsences')); //return
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ValideAbsenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function validateStore(ValideAbsenceRequest $request, $id)
    {
        $demandeabsences = DemandeAbsence::findOrFail($id);
        $demandeabsences->is_valide = $request->input('is_valide');
        $demandeabsences->date_effet = $request->input('date_effet');
        $demandeabsences->comment_demande = $request->input('comment_demande');

        $demandeabsences->save(); //insert in database

        return redirect()->route('admin.demandeabsences.index')->with('success', 'Demande validé avec succès '); //return
    }
}
