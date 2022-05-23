<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyRequest;
use App\Http\Requests\StoreOfferRequest;
use App\Models\Apply;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\OffreHistorique;
use App\Models\SecteurActivite;
use App\Models\TypeContrat;
use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::where('is_active', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.offers.index')->with('offers', $offers);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $offers = Offer::where('status', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.offers.pending')->with('offers', $offers);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $offers = Offer::where('end_date', '<', \Carbon\Carbon::today())->orderBy('created_at', 'desc')->get();

        return view('admin.offers.archived')->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Carbon::today()->addDays(8));
        $types = JobType::all();
        $typecontrats = TypeContrat::all();
        $secteurs = SecteurActivite::all();
        $villes = Ville::all();

        return view('admin.offers.create', compact('types', 'secteurs', 'typecontrats', 'villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {

        $offer = new Offer();
        $offer->title_offer = $request->input('title_offer');
        $offer->description_offer = $request->input('description_offer');
        $offer->ville_id = $request->input('ville_id');
        $offer->start_date = $request->input('start_date');
        //$offer->end_date_delai = Carbon::parse($request->input('start_date'))->addDays(8);
        $offer->end_date_delai = Carbon::today()->addDays(8);
        $offer->user_id = $request->input('client_id');
        $offer->secteur_activite_id = $request->input('secteur_activite_id');
        $offer->type_contrat_id = $request->input('type_contrat_id');
        $offer->job_type_id = $request->input('job_type_id');
        $offer->profile = $request->input('profile');
        $offer->mission = $request->input('mission');
        $offer->expected_salary = $request->input('expected_salary');
        $offer->vacancies = $request->input('vacancies');
        $offer->total_experience = $request->input('total_experience');
        $offer->is_active = $request->input('is_active');
        $offer->description_offer = $request->input('description_offer');
        $offer->status = $request->input('status');

        $historicals = new OffreHistorique(); //Create historique
        $historicals->titre_name = $request->input('title_offer');
        $historicals->offre_name = 'Announce created by';
        $historicals->client_id = auth('admin')->user()->id;

        $type = TypeContrat::findOrFail($request->type_contrat_id);

        if ($type->title_type_con == 'CDI') {
            $offer->end_date = null;
        } else {
            $offer->end_date = Carbon::parse($request->input('start_date'))->addDays($type->number_type_con);
        }

        if ($request->input('client_id') == null) {

            return redirect()->back()->with('error', trans('success.namefound'));
        } else {

            $offer->save();
            $historicals->save();
        }

        if ($offer->status) {

            return redirect()->route('admin.offers.index')->with('success', trans('success.annonregist'));
        } else {

            return redirect()->route('admin.offer.pending')->with('success', trans('success.annonpub'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::findOrFail($id); //Get offer specified by id
        $types = JobType::all();
        $typecontrats = TypeContrat::all();
        $secteurs = SecteurActivite::all();
        $villes = Ville::all();

        return view('admin.offers.show', compact('offer', 'types', 'typecontrats', 'secteurs', 'villes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::findOrFail($id); //Get offer specified by id
        $types = JobType::all();
        $typecontrats = TypeContrat::all();
        $secteurs = SecteurActivite::all();
        $villes = Ville::all();

        return view('admin.offers.edit', compact('offer', 'types', 'secteurs', 'typecontrats', 'villes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function treat($id)
    {
        $offer = Offer::findOrFail($id); //Get offer specified by id
        $types = JobType::all();
        $typecontrats = TypeContrat::all();
        $secteurs = SecteurActivite::all();
        $villes = Ville::all();

        return view('admin.offers.edit', compact('offer', 'types', 'secteurs', 'typecontrats', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function treatUpdate($id)
    {
        $offer = Offer::findOrFail($id); //Find a offer with a given id and delete
        $offer->status = $request->input('status');
        if ($request->input('client_id') == null) {
            return redirect()->back()->with('error', trans('success.namefound'));
        } else {

            $offer->save();
            $historicals->save();
        }
        if ($offer->status) {
            return redirect()->route('admin.offers.index')->with('success', trans('success.annonregist'));
        } else {
            return redirect()->route('admin.offer.pending')->with('success', trans('success.annonpub'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreOfferRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // dd($id);
        $offer = Offer::findOrFail($id); //Find a offer with a given id and delete
        $offer->is_active = true;
        $offer->status = true;

        $historicals = new OffreHistorique(); //Create historique
        $historicals->titre_name = $offer->title_offer;
        $historicals->offre_name = 'Ad updated';
        $historicals->client_id = auth('admin')->user()->id;

       

        if ($offer->user_id == null) {

            return redirect()->back()->with('error', trans('success.namefound'));
        } else {

            $offer->save();
            $historicals->save();
        }

        if ($offer->status) {

            return redirect()->route('admin.offers.index')->with('success', trans('success.annonregist'));
        } else {

            return redirect()->route('admin.offer.pending')->with('success', trans('success.annonpub'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id); //Find a offer with a given id and delete
        $offer->delete();

        return redirect()->route('admin.offers.index')->with('success', trans('success.addelet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function treatApply($id)
    {
        $offer = Offer::findOrFail($id);

        return view('admin.offers.postule', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ApplyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateApply(ApplyRequest $request, $id)
    {
        if ($request->hasfile('cv_file')) {

            $fileUrl = $request->file('cv_file');
            $cvNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/dossier');
            $fileUrl->move($destinationPath, $cvNameToStore);
        }

        if ($request->hasfile('cover_letter_file')) {

            $fileUrl = $request->file('cover_letter_file');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/dossier');
            $fileUrl->move($destinationPath, $fileNameToStore);
        }

        $offer = Offer::findOrFail($id);
        $apply = new Apply();
        $apply->offer_id = $offer->id;
        $apply->user_id = $request->input('prestataire_id');
        $apply->cover_letter = $request->input('cover_letter');
        $apply->is_favorable = $request->input('is_favorable');
        $apply->status = $request->input('status');

        if ($request->hasfile('cv_file')) {
            $apply->cv_file = $cvNameToStore;
        }

        if ($request->hasfile('cover_letter_file')) {
            $apply->cover_letter_file = $fileNameToStore;
        }

        $historicals = new OffreHistorique(); //Create historique
        $historicals->offre_name = 'Ad applies by';
        $historicals->client_id = auth('admin')->user()->id;

        if ($request->input('prestataire_id') == null) {

            return redirect()->back()->with('error', trans('success.namefound'));

        } else {

            $apply->save();
            $historicals->save();

            return redirect()->route('admin.offers.index')->with('success', trans('success.applregist'));
        }
    }

    public function makedate(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->end_date_delai = $request->input('end_date_delai');
    }
}
