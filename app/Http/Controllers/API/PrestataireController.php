<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;

class PrestataireController extends BaseController
{
    /**
     * getProfile.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrestataire()
    {
        $prestataire = User::where('type_users', 'prestataire')->get();

        if ($prestataire->count()) {

            return $this->sendResponse($prestataire, ' Prestataire récupérées avec succès.');
        }

        return $this->sendError('Pas de Prestataire trouvée.');
    }
}
