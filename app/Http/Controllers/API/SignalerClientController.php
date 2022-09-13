<?php

namespace App\Http\Controllers\API;

use App\Models\TypeAbsence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SignaleAbsence;
use App\Models\Historique;
use App\Http\Controllers\API\BaseController as BaseController;

class SignalerClientController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/listeabsenceclient/{client_id}",
     *      operationId="listeAbsenceClient",
     *      tags={"Absences"},
     *      summary="Liste des signalisations du client",
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
    public function listeAbsenceClient($client_id)
    {
        $absence = SignaleAbsence::select(
            'contrats.id',
            'signale_absences.id',
            'type_absences.type_absence_name',
            'signale_absences.date_demande',
            'signale_absences.hour_start_time',
            'signale_absences.date_reprise',
            'signale_absences.motif_demande',
            'signale_absences.is_valide',
            'signale_absences.contrat_id',

        )->join('type_absences', 'type_absences.id', '=', 'signale_absences.type_absence_id')
            ->join('contrats', 'contrats.id', '=', 'signale_absences.contrat_id')
            ->where('user_id', $client_id)->get();

        if ($absence->count()) {

            return $this->sendResponse($absence, ' Absence récupérées avec succès.');
        }

        return $this->sendError('Pas d\'absence trouvée.');
    }

    /**
     * @OA\Get(
     *      path="/api/listetypeabsence",
     *      operationId="listetypeabsence",
     *      tags={"Absences"},
     *      summary="Liste des types d'absence",
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
    public function listeTypeAbsence()
    {
        $typeabsences = TypeAbsence::all();

        if ($typeabsences->count()) {

            return $this->sendResponse($typeabsences, 'Type absence récupérées avec succès.');
        }

        return $this->sendError('Pas d\'absence trouvée.');
    }

    /**
     * @OA\Post(
     ** path="/api/storesignalabsence",
     *   tags={"Absences"},
     *   summary="Création signale absence du client",
     *   operationId="storesignalabsence",
     *  description="Returns client data",
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
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="contrat_id",
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
    public function storeSignalAbsence(Request $request)
    {
        $rules = [
            'type_absence_id' => 'required',
            'date_demande' => 'required',
            'contrat_id' => 'required',
        ];
        $messages = array(
            'type_absence_id.required' => 'Type absence est obligatoire.',
            'date_demande.required' => 'Date demande absence est obligatoire.',
            'contrat_id.required' => 'Contrat est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $signalerabsences = new SignaleAbsence();
            $signalerabsences->type_absence_id = $request->input('type_absence_id');
            $signalerabsences->date_demande = $request->input('date_demande');
            $signalerabsences->date_reprise = $request->input('date_reprise');
            $signalerabsences->motif_demande = $request->input('motif_demande');
            $signalerabsences->contrat_id = $request->input('contrat_id');
            $signalerabsences->user_id = $request->input('client_id');

            $datetime1 = strtotime($request->input('date_demande')); // convert to timestamps
            $datetime2 = strtotime($request->input('date_reprise')); // convert to timestamps
            // will give the difference in days , 86400 is the timestamp difference of a da
            $days = (int) (($datetime2 - $datetime1) / 86400);
            $signalerabsences->hour_start_time = $days + 1;

            $historicals = new Historique(); //Create Historique
            $historicals->historical_name = 'Vous venez de signaler une absence';
            $historicals->user_id = $request->input('client_id');

            //check if date between two dates
            $startDate = date('Y-m-d', strtotime($request->input('date_demande')));
            $endDate = date('Y-m-d', strtotime($request->input('date_reprise')));

            if ($startDate >= $endDate) {

                return $this->sendError('La date de reprise de poste ne peut être inférieure  à la date début d\'absence');
            } else {

                $signalerabsences->save(); //insert in database
                $historicals->save(); //insert in database

                return $this->sendResponse($signalerabsences, 'Absence signalée enregistrée.');
            }
        }
    }

    /**
     * @OA\Post(
     ** path="/api/updatesignalabsence/{id}",
     *   tags={"Absences"},
     *   summary="Modifier signale absence du client",
     *   operationId="updatesignalabsence",
     *  description="Returns client data",
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
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="contrat_id",
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
    public function updateSignalAbsence(Request $request, $id)
    {
        $rules = [
            'type_absence_id' => 'required',
            'date_demande' => 'required',
            'contrat_id' => 'required',
        ];
        $messages = array(
            'type_absence_id.required' => 'Type absence est obligatoire.',
            'date_demande.required' => 'Date demande absence est obligatoire.',
            'contrat_id.required' => 'Contrat est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $signalerabsences = SignaleAbsence::findOrFail($id);
            $signalerabsences->type_absence_id = $request->input('type_absence_id');
            $signalerabsences->date_demande = $request->input('date_demande');
            $signalerabsences->hour_start_time = $request->input('hour_start_time');
            $signalerabsences->date_reprise = $request->input('date_reprise');
            $signalerabsences->motif_demande = $request->input('motif_demande');
            $signalerabsences->contrat_id = $request->input('contrat_id');
            $signalerabsences->user_id = $request->input('client_id');

            $datetime1 = strtotime($request->input('date_demande')); // convert to timestamps
            $datetime2 = strtotime($request->input('date_reprise')); // convert to timestamps
            // will give the difference in days , 86400 is the timestamp difference of a da
            $days = (int) (($datetime2 - $datetime1) / 86400);
            $signalerabsences->hour_start_time = $days + 1;

            $historicals = new Historique(); //Create Historique
            $historicals->historical_name = 'Vous venez de faire modifié une absence';
            $historicals->user_id = $request->input('client_id');

            //check if date between two dates
            $startDate = date('Y-m-d', strtotime($request->input('date_demande')));
            $endDate = date('Y-m-d', strtotime($request->input('date_reprise')));

            if ($startDate >= $endDate) {

                return $this->sendError('La date de reprise de poste ne peut être inférieure  à la date début d\'absence');
            } else {

                $signalerabsences->save(); //insert in database
                $historicals->save(); //insert in database

                return $this->sendResponse($signalerabsences, 'Absence signalée enregistrée.');
            }
        }
    }

    /**
     * @OA\Post(
     *      path="/api/deletesignalerabsences/{id}",
     *      operationId="deletesignalerabsences",
     *      tags={"Absences"},
     *      summary="Supprimer signal existant",
     *      description="Supprime un enregistrement et ne renvoie aucun contenu",
     *      @OA\Parameter(
     *          name="id",
     *          description="Signaler id",
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
    public function deleteSignalerAbsences($id)
    {
        $signalerabsences = SignaleAbsence::find($id);
        $signalerabsences->delete(); //function in delete

        return $this->sendResponse([], 'supprimée avec succès.');
    }
}
