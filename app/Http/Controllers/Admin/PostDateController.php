<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostDate;
use Illuminate\Http\Request;

class PostDateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    public function index()
    {
        $nb_poste = PostDate::all();

        return view('admin.nbdaypost.index')->with('nbpostes', $nb_poste);
    }

    public function edit(Request $request)
    {
        $nbdate = PostDate::find($request->id)->update([
            'nb_day_post' => $request->date,
        ]);

        return response()->json(['status' => true, 'message' => trans('success.postupd')]);
    }
}
