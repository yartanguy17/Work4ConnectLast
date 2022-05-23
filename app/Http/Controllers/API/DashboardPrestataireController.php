<?php

namespace App\Http\Controllers\API;

use App\Models\Conge;
use App\Models\Contrat;
use App\Models\DemandeAbsence;
use App\Http\Controllers\API\BaseController as BaseController;
use Carbon\Carbon;

class DashboardPrestataireController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/demandeAbsencecount/{prestataire_id}",
     *      operationId="demandeAbsencecount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre d'absence du prestataire",
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
    public function demandeAbsencecount($prestataire_id)
    {
        $nbreAbsence = DemandeAbsence::where('user_id', $prestataire_id)
            ->where('is_valide', 1)->count();

        return $this->sendResponse($nbreAbsence, '');
    }

    /**
     * @OA\Get(
     *      path="/api/congescount/{prestataire_id}",
     *      operationId="congescount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre de conge du prestataire",
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
    public function congescount($prestataire_id)
    {
        $nbreConge = Conge::where('user_id', $prestataire_id)
            ->where('is_valide', 1)->count();

        return $this->sendResponse($nbreConge, '');
    }

    /**
     * @OA\Get(
     *      path="/api/contratEncourscount/{prestataire_id}",
     *      operationId="contratEncourscount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre de contrat en cour du prestataire",
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
    public function contratEncourscount($prestataire_id)
    {
        $nbreContratEnCours = Contrat::where('is_active', 1)
            ->where('date_fin', '>', Carbon::today())
            ->where('prestataire_id', $prestataire_id)->count();

        return $this->sendResponse($nbreContratEnCours, '');
    }

    /**
     * @OA\Get(
     *      path="/api/contratExpirescount/{prestataire_id}",
     *      operationId="contratExpirescount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre de contrat expire du prestataire",
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
    public function contratExpirescount($prestataire_id)
    {
        $nbreContratExpire = Contrat::where('date_fin', '<', \Carbon\Carbon::today())
            ->where('prestataire_id', $prestataire_id)->count();

        return $this->sendResponse($nbreContratExpire, '');
    }
}
