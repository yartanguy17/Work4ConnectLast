<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;

class CvController extends Controller
{
    public function index()
    {
        return View('website.pages.cv');
    }
}
