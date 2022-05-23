<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SecteurRequest;
use App\Models\Offer;
use App\Models\SecteurActivite;
use App\Models\User;

class SecteurController extends Controller
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
        $secteurs = SecteurActivite::all(); //Get all secteurs

        return view('admin.secteurs.index')->with('secteurs', $secteurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.secteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SecteurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecteurRequest $request)
    {
        $secteur = new SecteurActivite();
        $secteur->title_secteur = $request->input('title_secteur');
        $secteur->description_secteur = $request->input('description_secteur');

        $check = SecteurActivite::where('title_secteur', $secteur->title_secteur)->get(); //Verifier si typecontrat existe déjà

        if (count($check) > 0) {

            return back()->with('error', trans('success.typealre'));

        } else {

            $secteur->save();

            return redirect()->route('admin.secteurs.index')->with('success', trans('success.typeactiv'));
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
        $secteur = SecteurActivite::findOrFail($id);

        return view('admin.secteurs.show', compact('secteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secteur = SecteurActivite::findOrFail($id);

        return view('admin.secteurs.edit', compact('secteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SecteurRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecteurRequest $request, $id)
    {
        $secteur = SecteurActivite::findOrFail($id); //Get secteur specified by id
        $secteur->title_secteur = $request->input('title_secteur');
        $secteur->description_secteur = $request->input('description_secteur');
        $check = SecteurActivite::where('title_secteur', $secteur->title_secteur)->get(); //Verifier si typecontrat existe déjà

        if (count($check) > 1) {

            return back()->with('error', trans('success.typealre'));

        } else {

            $secteur->save();

            return redirect()->route('admin.secteurs.index')->with('success', trans('success.typeactivupd'));
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
        $check = Offer::where('secteur_activite_id', $id)->get();
        $check1 = User::where('secteur_activite_id', $id)->get();

        if (count($check) > 0 || count($check1) > 0) {

            return redirect()->back()->with('error', trans('success.typeactdel'));

        } else {

            $secteur = SecteurActivite::findOrFail($id);
            $secteur->delete();

            return redirect()->route('admin.secteurs.index')->with('success', trans('success.typeactdele'));
        }
    }
}
