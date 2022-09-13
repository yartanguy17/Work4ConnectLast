<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\DevisRequest;
use App\Http\Requests\RappelRequest;
use App\Mail\QuotationAdminMail;
use App\Mail\ApplyByMail;
use App\Models\Category;
use App\Models\Contrat;
use App\Models\FaqCategory;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Quotation;
use App\Models\Rappel;
use App\Models\Region;
use App\Models\SecteurActivite;
use App\Models\User;
use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $secteurs = SecteurActivite::all();
        $regions = Region::all();
        $villes = Ville::all();
        $offers = Offer::where('is_active', 1)
            ->where('start_date', '>', Carbon::now())
            ->orderBy('created_at', 'desc')->limit(10)->get();
        $countries = CountryListFacade::getList('en');
//dd($offers);
        return view('website.pages.index', compact('countries', 'secteurs', 'regions', 'posts', 'offers', 'villes'));
    }

    public function faq()
    {
        $categories = FaqCategory::all();

        return view('website.pages.faq')->with('categories', $categories);
    }

    public function terms()
    {
        return view('website.pages.terms');
    }

    public function policy()
    {
        return view('website.pages.privacy');
    }

    public function offers()
    {
        $offers = Offer::where('is_active', 1)
            ->where('start_date', '>', Carbon::now())
            ->simplePaginate(15);

        return view('website.pages.offers', compact('offers'));
    }

    public function offerDetails()
    {
        $offer = Offer::first();

        return view('website.pages.offer_single', compact('offer'));
    }

    public function offerDetailsSingle($slug)
    {
        $offer = Offer::where('id', $slug)->get()->first();
        $secteur = SecteurActivite::where('id', $offer->secteur_activite_id)->get()->first();

        return view('website.pages.offer_single', compact('offer', 'secteur'));
    }

    public function blog()
    {
        $categories = Category::all();
        $latestposts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(20);

        return view('website.pages.blog', compact('posts', 'categories', 'latestposts'));
    }

    public function postDetails($slug)
    {
        $categories = Category::all();
        $latestposts = Post::orderBy('created_at', 'desc')->where('status', 1)->limit(3)->get();
        $post = Post::with('category')->where('title_post', $slug)->first();

        $user = User::findOrFail($post->user_id);
        $post->author_image = $user->profile_picture;
        $post->author = $user->name;

        return view('website.pages.blog_single', compact('post', 'categories', 'latestposts'));
    }

    public function about()
    {
        return view('website.pages.about');
    }

    public function categoryPosts()
    {
        $categories = Category::all();
        $latestposts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $data = Category::with('posts')->first();

        foreach ($data->posts as $post) {
            # code...
            $user = User::findOrFail($post->user_id);
            $post->author_image = $user->profile_picture;
            $post->author = $user->name;
        }

        return view('website.pages.category_posts', compact('data', 'categories', 'latestposts'));
    }

    public function authorPost($name)
    {
        $categories = Category::all();
        $user = User::where('last_name', Str::upper($name))->first();
        $latestposts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $posts = $user->posts()->get();

        foreach ($posts as $post) {
            $post->author_image = $user->profile_picture;
            $post->author = $user->name;
        }

        return view('website.pages.author_posts', compact('posts', 'user', 'categories', 'latestposts'));
    }

    public function contact()
    {
        return view('website.pages.contact');
    }

    public function services()
    {
        return view('website.pages.services');
    }

    public function charte()
    {
        return view('website.pages.charte');
    }

    public function detaitContrat($id)
    {

        $contrat = Contrat::find(decrypt($id));

        return view('website.pages.contrat_view', compact('contrat'));
    }

    public function view($id)
    {
        $prestataire = User::findOrFail($id);

        return view('website.pages.profile_view', compact('prestataire'));
    }

    public function getVilles(Request $request)
    {
        $villes = Ville::where('region_id', $request->id)->get();

        return response()->json($villes);
    }

    public function etre_rappele()
    {
        return view('website.pages.etre_rappele');
    }

    public function demander_devis()
    {
        $secteurs = SecteurActivite::all();

        $start = new \DateTime();
        //This is the time slots interval
        $interval = new \DateInterval("PT120M"); //120 Minutes
        $parse = Carbon::parse($start->add($interval));
        $temp = Carbon::create($parse->year, $parse->month, $parse->day, $parse->hour);
        $pitchStart = new \DateTime($temp);
        $dt = Carbon::now();
        $end = Carbon::create($dt->year, $dt->month, $dt->day, 20);
        $pitchClose = new \DateTime($end);

        //This is the time slots interval
        $slot_interval = new \DateInterval("PT60M"); //60 Minutes

        //Get all slots between $pitchStart and $pitchClose
        $all_slots = [];

        $slots_start = $pitchStart;
        $slots_end = $pitchClose;

        //This is how you can generate the intervals based on $pitchStart / $pitchClose and $slot_interval
        while ($slots_start->getTimestamp() < $slots_end->getTimestamp()) {
            $all_slots[] = [
                'start' => clone $slots_start,
                'end' => (clone $slots_start)->add($slot_interval),
            ];
            $slots_start->add($slot_interval);
        }

        return view('website.pages.demander_devis', compact('secteurs', 'all_slots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DevisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postDemanderDevis(DevisRequest $request)
    {
        $quotation = new Quotation();
        $quotation->phone_number = $request->input('phone_number');
        $quotation->range = $request->input('range');
        $quotation->quotation_date = $request->input('date');
        $quotation->last_name = $request->input('last_name');
        $quotation->first_name = $request->input('first_name');
        $quotation->address = $request->input('address');
        $quotation->email = $request->input('email');
        $quotation->gender = $request->input('gender');
        $quotation->secteur_activite_id = $request->input('secteur_activite_id');

        $quotation->save();

        Mail::to('noreply@centralresource.net')->send(new QuotationAdminMail($quotation));

        return back()->with('success', trans('success.yourequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RappelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postEtreRappeler(RappelRequest $request)
    {
        $rappel = new Rappel();
        $rappel->phone_number = $request->input('phone_number');
        $rappel->date_rapel = $request->input('date_rapel');
        $rappel->horaire_rapel = $request->input('horaire_rapel');

        $rappel->save();

        return back()->with('success', trans('success.yourequest'));
    }
    
     public function applybymail(Request $request)
    {
    
     $offer = Offer::findOrFail($request->input('id'));
        
        // dd($offer->user["email"]);

      $user = $offer->title_offer;
      
    //   array(
           
    //         'title_offer' => $offer->title_offer,
    //         'start_date' => $offer->start_date,
    //         'end_date_delai' => $offer->end_date_delai,
    //     );


        
        Mail::to($offer->user["email"])->send(new ApplyByMail($user)); //Send mail to company

        return redirect()->route('offers')->with('success', trans('success.annonces'));
    }
}
