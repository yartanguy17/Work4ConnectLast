<?php

namespace App\Http\Controllers\Admin;

use App\Models\TypeAbsence;
use App\Models\DemandeAbsence;
use App\Http\Requests\StoreTypeAbsenceRequest;
use App\Http\Controllers\Controller;


class TypeAbsenceController extends Controller
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
        $typeabsences = TypeAbsence::all(); //Get all type absence

        return view('admin.typeabsences.index')->with('typeabsences', $typeabsences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typeabsences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreTypeAbsenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeAbsenceRequest $request)
    {
        $typeabsences = new TypeAbsence(); //Get type absences specified by id
        $typeabsences->type_absence_name = $request->input('type_absence_name');

        $check = TypeAbsence::where('type_absence_name', $typeabsences->type_absence_name)->get(); //Verifier si type d'absence existe déjà

        if (count($check) > 0) {

            return back()->with('error', "Type d'absence $typeabsences->type_absence_name existe déjà");

        } else {

            $typeabsences->save(); //insert in database

            return redirect()->route('admin.typeabsences.index')->with('success', 'Type absence ajouté avec succès.');
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
        $typeabsences = TypeAbsence::findOrFail(decrypt($id));

        return View('admin.typeabsences.show', compact('typeabsences')); //return
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeabsences = TypeAbsence::findOrFail(decrypt($id));

        return View('admin.typeabsences.edit', compact('typeabsences')); //return
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreTypeAbsenceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeAbsenceRequest $request, $id)
    {
        $typeabsences = TypeAbsence::findOrFail(decrypt($id));
        $typeabsences->type_absence_name = $request->input('type_absence_name');

        $check = TypeAbsence::where('type_absence_name', $typeabsences->type_absence_name)->get(); //Verifier si type d'absence existe déjà

        if (count($check) > 1) {

            return back()->with('error', "Type d'absence $typeabsences->type_absence_name existe déjà");

        } else {

            $typeabsences->save(); //insert in database

            return redirect()->route('admin.typeabsences.index')->with('success', 'Type absence ' . $typeabsences->type_absence_name . ' modifier avec succès');
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
        $check = DemandeAbsence::where('type_absence_id', $id)->get();

        if (count($check) > 0) {

            return back()->with('error', "Impossible de supprimer type d'absence car il est lié à une demade d'absence");

        } else {

            $typeabsences = TypeAbsence::findOrFail($id); //Find a user with a given id and delete
            $typeabsences->delete(); //function in delete

            return redirect()->route('admin.typeabsences.index')->with('success', 'Type absence  supprimée avec succès.');
        }
    }
}
