<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeFormation;
use App\Models\Formation;
use App\Http\Requests\FormationRequest;


class FormationController extends Controller
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
        $formations = Formation::all(); //Get all formations

        return view('admin.formations.index')->with('formations', $formations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeFormation::all(); //Get all types

        return view('admin.formations.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FormationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationRequest $request)
    {
        if ($request->hasfile('document')) {
            $fileUrl = $request->file('document');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter document
        }

        $formation = new Formation();
        $formation->title_formation = $request->input('title_formation');
        $formation->description_formation = $request->input('description_formation');
        $formation->type_formation_id = $request->input('type_formation_id');
        $formation->date_debut = $request->input('date_debut');
        $formation->date_fin = $request->input('date_fin');
        $formation->cout_formation = $request->input('cout_formation');
        $formation->status_formation = $request->input('status_formation');

        if ($request->hasfile('document')) {
            $formation->document_formation = $fileNameToStore;
        }

        $formation->save();

        return redirect()->route('admin.formations.index')->with('success', 'Formation ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::findOrFail($id); //Get formation by id

        return view('admin.formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = TypeFormation::all(); //Get all types
        $formation = Formation::findOrFail($id); //Get formation by id

        return view('admin.formations.edit', compact('types', 'formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FormationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormationRequest $request, $id)
    {

        if ($request->hasfile('document')) {
            $fileUrl = $request->file('document');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter document
        }

        $formation = Formation::findOrFail($id); //Get formation by id
        $formation->title_formation = $request->input('title_formation');
        $formation->description_formation = $request->input('description_formation');
        $formation->type_formation_id = $request->input('type_formation_id');
        $formation->date_debut = $request->input('date_debut');
        $formation->date_fin = $request->input('date_fin');
        $formation->cout_formation = $request->input('cout_formation');
        $formation->status_formation = $request->input('status_formation');

        if ($request->hasfile('document')) {
            $formation->document_formation = $fileNameToStore;
        }

        $formation->save();

        return redirect()->route('admin.formations.index')->with('success', 'Formation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::findOrFail($id); //Get formation by id
        $formation->delete();

        return redirect()->route('admin.formations.index')->with('success', 'Formation supprimée avec succès.');
    }
}
