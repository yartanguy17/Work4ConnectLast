<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;
use App\Http\Controllers\API\BaseController as BaseController;

class AbsenceController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/absencebyclient/{client_id}",
     *      operationId="absencebyclient",
     *      tags={"Absences"},
     *      summary="Liste des absences",
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
    public function absenceByClient($client_id)
    {
        $absences = DemandeAbsence::join('contrats', 'contrats.id', '=', 'demande_absences.contrat_id')
            ->join('users', 'users.id', '=', 'demande_absences.user_id')
            ->where('contrats.client_id', $client_id)
            ->orderBy('demande_absences.created_at', 'desc')->get();

        if ($absences->count()) {

            return $this->sendResponse($absences, 'Absence récupérées avec succès.');
        }

        return $this->sendError('Pas d\'absence.');
    }

    /**
     * @OA\Post(
     ** path="/api/updateabsencebyclient/{id}",
     *   tags={"Absences"},
     *   summary="Modifier absence du client",
     *   operationId="updateabsencebyclient",
     *  description="Returns client data",
     *
     *  @OA\Parameter(
     *      name="is_valide_client",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="comment_client",
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
    public function updateAbsenceByClient(Request $request, $id)
    {
        $rules = [
            'is_valide_client' => 'required',
            'comment_client' => 'nullable',
        ];

        $messages = array(
            'is_valide_client.required' => 'Valider est obligatoire.',
            'comment_client.nullable' => 'Commentaire du client.',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $absences = DemandeAbsence::findOrFail($id);
            $absences->is_valide_client = $request->input('is_valide_client');
            $absences->comment_client = $request->input('comment_client');

            $absences->save();

            return $this->sendResponse($absences, 'Absence validé avec succès.');
        }
    }
}
