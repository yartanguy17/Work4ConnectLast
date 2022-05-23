<?php

namespace App\Http\Controllers\API;

use App\Models\Apply;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Mail\ApplyAdminMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class ApplyController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/applybyprestataire/{prestataire_id}",
     *      operationId="applybyprestataire",
     *      tags={"Candidatures"},
     *      summary="Liste des candidatures du prestataire",
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
    public function applyByPrestataire($prestataire_id)
    {
        $applies = Apply::select(
            'applies.id',
            'applies.offer_id',
            'offers.id',
            'offers.title_offer',
            'applies.status',
            'applies.is_active',
            'applies.cover_letter'
        )
            ->where('applies.user_id', $prestataire_id)
            ->join('offers', 'offers.id', '=', 'applies.offer_id')
            ->get();

        if ($applies->count()) {

            return $this->sendResponse($applies, 'Apply récupérées avec succès.');
        }

        return $this->sendError('Pas d\'apply.');
    }

    /**
     * @OA\Get(
     *      path="/api/apply/{offer_id}",
     *      operationId="apply",
     *      tags={"Candidatures"},
     *      summary="Liste des candidatures du prestataire",
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
    public function apply($offer_id)
    {
        $offer = Offer::select(
            'offers.id',
            'offers.title_offer',
            'offers.vacancies',
            'offers.expected_salary',
            'offers.total_experience',
            'offers.start_date',
            'offers.end_date',
            'offers.mission',
            'offers.profile',
            'offers.description_offer',
            'type_contrats.title_type_con',
            'villes.title_ville',
            'secteur_activites.title_secteur',
            'job_types.title_job_ty'
        )->join('type_contrats', 'type_contrats.id', '=', 'offers.type_contrat_id')
            ->join('villes', 'villes.id', '=', 'offers.ville_id')
            ->join('secteur_activites', 'secteur_activites.id', '=', 'offers.secteur_activite_id')
            ->join('job_types', 'job_types.id', '=', 'offers.job_type_id')
            ->where('offers.id', $offer_id)
            ->get();

        if ($offer->count()) {

            return $this->sendResponse($offer, 'Apply récupérées avec succès.');
        }

        return $this->sendError('Pas d\'apply.');
    }

    /**
     * @OA\Post(
     ** path="/api/storeapply",
     *   tags={"Candidatures"},
     *   summary="Creation candidature",
     *   operationId="storeapply",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="cover_letter",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="cover_letter_file",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="cv_file",
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
    public function storeApply(Request $request)
    {
        $rules = [
            'cover_letter' => 'nullable',
            'cover_letter_file' => 'nullable',
            'cv_file' => 'nullable',
        ];

        $messages = array(
            'cover_letter_file.nullable' => 'La lettre de motivation est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            if ($request->hasfile('cv_file')) {

                $fileUrl = $request->file('cv_file');
                $cvNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/dossier');
                $fileUrl->move($destinationPath, $cvNameToStore);
            }

            if ($request->hasfile('cover_letter_file')) {

                $fileUrl = $request->file('cover_letter_file');
                $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/dossier');
                $fileUrl->move($destinationPath, $fileNameToStore);
            }

            $apply = new Apply();
            $apply->offer_id = $request->input('offer_id');
            $apply->user_id = auth()->user()->id;
            $apply->cover_letter = $request->input('cover_letter');

            if ($request->hasfile('cv_file')) {
                $apply->cv_file = $cvNameToStore;
            }

            if ($request->hasfile('cover_letter_file')) {
                $apply->cover_letter_file = $fileNameToStore;
            }

            $apply->save();

            //Mail::to('info@centralresource.net')->send(new ApplyAdminMail($user, $offer, $apply));

            return $this->sendResponse($apply, 'Candidature enregistrée avec succès.');
        }
    }

    /**
     * @OA\Post(
     ** path="/api/updateapply/{id}",
     *   tags={"Candidatures"},
     *   summary="Modifier candidature",
     *   operationId="updateapply",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="cover_letter",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="cover_letter_file",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="cv_file",
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
    public function updateApply(Request $request, $id)
    {
        $rules = [
            'cover_letter' => 'nullable',
            'cover_letter_file' => 'nullable',
            'cv_file' => 'nullable',
        ];

        $messages = array(
            'cover_letter_file.nullable' => 'La lettre de motivation est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            if ($request->hasfile('cv_file')) {

                $fileUrl = $request->file('cv_file');
                $cvNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/dossier');
                $fileUrl->move($destinationPath, $cvNameToStore);
            }

            if ($request->hasfile('cover_letter_file')) {

                $fileUrl = $request->file('cover_letter_file');
                $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/dossier');
                $fileUrl->move($destinationPath, $fileNameToStore);
            }

            $apply = Apply::findOrFail($id);
            $apply->offer_id = $request->input('offer_id');
            $apply->user_id = auth()->user()->id;
            $apply->cover_letter = $request->input('cover_letter');

            if ($request->hasfile('cv_file')) {
                $apply->cv_file = $cvNameToStore;
            }

            if ($request->hasfile('cover_letter_file')) {
                $apply->cover_letter_file = $fileNameToStore;
            }

            $apply->save();

            return $this->sendResponse($apply, 'Candidature modifié avec succès.');
        }
    }
}
