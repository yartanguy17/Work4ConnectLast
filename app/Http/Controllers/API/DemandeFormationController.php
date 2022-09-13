<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\DemandeFormation;
use App\Models\Formation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class DemandeFormationController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/demandebyprestataire/{prestataire_id}",
     *      operationId="demandebyprestataire",
     *      tags={"Formations"},
     *      summary="Liste des formations du prestataire",
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
    public function demandeByPrestataire($prestataire_id)
    {
        $demande = DemandeFormation::select(
            'demande_formations.id',
            'formations.title_formation',
            'formations.description_formation',
            'formations.date_debut',
            'formations.date_fin',
            'formations.cout_formation',
            'type_formations.title_type_for',
            'demande_formations.status',
            'demande_formations.created_at',
            'demande_formations.decision_dem_for'
        )->where('status', 0)->where('user_id', $prestataire_id)
            ->join('formations', 'formations.id', '=', 'demande_formations.formation_id')
            ->join('type_formations', 'type_formations.id', '=', 'formations.type_formation_id')
            ->get();

        if ($demande->count()) {

            return $this->sendResponse($demande, 'Demande récupérées avec succès.');
        }

        return $this->sendError('Pas de demande.');
    }

    /**
     * @OA\Get(
     *      path="/api/listeformation",
     *      operationId="listeformation",
     *      tags={"Formations"},
     *      summary="Liste des formations",
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
    public function listeFormation()
    {
        $formations = Formation::where('date_fin', '>', Carbon::now())->get();

        if ($formations->count()) {

            return $this->sendResponse($formations, 'Formation récupérées avec succès.');
        }

        return $this->sendError('Pas de Formation trouvée.');
    }

    /**
     * @OA\Post(
     ** path="/api/storedemandeformation",
     *   tags={"Formations"},
     *   summary="Creation de formation",
     *   operationId="storedemandeformation",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="formation_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="motif_dem_for",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="description_dem_for",
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
    public function storeDemandeFormation(Request $request)
    {
        $rules = [
            'formation_id' => 'required',
            'motif_dem_for' => 'required',
            'description_dem_for' => 'nullable',
        ];
        $messages = array(
            'formation_id.required' => 'Formation est obligatoire.',
            'motif_dem_for.required' => 'Motif est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {


            $demande = new DemandeFormation();
            $demande->formation_id = $request->input('formation_id');
            $demande->user_id = $request->input('prestataire_id');
            $demande->motif_dem_for = $request->input('motif_dem_for');
            $demande->description_dem_for = $request->input('description_dem_for');

            $demande->save();

            return $this->sendResponse($demande, 'Demande de formation ajoutée avec succès.');
        }
    }

    /**
     * @OA\Post(
     ** path="/api/updatedemandeformation/{id}",
     *   tags={"Formations"},
     *   summary="Modifier de formation",
     *   operationId="updatedemandeformation",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="formation_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="motif_dem_for",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="description_dem_for",
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
    public function updateDemandeFormation(Request $request, $id)
    {
        $rules = [
            'formation_id' => 'required',
            'motif_dem_for' => 'required',
            'description_dem_for' => 'nullable',
        ];
        $messages = array(
            'formation_id.required' => 'Formation est obligatoire.',
            'motif_dem_for.required' => 'Motif est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            $demande = DemandeFormation::findOrFail($id); //Find a DemandeFormation with a given id and delete
            $demande->formation_id = $request->input('formation_id');
            $demande->motif_dem_for = $request->input('motif_dem_for');
            $demande->description_dem_for = $request->input('description_dem_for');

            $demande->save();

            return $this->sendResponse($demande, 'Demande de formation mis à jour.');
        }
    }

    /**
     * @OA\Post(
     *      path="/api/deletedemandeformation/{id}",
     *      operationId="deletedemandeformation",
     *      tags={"Formations"},
     *      summary="Supprimer formation existant",
     *      description="Supprime un enregistrement et ne renvoie aucun contenu",
     *      @OA\Parameter(
     *          name="id",
     *          description="Formation id",
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
    public function deleteDemandeFormation($id)
    {
        $demande = DemandeFormation::findOrFail($id); //Find a offer with a given id and delete
        $demande->delete();

        return $this->sendResponse([], 'Demande de formation supprimée avec succès.');
    }

    /**
     * @OA\Get(
     *      path="/api/pendingformation/{prestataire_id}",
     *      operationId="pendingformation",
     *      tags={"Formations"},
     *      summary="Liste des formations en cour du prestataire",
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
    public function pendingFormation($prestataire_id)
    {
        $participations = DemandeFormation::select(
            'demande_formations.id',
            'formations.title_formation',
            'formations.description_formation',
            'formations.date_debut',
            'formations.date_fin',
            'formations.cout_formation',
            'type_formations.title_type_for',
            'demande_formations.status',
            'formations.created_at',
            'demande_formations.decision_dem_for'
        )->join('formations', 'formations.id', '=', 'demande_formations.formation_id')
            ->join('type_formations', 'type_formations.id', '=', 'formations.type_formation_id')
            ->where('demande_formations.status', 1)
            ->where('demande_formations.user_id', $prestataire_id)
            ->where('date_debut', '>', Carbon::now())
            ->get();

        if ($participations->count()) {

            return $this->sendResponse($participations, 'Formation récupérées avec succès.');
        }

        return $this->sendError('Pas de Formation trouvée.');
    }

    /**
     * @OA\Get(
     *      path="/api/pendingformationbiginning/{prestataire_id}",
     *      operationId="pendingformationbiginning",
     *      tags={"Formations"},
     *      summary="Liste des formations expire du prestataire",
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
    public function pendingFormationBiginning($prestataire_id)
    {
        $participations = DemandeFormation::select(
            'demande_formations.id',
            'formations.title_formation',
            'formations.description_formation',
            'formations.date_debut',
            'formations.date_fin',
            'formations.cout_formation',
            'type_formations.title_type_for',
            'demande_formations.status',
            'formations.created_at',
            'demande_formations.decision_dem_for'
        )->join('formations', 'formations.id', '=', 'demande_formations.formation_id')
            ->join('type_formations', 'type_formations.id', '=', 'formations.type_formation_id')
            ->where('demande_formations.status', 1)->where('demande_formations.user_id', $prestataire_id)
            ->where('date_debut', '<=', Carbon::now())
            ->get();

        if ($participations->count()) {

            return $this->sendResponse($participations, 'Formation récupérées avec succès.');
        }

        return $this->sendError('Pas de Formation trouvée.');
    }

    /**
     * @OA\Get(
     *      path="/api/archivedformation/{prestataire_id}",
     *      operationId="archivedformation",
     *      tags={"Formations"},
     *      summary="Liste des formations archivés du prestataire",
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
    public function archivedFormation($prestataire_id)
    {
        $participations = DemandeFormation::select(
            'demande_formations.id',
            'formations.title_formation',
            'formations.description_formation',
            'formations.date_debut',
            'formations.date_fin',
            'formations.cout_formation',
            'type_formations.title_type_for',
            'demande_formations.status',
            'formations.created_at',
            'demande_formations.decision_dem_for'
        )->join('formations', 'formations.id', '=', 'demande_formations.formation_id')
            ->join('type_formations', 'type_formations.id', '=', 'formations.type_formation_id')
            ->where('date_fin', '<', Carbon::now())
            ->where('demande_formations.user_id', $prestataire_id)
            ->get();

        if ($participations->count()) {

            return $this->sendResponse($participations, 'Formation récupérées avec succès.');
        }

        return $this->sendError('Pas de Formation trouvée.');
    }
}
