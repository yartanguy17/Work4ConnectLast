<?php

namespace App\Http\Controllers\Admin;

use App\Models\TypeConge;
use App\Models\Conge;
use App\Http\Requests\StoreTypeCongeRequest;
use App\Http\Controllers\Controller;


class TypeCongeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeconges = TypeConge::all(); //Get all type absence

        return view('admin.typeconges.index')->with('typeconges', $typeconges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typeconges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreTypeCongeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeCongeRequest $request)
    {
        $typeconges = new TypeConge(); //Get type absences specified by id
        $typeconges->type_conge_name = $request->input('type_conge_name');

        $check = TypeConge::where('type_conge_name', $typeconges->type_conge_name)->get(); //Verifier si type d'absence existe déjà

        if (count($check) > 0) {

            return back()->with('error', "Type de congé $typeconges->type_conge_name existe déjà");
        } else {

            $typeconges->save(); //insert in database

            return redirect()->route('admin.typeconges.index')->with('success', 'Type de congé ajouté avec succès.'); //return
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeconges = TypeConge::findOrFail(decrypt($id));

        //return
        return View('admin.typeconges.show', compact('typeconges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeconges = TypeConge::findOrFail(decrypt($id));

        return View('admin.typeconges.edit', compact('typeconges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreTypeCongeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeCongeRequest $request, $id)
    {
        $typeconges = TypeConge::findOrFail(decrypt($id));
        $typeconges->type_conge_name = $request->input('type_conge_name');

        $check = TypeConge::where('type_conge_name', $typeconges->type_conge_name)->get(); //Verifier si type de conge existe déjà

        if (count($check) > 1) {

            return back()->with('error', "Type de congé $typeconges->type_conge_name existe déjà");
        } else {

            $typeconges->save(); //insert in database

            return redirect()->route('admin.typeconges.index')->with('success', 'Type de congé ' . $typeconges->type_conge_name . ' modifier avec succès');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Conge::where('type_conge_id', $id)->get();

        if (count($check) > 0) {

            return back()->with('error', "Impossible de supprimer type de congé car il est lié à un congé");
        } else {

            $typeconges = TypeConge::findOrFail($id); //Find a user with a given id and delete
            $typeconges->delete(); //function in delete

            return redirect()->route('admin.typeconges.index')->with('success', 'Type de congé  supprimée avec succès.'); //return
        }
    }
}
