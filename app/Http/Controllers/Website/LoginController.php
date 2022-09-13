<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Ville;

class LoginController extends Controller
{
    public function index()
    {

        $villes = Ville::select(
            'villes.id',
            'villes.title_ville'
        )->orderBy('title_ville')->get();

        return view('website.pages.login_register', compact('villes'));
    }
}
