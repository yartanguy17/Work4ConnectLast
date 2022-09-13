<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffreHistorique;

class OffreHistoriqueController extends Controller
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
        $historicals = OffreHistorique::orderBy('created_at', 'desc')->get();

        return view('admin.offreHistoriques.index', compact('historicals'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historicals = OffreHistorique::findOrFail($id);
        $historicals->delete();

        return redirect()->route('historicals.admin.index')->with('success', trans('success.logsdel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletehistoricals($id)
    {
        $historicals = OffreHistorique::findOrFail($id);
        $historicals->delete();

        $message = trans('success.logsdel');

        return response()->json(['success' => true, 'message' => $message]);
    }
}
