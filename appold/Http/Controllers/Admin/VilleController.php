<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VilleRequest;
use App\Models\Region;
use App\Models\Ville;
use Monarobase\CountryList\CountryListFacade;

class VilleController extends Controller
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
        //$villes = Ville::all(); //Get all villes
        $villes = Region::join('villes', 'regions.id', '=', 'villes.region_id')
            ->get(['regions.*', 'villes.*']);

        return view('admin.villes.index', compact('villes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all(); //Get all regions

        $countries = CountryListFacade::getList('en');

        return view('admin.villes.create', compact('regions', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\VilleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VilleRequest $request)
    {
        $ville = new Ville();
        $ville->title_ville = $request->input('title_ville');
        $ville->region_id = $request->input('region_id');
        $ville->description_ville = $request->input('description_ville');

        $check = Ville::where('title_ville', $ville->title_ville)->get(); //Verifier si ville existe déjà

        if (count($check) > 0) {

            return back()->with('error', trans('success.villealre'));
        } else {

            $ville->save(); //insert in database

            return redirect()->route('admin.villes.index')->with('success', trans('success.paysadd'));
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
        $ville = Ville::findOrFail($id);

        return view('admin.villes.show', compact('ville'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ville = Ville::findOrFail($id);
        $regions = Region::all(); //Get all regions
        $countries = CountryListFacade::getList('en');

        return view('admin.villes.edit', compact('ville', 'regions', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\VilleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VilleRequest $request, $id)
    {

        $ville = Ville::findOrFail($id);
        $ville->title_ville = $request->input('title_ville');
        $ville->region_id = $request->input('region_id');
        $ville->description_ville = $request->input('description_ville');

        $check = Ville::where('title_ville', $ville->title_ville)->get(); //Verifier si ville existe déjà

        if (count($check) > 1) {

            return back()->with('error', trans('success.villealre'));
        } else {

            $ville->save(); //insert in database

            return redirect()->route('admin.villes.index')->with('success', trans('success.paysupd'));
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
        $ville = Ville::findOrFail($id);
        $ville->delete();

        return redirect()->route('admin.villes.index')->with('success', trans('success.paysdel'));
    }
}
