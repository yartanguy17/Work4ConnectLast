<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;

class NewsletterController extends Controller
{

    public function store(NewsletterRequest $request)
    {
        $newsletters = new Newsletter();
        $newsletters->email = $request->input('email');

        $newsletters->save();

        return redirect()->back()->with('success_new', trans('success.messagesen'));
    }
}
