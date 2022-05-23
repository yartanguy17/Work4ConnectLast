<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\TypeConge;
use App\Models\Conge;
use App\Models\Historique;
use Illuminate\Support\Facades\Mail;
use App\Mail\CongePrestataireMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;

class CongePrestataireController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/congebyprestataire/{prestataire_id}",
     *      operationId="congebyprestataire",
     *      tags={"Conges"},
     *      summary="Liste des conges du prestataire ",
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
    public function congeByPrestataire($prestataire_id)
    {
        $demandeconges = Conge::where('user_id', $prestataire_id)
            ->join('type_conges', 'type_conges.id', '=', 'conges.type_conge_id')
            ->get();

        if ($demandeconges->count()) {

            return $this->sendResponse($demandeconges, 'Conge récupérées avec succès.');
        }

        return $this->sendError('Pas de conge.');
    }


    /**
     * @OA\Get(
     *      path="/api/listetypeconge",
     *      operationId="listetypeconge",
     *      tags={"Conges"},
     *      summary="Liste des type de conge",
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
    public function listeTypeConge()
    {
        $typeconges = TypeConge::all();

        if ($typeconges->count()) {

            return $this->sendResponse($typeconges, 'Type de cnge récupérées avec succès.');
        }

        return $this->sendError('Pas de type de conge trouvée.');
    }

    /**
     * @OA\Post(
     ** path="/api/storeconges",
     *   tags={"Conges"},
     *   summary="Creation conge du prestataire",
     *   operationId="storeconges",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="type_conge_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_demande_conge",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_return_conge",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="number_day",
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
    public function storeConge(Request $request)
    {
        $rules = [
            'type_conge_id' => 'required',
            'date_demande_conge' => 'required',
            'date_return_conge' => 'required',
            'number_day' => 'required',
        ];
        $messages = array(
            'type_conge_id.required' => 'Type de congé est obligatoire.',
            'date_demande_conge.required' => 'Date début absence est obligatoire.',
            'date_return_conge.required' => 'Date fin est obligatoire.',
            'number_day.required' => 'Nombre de jours est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $demandeconges = new Conge();
            $demandeconges->type_conge_id = $request->input('type_conge_id');
            $demandeconges->date_demande_conge = $request->input('date_demande_conge');
            $demandeconges->date_return_conge = $request->input('date_return_conge');
            $demandeconges->motif_conge = $request->input('motif_conge');
            $demandeconges->user_id = $request->input('prestataire_id');
            $demandeconges->contrat_id = $request->input('contrat_id');

            $datetime1 = strtotime($request->input('date_demande_conge')); // convert to timestamps
            $datetime2 = strtotime($request->input('date_return_conge')); // convert to timestamps
            // will give the difference in days , 86400 is the timestamp difference of a da
            $days = (int) (($datetime2 - $datetime1) / 86400);
            $demandeconges->number_day = $days + 1;

            $historicals = new Historique(); //Create Historique
            $historicals->historical_name = 'Vous venez de faire une demande de congé';
            $historicals->user_id = auth()->user()->id;

            //check if date between two dates
            $startDate = date('Y-m-d', strtotime($request->input('date_demande_conge')));
            $endDate = date('Y-m-d', strtotime($request->input('date_return_conge')));

            if ($startDate >= $endDate) {

                return $this->sendError("La date de fin des congés ne peut être inférieure à la date de début des congés ");
            } else {

                $demandeconges->save();
                $historicals->save(); //insert in database

                $user = array(
                    'last_name'  =>  Auth::user()->last_name,
                    'date_demande_conge' =>  $request->date_demande_conge,
                    'number_day'   =>  $request->number_day,
                    'date_return_conge'   =>  $request->date_return_conge,
                    'motif_conge'   =>  $request->motif_conge
                );

                $pdfUserEmail =  Auth::user()->email;
                Mail::to($pdfUserEmail)->send(new CongePrestataireMail($user)); //Send mail in users

                return $this->sendResponse($demandeconges, 'Demande de conge ajoutée avec succès.');
            }
        }
    }

    /**
     * @OA\Post(
     ** path="/api/updateconge/{id}",
     *   tags={"Conges"},
     *   summary="Modifier conge du prestataire",
     *   operationId="storeconges",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="type_conge_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_demande_conge",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_return_conge",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="number_day",
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
    public function updateConge(Request $request, $id)
    {
        $rules = [
            'type_conge_id' => 'required',
            'date_demande_conge' => 'required',
            'date_return_conge' => 'required',
            'number_day' => 'required',
        ];
        $messages = array(
            'type_conge_id.required' => 'Type de congé est obligatoire.',
            'date_demande_conge.required' => 'Date début absence est obligatoire.',
            'date_return_conge.required' => 'Date fin est obligatoire.',
            'number_day.required' => 'Nombre de jours est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {
            $demandeconges = Conge::findOrFail($id);
            $demandeconges->type_conge_id = $request->input('type_conge_id');
            $demandeconges->date_demande_conge = $request->input('date_demande_conge');
            $demandeconges->date_return_conge = $request->input('date_return_conge');
            $demandeconges->motif_conge = $request->input('motif_conge');
            $demandeconges->contrat_id = $request->input('contrat_id');
            $demandeconges->user_id = $request->input('prestataire_id');

            $datetime1 = strtotime($request->input('date_demande_conge')); // convert to timestamps
            $datetime2 = strtotime($request->input('date_return_conge')); // convert to timestamps
            // will give the difference in days , 86400 is the timestamp difference of a da
            $days = (int) (($datetime2 - $datetime1) / 86400);
            $demandeconges->number_day = $days + 1;


            $historicals = new Historique(); //Create Historique
            $historicals->historical_name = 'Vous venez de faire modifié votre demande de congé';
            $historicals->user_id = auth()->user()->id;

            //check if date between two dates
            $startDate = date('Y-m-d', strtotime($request->input('date_demande_conge')));
            $endDate = date('Y-m-d', strtotime($request->input('date_return_conge')));

            if ($startDate >= $endDate) {

                return $this->sendError("La date de fin des congés ne peut être inférieure à la date de début des congés ");
            } else {

                $demandeconges->save(); //insert in database
                $historicals->save(); //insert in database

                $user = array(
                    'last_name'  =>  Auth::user()->last_name,
                    'date_demande_conge' =>  $request->date_demande_conge,
                    'number_day'   =>  $request->number_day,
                    'date_return_conge'   =>  $request->date_return_conge,
                    'motif_conge'   =>  $request->motif_conge
                );

                $pdfUserEmail =  Auth::user()->email;
                Mail::to($pdfUserEmail)->send(new CongePrestataireMail($user)); //Send mail in users

                return $this->sendResponse($demandeconges, 'Demande de congé mis à jour avec succès.');
            }
        }
    }

    /**
     * @OA\Post(
     *      path="/api/deletedemandeconges/{id}",
     *      operationId="deletedemandeconges",
     *      tags={"Conges"},
     *      summary="Supprimer conge existant",
     *      description="Supprime un enregistrement et ne renvoie aucun contenu",
     *      @OA\Parameter(
     *          name="id",
     *          description="Conge id",
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
    public function deleteDemandeConges($id)
    {
        $demandeconges = Conge::find($id);
        $demandeconges->delete(); //function in delete

        return $this->sendResponse([], 'Demande de congé supprimé avec succès.');
    }
}
