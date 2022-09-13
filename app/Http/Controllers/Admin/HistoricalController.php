<?php

namespace App\Http\Controllers\Admin;

use App\Models\Historique;
use App\Http\Controllers\Controller;

class HistoricalController extends Controller
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
        $historicals = Historique::orderBy('created_at', 'desc')->get();

        return view('admin.historicals.index', compact('historicals'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historicals = Historique::findOrFail($id);
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
        $historicals = Historique::findOrFail($id);
        $historicals->delete();

        $message = trans('success.logsdel');

        return response()->json(['success' => true, 'message' => $message]);
    }
}
