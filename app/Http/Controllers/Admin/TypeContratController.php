<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeContratRequest;
use App\Models\Contrat;
use App\Models\Offer;
use App\Models\TypeContrat;

class TypeContratController extends Controller
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
        $types = TypeContrat::all(); //Get all types

        return view('admin.typecontrats.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typecontrats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TypeContratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeContratRequest $request)
    {
        $type = new TypeContrat();
        $type->title_type_con = $request->input('title_type_con');
        $type->number_type_con = $request->input('number_type_con');
        $type->description_type_con = $request->input('description_type_con');

        $check = TypeContrat::where('title_type_con', $type->title_type_con)->get(); //Verifier si ville existe déjà

        if (count($check) > 0) {

            return back()->with('error', trans('success.contrtypealr'));

        } else {

            $type->save();

            return redirect()->route('admin.typecontrats.index')->with('success', trans('success.contrattype'));
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
        $type = TypeContrat::findOrFail($id); //Get type specified by id

        return view('admin.typecontrats.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = TypeContrat::findOrFail($id); //Get type specified by id

        return view('admin.typecontrats.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TypeContratRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeContratRequest $request, $id)
    {
        $type = TypeContrat::findOrFail($id); //Get type specified by id
        $type->title_type_con = $request->input('title_type_con');
        $type->number_type_con = $request->input('number_type_con');
        $type->description_type_con = $request->input('description_type_con');

        $check = TypeContrat::where('title_type_con', $type->title_type_con)->get(); //Verifier si typecontrat existe déjà

        if (count($check) > 1) {

            return back()->with('error', trans('success.contrtypealr'));

        } else {

            $type->save();

            return redirect()->route('admin.typecontrats.index')->with('success', trans('success.contrattyupd'));
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
        $check = Contrat::where('type_contrat_id', $id)->get();
        $check1 = Offer::where('type_contrat_id', $id)->get();

        if (count($check) > 0 || count($check1) > 0) {

            return redirect()->back()->with('error', trans('success.contrtypbe'));

        } else {

            $type = TypeContrat::findOrFail($id); //Get type specified by id
            $type->delete();

            return redirect()->route('admin.typecontrats.index')->with('success', trans('success.contrtypedelete'));
        }
    }
}
