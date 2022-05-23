<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\DashboardClientController;
use App\Http\Controllers\API\OffersClientController;
use App\Http\Controllers\API\ContratController;
use App\Http\Controllers\API\SignalerClientController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\DashboardPrestataireController;
use App\Http\Controllers\API\DemandePrestataireController;
use App\Http\Controllers\API\CongePrestataireController;
use App\Http\Controllers\API\ApplyController;
use App\Http\Controllers\API\DemandeFormationController;
use App\Http\Controllers\API\AbsenceController;
use App\Http\Controllers\API\SearchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//======================Register===================//
Route::post('/registerclient', [RegisterController::class, 'registerclient']);
Route::post('/registerprestataire', [RegisterController::class, 'registerprestataire']);
//========================Login=====================//
Route::post('/login', [LoginController::class, 'login']);
//===============Ville =====================//
Route::get('/search', [SearchController::class, 'getSearchResults']);
Route::get('/getville', [RegisterController::class, 'getville']);
Route::get('/getsecteur', [RegisterController::class, 'getsecteur']);

Route::group(['middleware' => ['jwt.verify']], function () {
    //==============API pour la partie client dashboard===========//
    Route::get('/offerscount/{client_id}', [DashboardClientController::class, 'offerscount']);
    Route::get('/contratscount/{client_id}', [DashboardClientController::class, 'contratscount']);
    Route::get('/contratExpirecount/{client_id}', [DashboardClientController::class, 'contratExpirecount']);
    Route::get('/signaleabsencescount/{client_id}', [DashboardClientController::class, 'signaleabsencescount']);
    //==============API pour la partie client===========//
    Route::get('/listetypecontrat', [OffersClientController::class, 'listetypecontrat']);
    Route::get('/listeville', [OffersClientController::class, 'listeville']);
    Route::get('/listesecteur', [OffersClientController::class, 'listesecteur']);
    Route::get('/listetypejob', [OffersClientController::class, 'listetypejob']);
    //=============== Endpoint Offers =====================//
    Route::get('/offerbyclient/{client_id}', [OffersClientController::class, 'offerByClient']);
    Route::post('/storeoffer', [OffersClientController::class, 'storeOffer']);
    Route::post('/updateoffer/{id}', [OffersClientController::class, 'updateOffer']);
    Route::post('/deleteoffer/{id}', [OffersClientController::class, 'deleteOffer']);
    //=============== Endpoint Contrats =====================//
    Route::get('/listecontratencoursbyclient/{client_id}', [ContratController::class, 'listeContratEnCoursByClient']);
    Route::get('/listecontratexpirebyclient/{client_id}', [ContratController::class, 'listeContratExpireByClient']);
    Route::get('/listeContratencoursbyprestataire/{prestataire_id}', [ContratController::class, 'listeContratEnCoursByPrestataire']);
    Route::get('/listecontratexpirebyprestataire/{prestataire_id}', [ContratController::class, 'listeContratExpireByPrestataire']);
    //=============== Endpoint Signal Absence =====================//
    Route::get('/listeabsenceclient/{client_id}', [SignalerClientController::class, 'listeAbsenceClient']);
    Route::get('/listetypeabsence', [SignalerClientController::class, 'listeTypeAbsence']);
    Route::post('/storesignalabsence', [SignalerClientController::class, 'storeSignalAbsence']);
    Route::post('/updatesignalabsence/{id}', [SignalerClientController::class, 'updateSignalAbsence']);
    Route::post('/deletesignalerabsences/{id}', [SignalerClientController::class, 'deleteSignalerAbsences']);
    //==============API pour la partie prestataire dashboard===========//
    Route::get('/demandeAbsencecount/{prestataire_id}', [DashboardPrestataireController::class, 'demandeAbsencecount']);
    Route::get('/congescount/{prestataire_id}', [DashboardPrestataireController::class, 'congescount']);
    Route::get('/contratEncourscount/{prestataire_id}', [DashboardPrestataireController::class, 'contratEncourscount']);
    Route::get('/contratExpirescount/{prestataire_id}', [DashboardPrestataireController::class, 'contratExpirescount']);
    //=============== Endpoint Profile =====================//
    Route::get('/listecontratenCoursByPrestataire/{prestataire_id}', [ContratController::class, 'listeContratEnCoursByPrestataire']);
    Route::get('/listecontratExpireByPrestataire/{prestataire_id}', [ContratController::class, 'listeContratExpireByPrestataire']);
    //=============== Formation =====================//
    Route::get('/listeformation', [DemandeFormationController::class, 'listeFormation']);
    //=============== Demande de Formation =====================//
    Route::get('/demandebyprestataire/{prestataire_id}', [DemandeFormationController::class, 'demandeByPrestataire']);
    Route::post('/storedemandeformation', [DemandeFormationController::class, 'storeDemandeFormation']);
    Route::post('/updatedemandeformation/{id}', [DemandeFormationController::class, 'updateDemandeFormation']);
    Route::post('/deletedemandeformation/{id}', [DemandeFormationController::class, 'deleteDemandeFormation']);
    Route::get('/pendingformation/{prestataire_id}', [DemandeFormationController::class, 'pendingFormation']);
    Route::get('/archivedformation/{prestataire_id}', [DemandeFormationController::class, 'archivedFormation']);
    Route::get('/pendingformationbiginning/{prestataire_id}', [DemandeFormationController::class, 'pendingFormationBiginning']);
    //========================== Demande absence =================================================//
    Route::get('/absencebyprestataire/{prestataire_id}', [DemandePrestataireController::class, 'absenceByPrestataire']);
    Route::get('/listetypeabsence', [DemandePrestataireController::class, 'listeTypeAbsence']);
    Route::post('/storedemandeabsence', [DemandePrestataireController::class, 'storeDemandeAbsence']);
    Route::post('/updatedemandeabsence/{id}', [DemandePrestataireController::class, 'updateDemandeAbsence']);
    Route::post('/deletedemandeabsence/{id}', [DemandePrestataireController::class, 'deleteDemandeAbsence']);
    //========================= Demande conge ==================================================//
    Route::get('/congebyprestataire/{prestataire_id}', [CongePrestataireController::class, 'congeByPrestataire']);
    Route::get('/listetypeconge', [CongePrestataireController::class, 'listeTypeConge']);
    Route::post('/storeconges', [CongePrestataireController::class, 'storeConge']);
    Route::post('/updateconge/{id}', [CongePrestataireController::class, 'updateConge']);
    Route::post('/deletedemandeconges/{id}', [CongePrestataireController::class, 'deletedemandeconges']);
    //=============== Endpoint Profile ========================================================//
    Route::get('/profileclient/{client_id}', [ProfileController::class, 'getProfileClient']);
    Route::get('/profileprestataire/{prestataire_id}', [ProfileController::class, 'getProfilePrestataire']);
    Route::post('/updateprofileclient/{id}', [ProfileController::class, 'updateProfileClient']);
    Route::post('/updateprofileprestataire/{id}', [ProfileController::class, 'updateProfilePrestataire']);
    //=============== Endpoint Absence ========================================================//
    Route::get('/absencebyclient/{client_id}', [AbsenceController::class, 'absenceByClient']);
    Route::get('/updateabsencebyclient/{id}', [AbsenceController::class, 'updateAbsenceByClient']);
    //=============== Candidature ========================================================//
    Route::get('/applybyprestataire/{prestataire_id}', [ApplyController::class, 'applyByPrestataire']);
    Route::post('/storeapply', [ApplyController::class, 'storeApply']);
    Route::post('/updateapply/{id}', [ApplyController::class, 'updateApply']);
    //===============Update password ===============================//
    Route::post('/updatepassword/{user_id}', [LoginController::class, 'updatePassword']);
    //===============Facture ===============================//
    Route::get('/listefacturebyclient/{client_id}', [ContratController::class, 'listeFactureByClient']);
    Route::get('/apply/{offer_id}', [ApplyController::class, 'apply']);
    //===============Nombre de jours ===============================//
    Route::get('/post_date', [OffersClientController::class, 'postDate']);
});
