<?php

namespace App\Http\Controllers\Admin;

use App\Models\SignaleAbsence;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValideAbsenceRequest;

class SignalerController extends Controller
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
        $signalerabsences = SignaleAbsence::orderBy('created_at', 'desc')->get(); //Get all demande absence

        return view('admin.signalerabsences.index', compact('signalerabsences'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $signalerabsences = SignaleAbsence::findOrFail($id); //Get offer specified by id

        return view('admin.signalerabsences.show', compact('signalerabsences'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $signalerabsences = SignaleAbsence::findOrFail($id);
        $signalerabsences->delete(); //function in delete

        return redirect()->route('admin.signalerabsences.index')->with('success', 'Demande supprimée avec succès.'); //return
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateValidateSignaler($id)
    {
        $signalerabsences = SignaleAbsence::findOrFail($id);

        return view('admin.signalerabsences.validate', compact('signalerabsences')); //return
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ValideAbsenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function validateStoreSignaler(ValideAbsenceRequest $request, $id)
    {
        $signalerabsences = SignaleAbsence::findOrFail($id);
        $signalerabsences->is_valide = $request->input('is_valide');
        $signalerabsences->date_effet = $request->input('date_effet');

        $signalerabsences->save(); //insert in database

        return redirect()->route('admin.signalerabsences.index')->with('success', 'Demande validé avec succès '); //return
    }
}
