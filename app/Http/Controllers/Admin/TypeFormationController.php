<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeFormation;
use App\Models\Formation;
use App\Http\Requests\TypeFormationRequest;

class TypeFormationController extends Controller
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
        $types = TypeFormation::all(); //Get all types

        return view('admin.typeformations.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typeformations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TypeFormationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeFormationRequest $request)
    {
        $type = new TypeFormation();
        $type->title_type_for = $request->input('title_type_for');
        $type->description_type_for = $request->input('description_type_for');

        $check = TypeFormation::where('title_type_for', $type->title_type_for)->get(); //Verifier si ville existe déjà

        if (count($check) > 0) {

            return back()->with('error', "Type formation $type->title_type_for existe déjà");
        } else {

            $type->save();

            return redirect()->route('admin.typeformations.index')->with('success', 'Type Formation ajouté avec succès.');
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
        $type = TypeFormation::findOrFail($id); //Get category specified by id

        return view('admin.typeformations.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = TypeFormation::findOrFail($id); //Get category specified by id

        return view('admin.typeformations.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TypeFormationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeFormationRequest $request, $id)
    {
        $type = TypeFormation::findOrFail($id); //Get category specified by id
        $type->title_type_for = $request->input('title_type_for');
        $type->description_type_for = $request->input('description_type_for');

        $check = TypeFormation::where('title_type_for', $type->title_type_for)->get(); //Verifier si ville existe déjà

        if (count($check) > 1) {

            return back()->with('error', "Type formation $type->title_type_for existe déjà");
        } else {

            $type->save();

            return redirect()->route('admin.typeformations.index')->with('success', 'Type Formation mis à jour avec succès.');
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
        $check = Formation::where('type_formation_id', $id)->get();

        if (count($check) > 0) {

            return redirect()->back()->with('error', 'Impossible de supprimer type de formation');
        } else {

            $type = TypeFormation::findOrFail($id); //Find a user with a given id and delete
            $type->delete();

            return redirect()->route('admin.typeformations.index')->with('success', 'Type Formation supprimé avec succès.');
        }
    }
}
