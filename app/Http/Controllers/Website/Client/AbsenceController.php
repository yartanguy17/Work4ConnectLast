<?php

namespace App\Http\Controllers\Website\Client;

use App\Models\DemandeAbsence;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSignalerClientRequest;

class AbsenceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = DemandeAbsence::where('contrats.client_id', auth()->user()->id)
            ->join('contrats', 'contrats.id', '=', 'demande_absences.contrat_id')
            ->join('users', 'users.id', '=', 'demande_absences.user_id')
            ->where('is_valide', true)
            ->orderBy('demande_absences.created_at', 'desc')->get();

        return view('website.clients.demandes.absence', compact('absences'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absences = DemandeAbsence::findOrFail($id);

        return view('website.clients.demandes.edit', compact('absences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateSignalerClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignalerClientRequest $request, $id)
    {
        $absences = DemandeAbsence::findOrFail($id);
        $absences->is_valide_client = $request->input('is_valide_client');
        $absences->comment_client = $request->input('comment_client');

        $absences->save();

        return redirect()->route('client.absences.index')->with('success', 'Absence validé avec succès.');
    }
}
