<?php

namespace App\Http\Controllers\Website\Prestataire;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyRequest;
use App\Mail\ApplyAdminMail;
use App\Models\Apply;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ApplyController extends Controller
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
        $applies = Offer::join('applies', 'offers.id', '=', 'applies.offer_id')
            ->where('applies.user_id', auth()->user()->id)->orderBy('created_at', 'desc')
            ->get(['offers.*', 'applies.status', 'applies.is_active']);

        return view('website.prestataires.applies.index', compact('applies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply($id)
    {
        $offer = Offer::findOrFail($id);

        return view('website.prestataires.applies.create', compact('offer'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ApplyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplyRequest $request)
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

        $apply = new Apply();
        $user = User::where('id', auth()->user()->id)->first();
        $offer = Offer::findOrFail($request->offer_id);
        $apply->offer_id = $request->input('offer_id');
        $apply->user_id = auth()->user()->id;
        $apply->cover_letter = $request->input('cover_letter');

        if ($request->hasfile('cv_file')) {
            $apply->cv_file = $cvNameToStore;
        }

        if ($request->hasfile('cover_letter_file')) {
            $apply->cover_letter_file = $fileNameToStore;
        }

        $apply->save();

        Mail::to('info@centralresource.net')->send(new ApplyAdminMail($user, $offer, $apply));

        return redirect()->route('prestataire.applies.index')->with('success', trans('success.candenregi'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apply = Apply::findOrFail($id);

        return view('website.prestataires.applies.show', compact('apply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apply = Apply::findOrFail($id);

        return view('website.prestataires.applies.edit', compact('apply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplyRequest $request, $id)
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

        $apply = Apply::findOrFail($id);
        $user = User::where('id', auth()->user()->id)->first();
        $offer = Offer::findOrFail($request->offer_id);
        $apply->offer_id = $request->input('offer_id');
        $apply->user_id = auth()->user()->id;
        $apply->cover_letter = $request->input('cover_letter');

        if ($request->hasfile('cv_file')) {
            $apply->cv_file = $cvNameToStore;
        }

        if ($request->hasfile('cover_letter_file')) {
            $apply->cover_letter_file = $fileNameToStore;
        }

        $apply->save();

        return redirect()->route('prestataire.applies.index')->with('success', trans('success.candupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apply = Apply::findOrFail($id);
        $apply->delete();

        return redirect()->route('prestataire.applies.index')->with('success', trans('success.canddelete'));
    }
}
