<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conge;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValideCongeRequest;

class CongesController extends Controller
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
        $demandeconges = Conge::orderBy('created_at', 'desc')->get(); //Get all demande de conge

        return view('admin.demandeconges.index', compact('demandeconges'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demandeconges = Conge::findOrFail($id);

        return view('admin.demandeconges.show', compact('demandeconges')); //return
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demandeconges = Conge::findOrFail($id);
        $demandeconges->delete(); //function in delete

        return redirect()->route('admin.demandeconges.index')->with('success', 'Demande de congé supprimée avec succès.'); //return
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateValidateConge($id)
    {
        $demandeconges = Conge::findOrFail($id);

        return view('admin.demandeconges.validate', compact('demandeconges')); //return
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ValideCongeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function validateStoreConge(ValideCongeRequest $request, $id)
    {
        $demandeconges = Conge::findOrFail($id);
        $demandeconges->is_valide = $request->input('is_valide');
        $demandeconges->date_effet = $request->input('date_effet');
        $demandeconges->date_reprise_conge = $request->input('date_reprise_conge');
        $demandeconges->comment_conge = $request->input('comment_conge');

        $demandeconges->save(); //insert in database

        return redirect()->route('admin.demandeconges.index')->with('success', 'Demande de congé validé avec succès '); //return
    }
}
