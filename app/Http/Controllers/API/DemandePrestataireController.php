<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\TypeAbsence;
use App\Models\DemandeAbsence;
use App\Models\Historique;
use Illuminate\Support\Facades\Mail;
use App\Mail\AbsencePrestataireMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;

class DemandePrestataireController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/absencebyprestataire/{prestataire_id}",
     *      operationId="absencebyprestataire",
     *      tags={"Demande Absence"},
     *      summary="Liste des demande absence du prestataire ",
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
    public function absenceByPrestataire($prestataire_id)
    {
        $demandeabsences = DemandeAbsence::where('user_id', $prestataire_id)
            ->join('type_absences', 'type_absences.id', '=', 'demande_absences.type_absence_id')
            ->get();

        if ($demandeabsences->count()) {

            return $this->sendResponse($demandeabsences, 'Demande absence récupérées avec succès.');
        }

        return $this->sendError('Pas de demande absence.');
    }


    public function listeTypeAbsence()
    {
        $typeabsences = TypeAbsence::all();

        if ($typeabsences->count()) {

            return $this->sendResponse($typeabsences, 'Type absence récupérées avec succès.');
        }

        return $this->sendError('Pas de type absence trouvée.');
    }

    /**
     * @OA\Post(
     ** path="/api/storedemandeabsence",
     *   tags={"Demande Absence"},
     *   summary="Creation demande absence",
     *   operationId="storedemandeabsence",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="type_absence_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_demande",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_reprise",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="motif_demande",
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
    public function storeDemandeAbsence(Request $request)
    {
        $rules = [
            'type_absence_id' => 'required',
            'date_demande' => 'required',
            'date_reprise' => 'required',
            'motif_demande' => 'nullable',
        ];
        $messages = array(
            'type_absence_id.required' => 'Type absence est obligatoire.',
            'date_demande.required' => 'Date demande absence est obligatoire.',
            'date_reprise.required' => 'Date reprise est obligatoire.',
            'motif_demande.nullable' => 'Motif est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {


            $demandeabsences = new DemandeAbsence();
            $demandeabsences->type_absence_id = $request->input('type_absence_id');
            $demandeabsences->date_demande = $request->input('date_demande');
            $demandeabsences->date_reprise = $request->input('date_reprise');
            $demandeabsences->motif_demande = $request->input('motif_demande');
            $demandeabsences->contrat_id = $request->input('contrat_id');
            $demandeabsences->user_id = $request->input('prestataire_id');

            $datetime1 = strtotime($request->input('date_demande')); // convert to timestamps
            $datetime2 = strtotime($request->input('date_reprise')); // convert to timestamps
            // will give the difference in days , 86400 is the timestamp difference of a da
            $days = (int) (($datetime2 - $datetime1) / 86400);
            $demandeabsences->dure_absence = $days + 1;

            $historicals = new Historique(); //Create Historique
            $historicals->historical_name = 'Vous venez de faire une demande d\'absence';
            $historicals->user_id = auth()->user()->id;
            //check if date between two dates
            $startDate = date('Y-m-d', strtotime($request->input('date_demande')));
            $endDate = date('Y-m-d', strtotime($request->input('date_reprise')));

            if ($startDate > $endDate) {

                return $this->sendError("La date de retour  ne peut être inférieure à la date de demande");
            } else {

                $demandeabsences->save(); //insert in database
                $historicals->save(); //insert in database

                $user = array(
                    'last_name'  =>  Auth::user()->last_name,
                    'date_demande' =>  $request->date_demande,
                    'dure_absence'   =>  $request->dure_absence,
                    'date_reprise'   =>  $request->date_reprise,
                    'motif_demande'   =>  $request->motif_demande
                );

                $pdfUserEmail =  Auth::user()->email;
                Mail::to($pdfUserEmail)->send(new AbsencePrestataireMail($user)); //Send mail in users

                return $this->sendResponse($demandeabsences, 'Demande d\'absence ajoutée avec succès.');
            }
        }
    }

    /**
     * @OA\Post(
     ** path="/api/updatedemandeabsence/{id}",
     *   tags={"Demande Absence"},
     *   summary="Modifier demande absence",
     *   operationId="updatedemandeabsence",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="type_absence_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_demande",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="date_reprise",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="motif_demande",
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
    public function updateDemandeAbsence(Request $request, $id)
    {
        $rules = [
            'type_absence_id' => 'required',
            'date_demande' => 'required',
            'dure_absence' => 'required',
            'date_reprise' => 'required',
            'motif_demande' => 'nullable',
        ];
        $messages = array(
            'type_absence_id.required' => 'Type absence est obligatoire.',
            'date_demande.required' => 'Date demande absence est obligatoire.',
            'dure_absence.required' => 'Dure absence est obligatoire.',
            'date_reprise.required' => 'Date reprise est obligatoire.',
            'motif_demande.nullable' => 'Motif est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $demandeabsences = DemandeAbsence::findOrFail($id);
            $demandeabsences->type_absence_id = $request->input('type_absence_id');
            $demandeabsences->date_demande = $request->input('date_demande');
            $demandeabsences->dure_absence = $request->input('dure_absence');
            $demandeabsences->date_reprise = $request->input('date_reprise');
            $demandeabsences->motif_demande = $request->input('motif_demande');
            $demandeabsences->contrat_id = $request->input('contrat_id');

            $datetime1 = strtotime($request->input('date_demande')); // convert to timestamps
            $datetime2 = strtotime($request->input('date_reprise')); // convert to timestamps
            // will give the difference in days , 86400 is the timestamp difference of a da
            $days = (int) (($datetime2 - $datetime1) / 86400);
            $demandeabsences->dure_absence = $days + 1;

            $historicals = new Historique(); //Create Historique
            $historicals->historical_name = 'Vous venez de faire modifié votre demande d\'absence';
            $historicals->user_id = auth()->user()->id;

            $startDate = date('Y-m-d', strtotime($request->input('date_demande')));
            $endDate = date('Y-m-d', strtotime($request->input('date_reprise')));

            if ($startDate > $endDate) {

                return $this->sendError("La date de retour  ne peut être inférieure à la date de demande");
            } else {

                $demandeabsences->save();
                $historicals->save(); //insert in database

                $user = array(
                    'last_name'  =>  Auth::user()->last_name,
                    'date_demande' =>  $request->date_demande,
                    'dure_absence' =>  $request->dure_absence,
                    'date_reprise' =>  $request->date_reprise,
                    'motif_demande' =>  $request->motif_demande
                );

                $pdfUserEmail =  Auth::user()->email;
                Mail::to($pdfUserEmail)->send(new AbsencePrestataireMail($user)); //Send mail in users

                return $this->sendResponse($demandeabsences, 'Demande d\'absence mis à jour avec succès.');
            }
        }
    }

    /**
     * @OA\Post(
     *      path="/api/deletedemandeabsence/{id}",
     *      operationId="deletedemandeabsence",
     *      tags={"Demande Absence"},
     *      summary="Supprimer demande absence existant",
     *      description="Supprime un enregistrement et ne renvoie aucun contenu",
     *      @OA\Parameter(
     *          name="id",
     *          description="Demande absence id",
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
    public function deleteDemandeAbsence($id)
    {
        $demandeabsences = DemandeAbsence::findOrFail($id); //Find a offer with a given id and delete
        $demandeabsences->delete();

        return $this->sendResponse([], 'Demande d\'absence  supprimée avec succès.');
    }
}
