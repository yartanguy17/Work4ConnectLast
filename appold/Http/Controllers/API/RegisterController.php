<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Ville;
use App\Models\SecteurActivite;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\API\BaseController as BaseController;

class RegisterController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/getville",
     *      operationId="getville",
     *      tags={"Register"},
     *      summary="Liste des villes",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function getville()
    {
        $villes = Ville::select(
            'villes.id',
            'villes.title_ville'
        )->orderBy('title_ville')->get();

        if ($villes->count()) {

            return $this->sendResponse($villes, 'Ville récupérées avec succès.');
        }

        return $this->sendError('Pas de ville trouvée.');
    }

    /**
     * @OA\Get(
     *      path="/api/getsecteur",
     *      operationId="getsecteur",
     *      tags={"Register"},
     *      summary="Liste des secteurs d'activité",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function getsecteur()
    {
        $secteurs = SecteurActivite::select(
            'secteur_activites.id',
            'secteur_activites.title_secteur',
            'secteur_activites.description_secteur'
        )->orderBy('title_secteur')->get();

        if ($secteurs->count()) {

            return $this->sendResponse($secteurs, 'Secteur récupérées avec succès.');
        }

        return $this->sendError('Pas de secteur trouvée.');
    }

    /**
     * @OA\Post(
     ** path="/api/registerclient",
     *   tags={"Register"},
     *   summary="Création du compte client",
     *   operationId="registerclient",
     *  description="Returns client data",
     *
     *  @OA\Parameter(
     *      name="last_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="first_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function registerclient(Request $request)
    {
        $rules = [
            'last_name' => 'required',
            'first_name' => 'nullable',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required',
            'birth_date' => 'nullable',
            'place_birth' => 'nullable',
            'gender' => 'nullable',
            'nif' => 'nullable',
            'date_creation' => 'nullable',
            'ville_id' => 'required',
            'contact_name' => 'nullable',
            'personne_type' => 'required',
            'confirm_phone_number' => 'required|same:phone_number',
        ];
        $messages = array(
            'last_name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'phone_number.required' => 'Le Numéro de téléphone est obligatoire.',
            'personne_type.required' => 'Le Type utlisateur est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'confirm_phone_number.required' => 'Confirmation du numéro de téléphone  est obligatoire.',
            'confirm_phone_number.same' => 'Le numéro de téléphone et sa confirmation ne correspondent pas!',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'ville_id.required' => 'La ville est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } else {

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
            $user->ville_id = $request->input('ville_id');
            $user->email_token = sha1(time());

            $checkEmail = User::where('email', $user->email)->get(); //Verifier si prestataire existe déjà
            $checkphone = User::where('phone_number', $user->phone_number)->get(); //Verifier si client existe déjà
            $result = Carbon::parse($request->input('birth_date'))->diff(Carbon::now())->y;

            if (count($checkEmail) > 0) {

                return $this->sendError('Adresse e-mail existe déjà');
            } elseif (count($checkphone) > 0) {

                return $this->sendError('Le Numéro de téléphone existe déjà');
            } elseif ($result != null && $result < 13) {
                return $this->sendError('Votre date de naissance ne peut pas être supérieure ou égale à la date d\'aujourd\'hui');
            } else {

                $user->save();
                Mail::to($user->email)->send(new VerifyMail($user));

                return $this->sendResponse($user, 'Nous vous avons envoyé un code d\'activation.
                Vérifiez votre email  et cliquez sur le lien pour vérification de votre compte.
                Consultez vos spams au cas échéant svp');
            }
        }
    }

    /**
     * @OA\Post(
     ** path="/api/registerprestataire",
     *   tags={"Register"},
     *   summary="Création du compte prestataire",
     *   operationId="registerprestataire",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="last_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="first_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function registerprestataire(Request $request)
    {
        $rules = [
            'last_name' => 'required',
            'first_name' => 'nullable',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required',
            'birth_date' => 'nullable',
            'place_birth' => 'nullable',
            'gender' => 'nullable',
            'num_impot' => 'nullable',
            'nif' => 'nullable', 'string',
            'date_creation' => 'nullable',
            'personne_type' => 'required',
            'secteur_activite_id' => 'required',
            'ville_id' => 'required',
            'contact_name' => 'nullable',
            'confirm_phone_number' => 'required|same:phone_number',
        ];
        $messages = array(
            'last_name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'phone_number.required' => 'Le Numéro de téléphone est obligatoire.',
            'personne_type.required' => 'Le Type utlisateur est obligatoire.',
            'secteur_activite_id.required' => 'Le Secteur d\'activité est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'confirm_phone_number.required' => 'Confirmation du numéro de téléphone  est obligatoire.',
            'confirm_phone_number.same' => 'Le numéro de téléphone et sa confirmation ne correspondent pas!',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'ville_id.required' => 'La ville est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } else {

            $user = new User();
            $user->personne_type =  $request->input('personne_type');
            $user->last_name =  $request->input('last_name');
            $user->first_name =  $request->input('first_name');
            $user->type_users = 'prestataire';
            $user->contact_name =  $request->input('contact_name');
            $user->nif =  $request->input('nif');
            $user->secteur_activite_id =  $request->input('secteur_activite_id');
            $user->autre =  $request->input('secteur_activite');
            $user->email =  $request->input('email');
            $user->phone_number =  $request->input('phone_number');
            $user->profile_picture = null;
            $user->address =  $request->input('address');
            $user->date_creation =  $request->input('date_creation');
            $user->gender =  $request->input('gender');
            $user->password =  $request->input('password');
            $user->ville_id = $request->input('ville_id');
            $user->email_token = sha1(time());

            $checkEmail = User::where('email', $user->email)->get(); //Verifier si prestataire existe déjà
            $checkphone = User::where('phone_number', $user->phone_number)->get();

            if (count($checkEmail) > 0) {

                return $this->sendError('Adresse e-mail existe déjà');
            } elseif (count($checkphone) > 0) {

                return $this->sendError('Le Numéro de téléphone existe déjà');
            } else {

                $user->save();
                Mail::to($user->email)->send(new VerifyMail($user));

                return $this->sendResponse($user, 'Nous vous avons envoyé un code d\'activation.
                Vérifiez votre email et cliquez sur le lien pour vérification de votre compte.');

                return redirect()->route('login')->with('success', '');
            }
        }
    }
}
