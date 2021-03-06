<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        $secteur = $request->input('secteur');
        $country = $request->input('country');
        $city = $request->input('city');
        // $prestataire = User::where('secteur_activite_id', $secteur)->get();
        
        // dd($prestataire);

        if($secteur!=null || $country==null){
            $prestataires = User::query()->where('secteur_activite_id', $secteur)->paginate(6);
           return view('website.pages.search', compact('prestataires'))->with('i', (request()->input('page', 1) - 1) * 3);
        }
        if($country!=null || $secteur==null){
            $prestataires = User::query()->where('country', $country)->paginate(6);
           return view('website.pages.search', compact('prestataires'))->with('i', (request()->input('page', 1) - 1) * 3);
        }
        if($secteur!=null && $country!=null){
            $prestataires = User::query()->where('secteur_activite_id', $secteur)
                                          ->where('country', $country)->paginate(6);
        return view('website.pages.search', compact('prestataires'))->with('i', (request()->input('page', 1) - 1) * 3);
        }
       
        
       

        // dd($prestataires);
        

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
