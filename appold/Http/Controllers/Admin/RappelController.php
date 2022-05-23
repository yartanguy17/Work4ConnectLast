<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rappel;
use Illuminate\Http\Request;

class RappelController extends Controller
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
        $rappels = Rappel::where('status', 0)->get();

        return view('admin.rappels.index', compact('rappels'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $archived = Rappel::where('status', 1)->get();

        return view('admin.rappels.archived', compact('archived'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rappels = Rappel::findOrFail($id);

        return view('admin.rappels.show', compact('rappels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rappels = Rappel::findOrFail($id);

        return view('admin.rappels.edit', compact('rappels'));
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
        $rappels = Rappel::findOrFail($id);
        $rappels->comment_rappel = $request->input('comment_rappel');
        $rappels->status = 1;

        $rappels->save();

        return redirect()->route('admin.rappel.archived')->with('success', 'Rappel traité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rappels = Rappel::findOrFail($id);
        $rappels->delete();

        return redirect()->route('admin.rappels.index')->with('success', 'Rappel supprimée avec succès.');
    }
}
