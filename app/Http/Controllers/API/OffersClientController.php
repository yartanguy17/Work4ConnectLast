<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Ville;
use App\Models\JobType;
use App\Models\TypeContrat;
use App\Models\SecteurActivite;
use App\Models\OffreHistorique;
use App\Models\PostDate;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\OfferClientMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\API\BaseController as BaseController;

class OffersClientController extends BaseController
{

    /**
     * @OA\Get(
     *      path="/api/offerbyclient/{client_id}",
     *      operationId="offerbyclient",
     *      tags={"Offers"},
     *      summary="Offre du client",
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
    public function offerByClient($client_id)
    {
        $offer = Offer::where('user_id', $client_id)->orderBy('offers.created_at', 'desc')->get();
        if ($offer->count()) {

            return $this->sendResponse($offer, 'Annonces récupérées avec succès.');
        }

        return $this->sendError('Pas d\'annonce.');
    }

    /**
     * @OA\Get(
     *      path="/api/listetypecontrat",
     *      operationId="listetypecontrat",
     *      tags={"Offers"},
     *      summary="Liste des type de contrat",
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
    public function listetypecontrat()
    {
        $typecontrats = TypeContrat::select(
            'type_contrats.id',
            'type_contrats.title_type_con',
            'type_contrats.number_type_con'
        )->orderBy('title_type_con')->get();

        if ($typecontrats->count()) {

            return $this->sendResponse($typecontrats, 'Type contrat récupérées avec succès.');
        }

        return $this->sendError('Pas de type contrat trouvée.');
    }

    /**
     * @OA\Get(
     *      path="/api/listeville",
     *      operationId="listeville",
     *      tags={"Offers"},
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
    public function listeville()
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
     *      path="/api/listesecteur",
     *      operationId="listesecteur",
     *      tags={"Offers"},
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
    public function listesecteur()
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
     * @OA\Get(
     *      path="/api/listetypejob",
     *      operationId="listetypejob",
     *      tags={"Offers"},
     *      summary="Liste des type de job",
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
    public function listetypejob()
    {
        $types = JobType::select(
            'job_types.id',
            'job_types.title_job_ty',
            'job_types.description_job_ty'
        )->orderBy('title_job_ty')->get();

        if ($types->count()) {

            return $this->sendResponse($types, 'Type d\'emploi récupérées avec succès.');
        }

        return $this->sendError('Pas de Type d\'emploi trouvée.');
    }

    /**
     * @OA\Post(
     ** path="/api/storeoffer",
     *   tags={"Offers"},
     *   summary="Création d'offre du client",
     *   operationId="storeoffer",
     *  description="Returns client data",
     *
     *  @OA\Parameter(
     *      name="title_offer",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="description_offer",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="job_type_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="vacancies",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="ville_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="type_contrat_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="expected_salary",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="total_experience",
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
    public function storeOffer(Request $request)
    {
        $rules = [
            'title_offer' => 'required',
            'description_offer' => 'nullable',
            'job_type_id' => 'required',
            'vacancies' => 'required',
            'ville_id' => 'required',
            'type_contrat_id' => 'required',
            'expected_salary' => 'required',
            'total_experience' => 'required',
        ];
        $messages = array(
            'title_offer.required' => 'Titre de l\'offre est obligatoire.',
            'job_type_id.required' => 'Le Type d\'emploi est obligatoire.',
            'vacancies.required' => 'Nombre de poste est obligatoire.',
            'ville_id.required' => 'La ville est obligatoire.',
            'type_contrat_id.required' => 'Le Type de contrat est obligatoire.',
            'expected_salary.required' => 'Salaire est obligatoire.',
            'total_experience.required' => 'Total experience est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $date = date('Y-m-d', strtotime($request->input('start_date')));

            $nb_poste = PostDate::all();
            $date = null;

            foreach ($nb_poste as $post) {
                $date = $post->nb_day_post;
            }

            $offer = new Offer();
            $offer->title_offer = $request->input('title_offer');
            $offer->description_offer = $request->input('description_offer');
            $offer->ville_id = $request->input('ville_id');
            $offer->start_date = $request->input('start_date');
            $offer->end_date_delai = Carbon::today()->addDays($date);
            $offer->user_id = $request->input('user_id');
            $offer->secteur_activite_id = $request->input('secteur_activite_id');
            $offer->type_contrat_id = $request->input('type_contrat_id');
            $offer->job_type_id = $request->input('job_type_id');
            $offer->profile = $request->input('profile');
            $offer->mission = $request->input('mission');
            $offer->expected_salary = $request->input('expected_salary');
            $offer->vacancies = $request->input('vacancies');
            $offer->total_experience = $request->input('total_experience');

            $historicals = new OffreHistorique(); //Create historique
            $historicals->titre_name = $request->input('title_offer');
            $historicals->offre_name = 'Annonce crée par';
            $historicals->client_id = auth()->user()->id;

            $type = TypeContrat::findOrFail($request->type_contrat_id);

            if ($type->title_type_con == 'CDI') {
                $offer->end_date = null;
            } else {
                $offer->end_date = Carbon::parse($request->input('start_date'))->addDays($type->number_type_con);
            }

            $offer->save();
            $historicals->save();

            $user = array(
                'last_name'  =>  Auth::user()->last_name,
                'title_offer' =>  $request->title_offer,
                'profile'   =>  $request->profile,
                'start_date'   =>  $request->start_date,
                'end_date_delai'   =>  $request->end_date_delai,
            );

            $pdfUserEmail =  Auth::user()->email;
            Mail::to($pdfUserEmail)->send(new OfferClientMail($user)); //Send mail in users

            return $this->sendResponse($offer, 'Annonce enregistrée et mis en attente de publication.');
        }
    }

    /**
     * @OA\Post(
     ** path="/api/updateoffer/{id}",
     *   tags={"Offers"},
     *   summary="Modifier d'offre du client",
     *   operationId="updateoffer",
     *  description="Returns client data",
     *
     *  @OA\Parameter(
     *      name="title_offer",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="description_offer",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="job_type_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="vacancies",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="ville_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="type_contrat_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="expected_salary",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="total_experience",
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
    public function updateOffer(Request $request, $id)
    {
        $rules = [
            'title_offer' => 'required',
            'description_offer' => 'nullable',
            'job_type_id' => 'required',
            'vacancies' => 'required',
            'ville_id' => 'required',
            'type_contrat_id' => 'required',
            'expected_salary' => 'required',
            'total_experience' => 'required',
        ];
        $messages = array(
            'title_offer.required' => 'Titre de l\'offre est obligatoire.',
            'job_type_id.required' => 'Le Type d\'emploi est obligatoire.',
            'vacancies.required' => 'Nombre de poste est obligatoire.',
            'ville_id.required' => 'La ville est obligatoire.',
            'type_contrat_id.required' => 'Le Type de contrat est obligatoire.',
            'expected_salary.required' => 'Salaire est obligatoire.',
            'total_experience.required' => 'Total experience est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $offer = Offer::findOrFail($id); //Find a offer with a given id and delete
            $offer->title_offer = $request->input('title_offer');
            $offer->description_offer = $request->input('description_offer');
            $offer->ville_id = $request->input('ville_id');
            $offer->start_date = $request->input('start_date');
            $offer->end_date = $request->input('end_date');
            $offer->secteur_activite_id = $request->input('secteur_activite_id');
            $offer->type_contrat_id = $request->input('type_contrat_id');
            $offer->job_type_id = $request->input('job_type_id');
            $offer->profile = $request->input('profile');
            $offer->mission = $request->input('mission');
            $offer->expected_salary = $request->input('expected_salary');
            $offer->vacancies = $request->input('vacancies');
            $offer->total_experience = $request->input('total_experience');

            $historicals = new OffreHistorique(); //Create historique
            $historicals->titre_name = $request->input('title_offer');
            $historicals->offre_name = 'Annonce modifiée par';
            $historicals->client_id = auth()->user()->id;

            $type = TypeContrat::findOrFail($request->type_contrat_id);

            if ($type->title_type_con == 'CDI') {
                $offer->end_date = null;
            } else {
                $offer->end_date = Carbon::parse($request->input('start_date'))->addDays($type->number_type_con);
            }

            $offer->save();
            $historicals->save();

            return $this->sendResponse($offer, 'Annonce mis à jour.');
        }
    }

    /**
     * @OA\Post(
     *      path="/api/deleteoffer/{id}",
     *      operationId="deleteoffer",
     *      tags={"Offers"},
     *      summary="Supprimer l'offre existant",
     *      description="Supprime un enregistrement et ne renvoie aucun contenu",
     *      @OA\Parameter(
     *          name="id",
     *          description="Offer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function deleteOffer($id)
    {
        $offer = Offer::findOrFail($id); //Find a offer with a given id and delete
        $offer->delete();

        return $this->sendResponse([], 'Annonce supprimée avec succès.');
    }

    /**
     * @OA\Get(
     *      path="/api/post_date",
     *      operationId="post_date",
     *      tags={"Offers"},
     *      summary="Nombre de jour",
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
    public function postDate()
    {
        $nb_poste = PostDate::all();
        $date = null;

        foreach ($nb_poste as $post) {
            $date = $post->nb_day_post;
        }

        return $this->sendResponse($date, 'Nombre de jour afficher avec succès.');
    }
}
