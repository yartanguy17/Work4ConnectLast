<?php

namespace App\Http\Controllers\API;

use App\Models\Contrat;
use App\Models\Facture;
use Carbon\Carbon;
use App\Http\Controllers\API\BaseController as BaseController;

class ContratController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/listecontratencoursbyclient/{client_id}",
     *      operationId="listecontratencoursbyclient",
     *      tags={"Contrat"},
     *      summary="Contrat en cour du client",
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
    public function listeContratEnCoursByClient($client_id)
    {
        $contrat = Contrat::select(
            'contrats.id',
            'type_contrats.title_type_con',
            'contrats.date_effet',
            'contrats.date_fin',
            'contrats.status',
            'contrats.created_at',
            'users.last_name',
            'users.first_name'
        )
            ->join('type_contrats', 'type_contrats.id', '=', 'contrats.type_contrat_id')
            ->join('users', 'users.id', '=', 'contrats.prestataire_id')
            ->where('is_active', 1)
            ->where('contrats.date_fin', '>', Carbon::today())
            ->orWhere('contrats.date_fin', '=', null)
            ->where('contrats.client_id', $client_id)
            ->get();

        if ($contrat->count()) {

            return $this->sendResponse($contrat, ' contrat récupérées avec succès.');
        }

        return $this->sendError('Pas de contrat trouvé.');
    }

    /**
     * @OA\Get(
     *      path="/api/listecontratexpirebyclient/{client_id}",
     *      operationId="listecontratexpirebyclient",
     *      tags={"Contrat"},
     *      summary="Contrat expire du client",
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
    public function listeContratExpireByClient($client_id)
    {
        $contrat = Contrat::select(
            'contrats.id',
            'type_contrats.title_type_con',
            'contrats.date_effet',
            'contrats.date_fin',
            'contrats.status',
            'contrats.created_at',
            'users.last_name',
            'users.first_name'
        )
            ->join('type_contrats', 'type_contrats.id', '=', 'contrats.type_contrat_id')
            ->join('users', 'users.id', '=', 'contrats.prestataire_id')
            ->where('contrats.client_id', $client_id)
            ->where('contrats.date_fin', '<', Carbon::today())
            ->get();

        if ($contrat->count()) {

            return $this->sendResponse($contrat, ' contrat expiré récupérés avec succès.');
        }

        return $this->sendError('Pas de contrat expiré trouvé.');
    }

    /**
     * @OA\Get(
     *      path="/api/listeContratencoursbyprestataire/{prestataire_id}",
     *      operationId="listeContratencoursbyprestataire",
     *      tags={"Contrat"},
     *      summary="Contrat en cour du prestataire",
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
    public function listeContratEnCoursByPrestataire($prestataire_id)
    {
        $contrat = Contrat::select(
            'contrats.id',
            'type_contrats.title_type_con',
            'contrats.date_effet',
            'contrats.date_fin',
            'contrats.status',
            'contrats.created_at',
            'users.last_name',
            'users.first_name'
        )
            ->join('type_contrats', 'type_contrats.id', '=', 'contrats.type_contrat_id')
            ->join('users', 'users.id', '=', 'contrats.client_id')
            ->where('is_active', 1)
            ->where('contrats.date_fin', '>', Carbon::today())
            ->orWhere('contrats.date_fin', '=', null)
            ->where('contrats.prestataire_id',  $prestataire_id)
            ->get();

        if ($contrat->count()) {

            return $this->sendResponse($contrat, ' contrat récupérées avec succès.');
        }

        return $this->sendError('Pas de contrat trouvée.');
    }

    /**
     * @OA\Get(
     *      path="/api/listecontratexpirebyprestataire/{prestataire_id}",
     *      operationId="listecontratexpirebyprestataire",
     *      tags={"Contrat"},
     *      summary="Contrat expire du prestataire",
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
    public function listeContratExpireByPrestataire($prestataire_id)
    {
        $contrat = Contrat::select(
            'contrats.id',
            'type_contrats.title_type_con',
            'contrats.date_effet',
            'contrats.date_fin',
            'contrats.status',
            'contrats.created_at',
            'users.last_name',
            'users.first_name'
        )->join('type_contrats', 'type_contrats.id', '=', 'contrats.type_contrat_id')
            ->join('users', 'users.id', '=', 'contrats.client_id')
            ->where('contrats.date_fin', '<', Carbon::today())
            ->where('contrats.prestataire_id',  $prestataire_id)
            ->get();

        if ($contrat->count()) {

            return $this->sendResponse($contrat, ' contrat expiré récupérés avec succès.');
        }

        return $this->sendError('Pas de contrat expiré trouvé.');
    }


    /**
     * @OA\Get(
     *      path="/api/listefacturebyclient/{client_id}",
     *      operationId="listefacturebyclient",
     *      tags={"Facture"},
     *      summary="Facture du client",
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
    public function listeFactureByClient($client_id)
    {
        $factures = Facture::select('factures.id', 'factures.amount', 'factures.reference', 'factures.date_facture', 'factures.status')
            ->join('contrats', 'contrats.id', '=', 'factures.contrat_id')
            ->where('contrats.is_active', 1)
            ->where('contrats.client_id', $client_id)
            ->where('factures.status', 0)
            ->get();

        if ($factures->count()) {

            return $this->sendResponse($factures, 'Facture récupérés avec succès.');
        }

        return $this->sendError('Pas de facture trouvé.');
    }
}
