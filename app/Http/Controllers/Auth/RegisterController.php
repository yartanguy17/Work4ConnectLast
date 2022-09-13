<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\PrestataireRequest;
use App\Mail\VerifyMail;
use App\Models\SecteurActivite;
use App\Models\User;
use App\Models\Ville;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showClientRegistrationForm()
    {
        $villes = Ville::select(
            'villes.id',
            'villes.title_ville'
        )->orderBy('title_ville')->get();

        return view('auth.register', compact('villes'));
    }

    public function showPrestataireRegisterForm()
    {
        $secteurs = SecteurActivite::select(
            'secteur_activites.id',
            'secteur_activites.title_secteur',
            'secteur_activites.description_secteur'
        )->orderBy('title_secteur')->get();

        $villes = Ville::select(
            'villes.id',
            'villes.title_ville'
        )->orderBy('title_ville')->get();

        return view('auth.register_prestataire', compact('secteurs', 'villes'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    public function clientRegistration(ClientRequest $request)
    {
        $user = new User();
        $user->personne_type = $request->input('personne_type');
        $user->last_name = $request->input('last_name');
        $user->contact_name = $request->input('contact_name');
        $user->nif = $request->input('nif');
        $user->type_users = 'client';
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->profile_picture = null;
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->birth_date = $request->input('birth_date');
        $user->date_creation = $request->input('date_creation');
        $user->password = $request->input('password');
        $user->country = $request->input('country');
        $user->tax_id_in_country = $request->input('tax_id_in_country');
        $user->email_token = sha1(time());

        $checkEmail = User::where('email', $user->email)->get(); //Verifier si prestataire existe déjà
        $checkphone = User::where('phone_number', $user->phone_number)->get(); //Verifier si client existe déjà

        if (count($checkEmail) > 0) {

            return back()->with('error', "Email address $user->email already exists");

        } else {

            $user->save();

            Mail::to($user->email)->send(new VerifyMail($user));

            return redirect()->route('login')->with('success', trans('welcome.register'));
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    public function prestataireRegistration(PrestataireRequest $request)
    {
        $user = new User();
        $user->personne_type = $request->input('personne_type');
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->type_users = 'prestataire';
        $user->contact_name = $request->input('contact_name');
        $user->nif = $request->input('nif');
        $user->secteur_activite_id = $request->input('secteur_activite_id');
        $user->autre = $request->input('secteur_activite');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->profile_picture = null;
        $user->address = $request->input('address');
        $user->date_creation = $request->input('date_creation');
        $user->gender = $request->input('gender');
        $user->password = $request->input('password');
        $user->country = $request->input('country');
        $user->email_token = sha1(time());

        $checkEmail = User::where('email', $user->email)->get(); //Verifier si prestataire existe déjà

        if (count($checkEmail) > 0) {

            return back()->with('error', "Email address $user->email already exists")->withInput();
        } else {

            $user->save();

            Mail::to($user->email)->send(new VerifyMail($user));

            return redirect()->route('login')->with('success', trans('welcome.register'));
        }
    }

    public function verifyUser($token)
    {
        $verifyUser = User::where('email_token', $token)->first();
        if ($verifyUser != null) {
            $verifyUser->is_activated = 1;
            $verifyUser->save();

            return redirect()->route('login')->with('success', 'Your email has been verified. You can now log in');
        }
        return redirect()->route('login')->with('warning', 'Sorry, your email address can not been verified!');
    }
}
