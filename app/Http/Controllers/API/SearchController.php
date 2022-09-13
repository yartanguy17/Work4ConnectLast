<?php

namespace App\Http\Controllers\API;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;


class SearchController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/search",
     *      operationId="getSearchResults",
     *      tags={"Recherche"},
     *      summary="Liste des recherches",
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
    public function getSearchResults(Request $request)
    {
        $secteur = $request->get('secteur');
        $ville = $request->get('ville');

        $search = Offer::select(
            'offers.id',
            'offers.title_offer',
            'users.type_users',
            'users.gender',
            'villes.title_ville',
            'secteur_activites.title_secteur'
        )->join('users', 'users.id', '=', 'offers.user_id')
            ->join('villes', 'villes.id', '=', 'users.ville_id')
            ->join('secteur_activites', 'secteur_activites.id', '=', 'users.secteur_activite_id')
            ->where('users.ville_id', 'like', "%{$secteur}%")
            ->orWhere('users.secteur_activite_id', 'like', "%{$ville}%")
            ->get();

        if ($search->count()) {

            return $this->sendResponse($search, 'Donné récupérées avec succès.');
        }

        return $this->sendError('Pas de donner');
    }
}
