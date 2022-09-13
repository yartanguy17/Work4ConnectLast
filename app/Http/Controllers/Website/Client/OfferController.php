<?php

namespace App\Http\Controllers\Website\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Mail\OfferClientMail;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\OffreHistorique;
use App\Models\PostDate;
use App\Models\SecteurActivite;
use App\Models\TypeContrat;
use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('website.clients.offers.index')->with('offers', $offers);
    }

    public function getOffers()
    {
        $offers = Offer::where('is_active', 1)->simplePaginate(15);

        return view('website.clients.offers.index')->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = JobType::all();
        $villes = Ville::all();
        $secteurs = SecteurActivite::all();
        $typecontrats = TypeContrat::all();
        $countries = CountryListFacade::getList('en');

        $nb_poste = PostDate::all();
        $date = null;

        foreach ($nb_poste as $post) {
            $date = $post->nb_day_post;
        }

        return view('website.clients.offers.create', compact('typecontrats', 'villes', 'types', 'secteurs', 'date', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\OfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {

        // dd($request);
        $date = date('Y-m-d', strtotime($request->input('start_date')));

        $nb_poste = PostDate::all();
        $date = null;

            
            
        if ($request->hasfile('photo')) {

                // dd($request->file('photo'));
            $fileUrl = $request->file('photo');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('assets/logo-offer/');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo

        }

       $offer = new Offer();
        $offer->title_offer = $request->input('title_offer');
        $offer->description_offer = $request->input('description_offer');
        $offer->country = $request->input('country');
        $offer->city = $request->input('city');
        $offer->start_date = $request->input('start_date');
        $offer->end_date_delai = Carbon::today()->addDays($date);
        $offer->user_id = auth()->user()->id;
        $offer->secteur_activite_id = $request->input('secteur_activite_id');

       
        $offer->web_site = $request->input('web_site');
    //   if(){
           
    //   }
        $offer->expected_salary_min = $request->input('expected_salary_min');
        $offer->expected_salary_max = $request->input('expected_salary_max');
        $offer->vacancies = $request->input('vacancies');
        
         if ($request->hasfile('photo')) {
            $offer->logo = $fileNameToStore;
        }

// dd($offer);
        $historicals = new OffreHistorique(); //Create historique
        $historicals->titre_name = $request->input('title_offer');
        $historicals->offre_name = 'Annonce crée par';
        $historicals->client_id = auth()->user()->id;



        $offer->save();
        $historicals->save();

        $user = array(
            'last_name' => Auth::user()->last_name,
            'title_offer' => $request->title_offer,
            'profile' => $request->profile,
            'start_date' => $request->start_date,
            'end_date_delai' => $request->end_date_delai,
        );

        $pdfUserEmail = Auth::user()->email;
        Mail::to("home@work4connect.com")->send(new OfferClientMail($user)); //Send mail in users

        return redirect()->route('client.offers.index')->with('success', trans('success.annonces'));
    // }
    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $di=Crypt::decrypt($id);
        $offer = Offer::findOrFail($di); //Get offer specified by id

        return view('website.clients.offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $di=Crypt::decrypt($id);
        $offer = Offer::findOrFail($di); //Get offer specified by id
        $types = JobType::all();
       
        $secteurs = SecteurActivite::all();
        $typecontrats = TypeContrat::all();
        $countries = CountryListFacade::getList('en');
        $nb_poste = PostDate::all();
        $date = null;

        foreach ($nb_poste as $post) {
            $date = $post->nb_day_post;
        }

        return view('website.clients.offers.edit', compact('countries', 'date', 'typecontrats', 'offer', 'types', 'secteurs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        $date = date('Y-m-d', strtotime($request->input('start_date')));

        $nb_poste = PostDate::all();
        $date = null;


        if ($request->hasfile('photo')) {

                // dd($request->file('photo'));
            $fileUrl = $request->file('photo');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('assets/logo-offer/');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo

        }

        $offer = Offer::findOrFail($id); //Find a offer with a given id and delete
        $offer->title_offer = $request->input('title_offer');
        $offer->description_offer = $request->input('description_offer');
        $offer->country = $request->input('country');
        $offer->city = $request->input('city');
        $offer->start_date = $request->input('start_date');
        $offer->end_date_delai = Carbon::today()->addDays($date);
        $offer->user_id = auth()->user()->id;
        $offer->secteur_activite_id = $request->input('secteur_activite_id');

        
        $offer->web_site = $request->input('web_site');
        
        $offer->expected_salary_min = $request->input('expected_salary_min');
         $offer->expected_salary_max = $request->input('expected_salary_max');
        $offer->vacancies = $request->input('vacancies');
        

         if ($request->hasfile('photo')) {
            $offer->logo = $fileNameToStore;
        }


        $historicals = new OffreHistorique(); //Create historique
        $historicals->titre_name = $request->input('title_offer');
        $historicals->offre_name = 'Annonce modifiée par';
        $historicals->client_id = auth()->user()->id;

        $offer->save();
        $historicals->save();

        return redirect()->route('client.offers.index')->with('success', trans('success.announupd'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $di=Crypt::decrypt($id);
        $delete = Offer::findOrFail($di); //Find a offer with a given id and delete
         $delete->delete();

        // return redirect()->route('client.offers.index')->with('success', trans('success.announdele'));
        return redirect()->route('client.offers.index')->with('success', trans('success.announdele'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteoffers($id)
    {
        $di=Crypt::decrypt($id);
        
        $offer = Offer::find($di);
        $offer->delete(); //function in delete

        $message = trans('success.announdele');

        return response()->json(['success' => true, 'message' => $message]);
    }
}
