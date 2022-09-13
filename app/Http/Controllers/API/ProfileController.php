<?php

namespace App\Http\Controllers\API;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class ProfileController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/profileclient/{client_id}",
     *      operationId="profileclient",
     *      tags={"Profil"},
     *      summary="Profil du client",
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
    public function getProfileClient($client_id)
    {
        $profile = Profile::where('user_id', $client_id)->first();

        if ($profile->count()) {

            return $this->sendResponse($profile, ' Profile client récupérées avec succès.');
        }

        return $this->sendError('Pas de profile trouvée.');
    }

    /**
     * @OA\Get(
     *      path="/api/profileprestataire/{prestataire_id}",
     *      operationId="profileprestataire",
     *      tags={"Profil"},
     *      summary="Profil du prestataire",
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
    public function getProfilePrestataire($prestataire_id)
    {
        $profile = Profile::where('user_id', $prestataire_id)->first();

        if ($profile->count()) {

            return $this->sendResponse($profile, ' Profile prestataire récupérées avec succès.');
        }

        return $this->sendError('Pas de profile trouvée.');
    }

    /**
     * @OA\Post(
     ** path="/api/updateprofileclient/{id}",
     *   tags={"Profil"},
     *   summary="Modifier profil du client",
     *   operationId="updateprofileclient",
     *  description="Returns client data",
     *
     *  @OA\Parameter(
     *      name="last_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="first_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="phone_number",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="profile_picture",
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
    public function updateProfileClient(Request $request, $id)
    {
        $rules = [
            'last_name' => 'required',
            'first_name' => 'nullable',
            'phone_number' => 'nullable',
            'profile_picture' => 'image|nullable|mimes:jpg,png|max:2048',
        ];
        $messages = array(
            'last_name.required' => 'Le nom est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {

            if ($request->hasfile('profile_picture')) {
                $fileUrl = $request->file('profile_picture');
                $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/profil');
                $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo
            }

            $client = User::findOrFail($id);
            $client->last_name = $request->input('last_name');
            $client->first_name = $request->input('first_name');
            $client->contact_name = $request->input('contact_name');
            $client->nif = $request->input('nif');
            $client->gender = $request->input('gender');
            $client->email = $request->input('email');

            if ($request->input('phone_number')) {
                $client->phone_number = $request->input('phone_number');
            }

            $client->birth_date = $request->input('birth_date');
            $client->date_creation = $request->input('date_creation');
            $client->address = $request->input('address');

            if ($request->hasfile('profile_picture')) {
                $client->profile_picture = $fileNameToStore;
            }

            $client->biography = $request->input('biography');

            $client->save();

            return $this->sendResponse($client, 'Profil mis à jour avec succès.');
        }
    }

    /**
     * @OA\Post(
     ** path="/api/updateprofileprestataire/{id}",
     *   tags={"Profil"},
     *   summary="Modifier profil du prestataire",
     *   operationId="updateprofileprestataire",
     *  description="Returns prestataire data",
     *
     *  @OA\Parameter(
     *      name="last_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="first_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="phone_number",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="profile_picture",
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
    public function updateProfilePrestataire(Request $request, $id)
    {
        $rules = [
            'last_name' => 'required',
            'first_name' => 'nullable',
            'phone_number' => 'nullable',
            'profile_picture' => 'image|nullable|mimes:jpg,png|max:2048',
        ];
        $messages = array(
            'last_name.required' => 'Le nom est obligatoire.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation.', $validator->errors());
        } else {
            if ($request->hasfile('profile_picture')) {

                $fileUrl = $request->file('profile_picture');
                $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/profil');
                $fileUrl->move($destinationPath, $fileNameToStore);
            }

            // CNI saved
            if ($request->hasfile('cni_file')) {

                $fileUrl = $request->file('cni_file');
                $cniNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/attachments');
                $fileUrl->move($destinationPath, $cniNameToStore);
            }

            // Passport saved
            if ($request->hasfile('passport_file')) {

                $fileUrl = $request->file('passport_file');
                $passportNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/attachments');
                $fileUrl->move($destinationPath, $passportNameToStore);
            }

            // CNI saved
            if ($request->hasfile('vote_card_file')) {

                $fileUrl = $request->file('vote_card_file');
                $vote_cardNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
                $destinationPath = public_path('/attachments');
                $fileUrl->move($destinationPath, $vote_cardNameToStore);
            }

            $prestataire = User::findOrFail($id);
            $prestataire->last_name = $request->input('last_name');
            $prestataire->first_name = $request->input('first_name');
            $prestataire->contact_name = $request->input('contact_name');
            $prestataire->nif = $request->input('nif');
            $prestataire->gender = $request->input('gender');
            $prestataire->email = $request->input('email');
            $prestataire->birth_date = $request->input('birth_date');
            $prestataire->date_creation = $request->input('date_creation');

            if ($request->input('phone_number')) {
                $prestataire->phone_number = $request->input('phone_number');
            }

            if ($request->hasfile('profile_picture')) {
                $prestataire->profile_picture = $fileNameToStore;
            }

            if ($request->hasfile('profile_picture')) {
                $prestataire->profile_picture = $fileNameToStore;
            }

            if ($request->hasfile('cni_file')) {
                $prestataire->cni_num = $request->input('cni_num');
                $prestataire->cni_file = $cniNameToStore;
            }

            if ($request->hasfile('passport_file')) {
                $prestataire->passport_num = $request->input('passport_num');
                $prestataire->passport_file = $passportNameToStore;
            }

            if ($request->hasfile('vote_card_file')) {
                $prestataire->voter_card_num = $request->input('voter_card_num');
                $prestataire->voter_card_file = $vote_cardNameToStore;
            }

            $prestataire->num_impot = $request->input('num_impot');
            $prestataire->address = $request->input('address');
            $prestataire->expected_salary = $request->input('expected_salary');
            $prestataire->total_experience = $request->input('total_experience');

            $prestataire->save();

            return $this->sendResponse($prestataire, 'Profil mis à jour avec succès.');
        }
    }
}
