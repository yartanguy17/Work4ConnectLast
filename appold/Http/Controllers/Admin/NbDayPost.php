<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostDate;

class NbDayPost extends Controller
{
    public function index()
    {

        $nb_poste = PostDate::all();

        return view('admin.nbdaypost.index')->with('nbpostes', $nb_poste);
    }
}
