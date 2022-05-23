<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Offer;
use App\Models\Contrat;
use App\Models\SignaleAbsence;
use Carbon\Carbon;

class DashboardClientController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/offerscount/{client_id}",
     *      operationId="offerscount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre d'offre du client",
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
    public function offerscount($client_id)
    {
        //Compte le nombre offre
        $offers = Offer::where('offers.user_id', $client_id)->count();

        return $this->sendResponse($offers, '');
    }

    /**
     * @OA\Get(
     *      path="/api/contratscount/{client_id}",
     *      operationId="contratscount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre de contrat en cours du client",
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
    public function contratscount($client_id)
    {
        $contrats = Contrat::where('is_active', 1)
            ->where('date_fin', '>', Carbon::today())
            ->orWhere('date_fin', '=', null)
            ->where('contrats.client_id', $client_id)->count();

        return $this->sendResponse($contrats, '');
    }

    /**
     * @OA\Get(
     *      path="/api/contratExpirecount/{client_id}",
     *      operationId="contratExpirecount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre de contrat expire du client",
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
    public function contratExpirecount($client_id)
    {
        $nbreExpire = Contrat::where('date_fin', '<', \Carbon\Carbon::today())
            ->where('contrats.client_id', $client_id)->count();

        return $this->sendResponse($nbreExpire, '');
    }

    /**
     * @OA\Get(
     *      path="/api/signaleabsencescount/{client_id}",
     *      operationId="signaleabsencescount",
     *      tags={"Dashboard"},
     *      summary="Compte le nombre d'absence du client",
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
    public function signaleabsencescount($client_id)
    {
        $nbreAbsence = SignaleAbsence::where('signale_absences.user_id', $client_id)->where('is_valide', 1)->count();

        return $this->sendResponse($nbreAbsence, '');
    }
}
