<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\DemandeFormation;

class DemandeFormationController extends Controller
{
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
        $demandes = DemandeFormation::where('status', 0)->get();

        return view('admin.demandeformations.index')->with('demandes', $demandes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $demandes = DemandeFormation::where('status', 1)->get();

        return view('admin.demandeformations.archived')->with('demandes', $demandes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function treat($id)
    {
        $demande = DemandeFormation::findOrFail($id); //Get formation specified by id
        $formations = Formation::all();

        return view('admin.demandeformations.edit', compact('demande', 'formations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demande = DemandeFormation::findOrFail($id);

        return view('admin.demandeformations.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demande = DemandeFormation::findOrFail($id);

        return view('admin.demandeformations.edit', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTreat(Request $request, $id)
    {
        $demande = DemandeFormation::findOrFail($id);
        $demande->formation_id = $request->input('formation_id');
        $demande->motif_dem_for = $request->input('motif_dem_for');
        $demande->description_dem_for = $request->input('description_dem_for');
        $demande->is_favorable = $request->input('is_favorable');
        $demande->decision_dem_for = $request->input('decision_dem_for');
        $demande->is_active = 0;
        $demande->status = 1;

        $demande->save();

        return redirect()->route('admin.demandeformation.archived')->with('success', 'Demande de formation traitée avec succès.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $demande = DemandeFormation::findOrFail($id);
        $demande->formation_id = $request->input('formation_id');
        $demande->motif_dem_for = $request->input('motif_dem_for');
        $demande->description_dem_for = $request->input('description_dem_for');
        $demande->is_favorable = $request->input('is_favorable');
        $demande->decision_dem_for = $request->input('decision_dem_for');
        $demande->is_active = 0;
        $demande->status = 1;

        $demande->save();

        return redirect()->route('admin.demandeformation.archived')->with('success', 'Demande de formation traitée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demande = DemandeFormation::findOrFail($id);
        $demande->delete();

        return redirect()->route('admin.demandeformations.index')->with('success', 'Demande de formation supprimée avec succès.');
    }
}
