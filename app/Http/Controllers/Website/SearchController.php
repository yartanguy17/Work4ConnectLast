<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        $secteur = $request->input('secteur');
        $country = $request->input('country');
        $city = $request->input('city');
         $title = $request->input('title');
         $offers ='';
     
       if( !empty($title )){
            
            $offers = Offer::where('title_offer','like','%'.$title.'%')->where('status', 1)->where('start_date', '>', Carbon::now())->paginate(6);
            
          
         }elseif( !empty($country )){
            
            $offers = Offer::where('country', $country)->where('status', 1)->where('start_date', '>', Carbon::now())->paginate(6);
            
          
         }elseif(!empty($secteur)){
            
             
              $offers = Offer::where('secteur_activite_id', $secteur)->where('status', 1)->where('start_date', '>', Carbon::now())->paginate(6);
            
     
          
         }elseif(!empty($city)){
           
             
              $offers = Offer::where('city', $city)->where('status', 1)->paginate(6);
            
      
          
         }elseif(!empty($secteur) && !empty($country)){
          
             
              $offers = Offer::where('secteur_activite_id', $secteur)->where('country', $country)->where('status', 1)->where('start_date', '>', Carbon::now())->paginate(6);
            
       
          
         }
        elseif(!empty($country) && !empty($city )){
            
          
             
              $offers = Offer::where('country', $country)->where('country', $city)->where('status', 1)->where('start_date', '>', Carbon::now())->paginate(6);
            
           
          
         }
         elseif(!empty($secteur) && !empty($country) && !empty($city) && !empty($title )){
             
              $offers = Offer::where('secteur_activite_id', $secteur)->where('country', $country)->where('city', $city)->where('title_offer','like','%'.$title.'%')->where('status', 1)->where('start_date', '>', Carbon::now())->paginate(6);
           
          
         }
         else{
             
             $offers = Offer::where('start_date', '>', Carbon::now())->paginate(6);
            
           
        
         }
       
       return view('website.pages.search', compact('offers'));
        
       

     
        

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
