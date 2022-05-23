<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class cv extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function admin_cv(Request $request)
    {
        $prestataire = User::all();
        $prestataires = User::all();
        
        return view('admin.cv.index', compact('prestataires', 'prestataire'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    public function get_cv()
    {
        return view('admin.cv.details');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        $latestposts = Post::orderBy('created_at', 'desc')->where('status', 1)->limit(3)->get();

        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title_post', 'LIKE', "%{$search}%")
            ->orWhere('body_post', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('website.pages.post_search', compact('posts', 'latestposts'));
    }
}
