<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::get('/contract-jobs', 'JobsController@generateAutomatedInvoice');

Route::get('/markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markasread');

// Website Routes
Route::get('/', 'Website\PagesController@index')->name('home');
Route::get('/a-propos', 'Website\PagesController@about')->name('about');
Route::get('/nos-services', 'Website\PagesController@services')->name('services');
Route::get('/contactez-nous', 'Website\PagesController@contact')->name('contact');
Route::post('contact', 'Website\ContactController@store')->name('postcontact');
Route::get('/conditions-generales-d-utilisation', 'Website\PagesController@terms')->name('terms');
Route::get('/politique-de-confidentialite', 'Website\PagesController@policy')->name('policy');
Route::get('/faq', 'Website\PagesController@faq')->name('faq');
Route::get('/charte-ethique', 'Website\PagesController@charte')->name('charte');

 Route::post('postuler/par/mail', 'Website\PagesController@applyByMail')->name('applybymail');

//blog
Route::get('/blog', 'Website\PagesController@blog')->name('blog');
Route::get('post/{slug}', ['as' => 'blog.show', 'uses' => 'Website\PagesController@postDetails']);
Route::get('post/author/{name}', ['as' => 'author.show', 'uses' => 'Website\PagesController@authorPost']);
Route::get('category/{slug}', ['as' => 'categoryPosts', 'uses' => 'Website\PagesController@categoryPosts']);
//Offer
Route::get('/nos-offres', 'Website\PagesController@offers')->name('offers');
Route::get('offre/{slug}', ['as' => 'offer.show', 'uses' => 'Website\PagesController@offerDetails']);
Route::get('offre/{slug}', ['as' => 'offer.show.single', 'uses' => 'Website\PagesController@offerDetailsSingle']);
//Auth Client
Route::get('/register_client', 'Auth\RegisterController@showClientRegistrationForm')->name('register_client');
Route::post('/register_client_save', 'Auth\RegisterController@clientRegistration')->name('register_client_save');
//Auth Prestataire
Route::get('/register_prestataire', 'Auth\RegisterController@showPrestataireRegisterForm')->name('register_prestataire');
Route::post('/register_prestataire_save', 'Auth\RegisterController@prestataireRegistration')->name('register_prestataire_save');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//Verify email
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('categorie/check_slug', 'Admin\CategoryController@check_slug')->name('category.check_slug');
Route::get('postn/check_slug', 'Admin\PostController@check_slug')->name('post.check_slug');
Route::get('/recherhce/prestataire', 'Website\SearchController@getSearch')->name('search');
Route::get('/recherhce/post', 'Website\SearchController@search')->name('post.search');

Route::get('/getVilles', 'Website\PagesController@getVilles')->name('getVilles');
Route::get('/etre-rappele-par-un-conseiller', 'Website\PagesController@etre_rappele')->name('etre_rappele');
Route::post('/post/etre-rappele', 'Website\PagesController@postEtreRappeler')->name('post_etre_rappele');
Route::get('/demander-devis', 'Website\PagesController@demander_devis')->name('demander_devis');
Route::post('/post/demander-devis', 'Website\PagesController@postDemanderDevis')->name('post_demander_devis');
Route::resource('newsletters', 'Website\NewsletterController');
//PDF
Route::get('facture/{id}/print', ['as' => 'print', 'uses' => 'Admin\ContratController@print']);
Route::get('facture/{id}/print', ['as' => 'facture', 'uses' => 'Admin\ContratController@factureSave']);
Route::get('facture', ['as' => 'factureg', 'uses' => 'Admin\ContratController@facture']);
Route::get('affiche', ['as' => 'affiche', 'uses' => 'Admin\ContratController@indexfacture']);
Route::get('affiche-facture', ['as' => 'affichers', 'uses' => 'Admin\ContratController@indexfactureOk']);
Route::get('affiche-facture-non-payee', ['as' => 'afficher', 'uses' => 'Admin\ContratController@indexfactureNonOk']);

Route::get('callback', ['as' => 'callback', 'uses' => 'Admin\PayeController@checkPayment']);

Route::get('affiche/{id}/printer', ['as' => 'printer', 'uses' => 'Admin\ContratController@affiche']);
Route::get('contrat/{id}/pdf', ['as' => 'contratclient.pdf', 'uses' => 'Website\Client\ClientController@pdf']);
Route::get('paie/{id}', ['as' => 'paiement', 'uses' => 'Admin\PayeController@paie']);
Route::get('paiementfacture/{id}', ['as' => 'paiementfacture', 'uses' => 'Website\Client\ClientController@paie']);
//Prestataire Profile
Route::get('prestataire/{id}/view', ['as' => 'prestataire.view', 'uses' => 'Website\PagesController@view']);

Route::get('change/quotation/status', 'Admin\QuotationController@ChangeUserStatus')->name('change_quotation_status');
Route::get('change/reservation/status', 'Admin\ReservationController@ChangeUserStatus')->name('change_reservation_status');

Route::get('/recherche/clients', 'Admin\ContratController@allClients')->name('getClients');

Route::get('/recherche/prestataires', 'Admin\ContratController@allPrestataires')->name('getPrestataires');
Route::get('searchPrestataireAbsences', 'Admin\DemandeAbsenceController@searchPrestataireAbsences')->name('searchPrestataireAbsences');
Route::get('searchPrestataireConges', 'Admin\CongesController@searchPrestataireConges')->name('searchPrestataireConges');
//Paiement
Route::get('searchPrestataire', 'Admin\PayeController@allPrestataires')->name('searchPrestataire');
Route::get('/searchprint', 'Admin\PayeController@index')->name('searchprint');
//Détails contrat
Route::get('/contrat/{id}/detail', 'Website\PagesController@detaitContrat')->name('contrat.show');

Route::get('deletedemandeformations/{id}', 'Website\Prestataire\DemandeFormationController@deletedemandeformations')->name('deletedemandeformations');
Route::get('deletedemandeabsences/{id}', 'Website\Prestataire\DemandePrestataireController@deletedemandeabsences')->name('deletedemandeabsences');
Route::get('deletedemandeconges/{id}', 'Website\Prestataire\CongePrestataireController@deletedemandeconges')->name('deletedemandeconges');

Route::get('searchprintclient', 'Admin\FactureController@index')->name('searchprintclient');
Route::get('searchClient', 'Admin\FactureController@allClients')->name('searchClient');
Route::get('deleteoffers/{id}', 'Website\Client\OfferController@deleteoffers')->name('deleteoffers');
Route::get('deletesignalerabsences/{id}', 'Website\Client\SignalerClientController@deletesignalerabsences')->name('deletesignalerabsences');

Route::get('/absence-requests-lists', 'Website\Client\ClientController@liste')->name('demande.list');
Route::get('/absence-requests-accept/{id}', 'Website\Client\ClientController@valider')->name('demande.valider');
Route::get('/absence-requests-refus/{id}', 'Website\Client\ClientController@reffuser')->name('demande.reffuser');
Route::get('/leave-requests-list', 'Website\Client\ClientController@listeconges')->name('demande.conge.list');
Route::get('/leave-requests-accept/{id}', 'Website\Client\ClientController@validerconge')->name('demande.conge.valider');
Route::get('/leave-requests-refus/{id}', 'Website\Client\ClientController@reffuserconge')->name('demande.conge.reffuser');

//Routes des prestataires contrat.pdf
Route::name('prestataire.')->group(function () {

    Route::group(['prefix' => 'prestataire'], function () {
        //Tableau de bord du Prestataire
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        // Changement du mot de passe par le Prestataire
        Route::get('/change_password', 'Website\Prestataire\PrestataireController@changePassword')->name('change_password');
        Route::post('/update_password', 'Website\Prestataire\PrestataireController@updatePassword')->name('update_password');
        // Mettre à jour profil du Prestataire
        Route::get('/profile_setting', 'Website\Prestataire\PrestataireController@setting')->name('profile_setting');
        Route::post('/post_setting', 'Website\Prestataire\PrestataireController@postSetting')->name('post_setting');
        // Candidatures à une offre
        Route::resource('applies', 'Website\Prestataire\ApplyController');
        // Demandes d'absence
        Route::resource('demandeabsences', 'Website\Prestataire\DemandePrestataireController');
        // Demande de congés
        Route::resource('demandeconges', 'Website\Prestataire\CongePrestataireController');
        // Postuler à une offre
        Route::get('postuler/{id}/offre', ['as' => 'offer.apply', 'uses' => 'Website\Prestataire\ApplyController@apply']);
       
        // Contrats du Prestataire
        Route::get('/contrat/en-cours', 'Website\Prestataire\PrestataireController@pendingContrat')->name('contrat.pending');
        Route::get('/contrat/archive', 'Website\Prestataire\PrestataireController@archivedContrat')->name('contrat.archived');
        // Demandes de formations par le Prestataire
        Route::resource('demandeformations', 'Website\Prestataire\DemandeFormationController');
        Route::get('/demande/formation/archive', 'Website\Prestataire\DemandeFormationController@archived')->name('demandeformation.archived');
        // Formations
        Route::get('/formation/a-venir', 'Website\Prestataire\PrestataireController@pendingFormation')->name('formation.pending');
        Route::get('/formation/en-cours', 'Website\Prestataire\PrestataireController@pendingFormationBiginning')->name('formation.beginning');
        Route::get('/formation/archive', 'Website\Prestataire\PrestataireController@archivedFormation')->name('formation.archived');
        Route::get('formation/{id}/view', ['as' => 'formation.view', 'uses' => 'Website\Prestataire\PrestataireController@formation_view']);
    });
});

//Routes des Clients
Route::name('client.')->group(function () {

    Route::group(['prefix' => 'client'], function () {
        //Tableau de bord du Client
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        // Changement du mot de passe par le Client
        // Route::get('/change_password', 'Website\Client\ClientController@changePassword')->name('change_password');
        Route::get('/change-password', 'Website\Client\ClientController@changePassword')->name('change_password');
        Route::post('/update_password', 'Website\Client\ClientController@updatePassword')->name('update_password');
        // Mettre à jour profil du Client
        Route::get('/profile_setting', 'Website\Client\ClientController@setting')->name('profile_setting');
        Route::post('/post_setting', 'Website\Client\ClientController@postSetting')->name('post_setting');
        // Offres d'emploi du Client
        Route::resource('offers', 'Website\Client\OfferController');
        // Reservation d'un Pretataire par un Client
        Route::post('/reserver/prestataire/{id}', ['as' => 'take', 'uses' => 'Website\Client\ClientController@take']);
        Route::post('/reservers/prestataires/{id}', ['as' => 'reservations', 'uses' => 'Website\Client\ClientController@reservation']);
        // Confirmation du numéro de téléphone du Client
        Route::get('/confirmer/numero-telephone', 'Website\Client\ClientController@confirmTel')->name('confirm_tel');
        Route::post('post/confirmer/numero-telephone', 'Website\Client\ClientController@postConfirmTel')->name('post_confirm_tel');
        // Contrats du Client
        Route::get('/contrat/en-cours', 'Website\Client\ClientController@pendingContrat')->name('contrat.pending');
        Route::get('/contrat/archive', 'Website\Client\ClientController@archivedContrat')->name('contrat.archived');
        Route::get('/facture/en-cours', 'Website\Client\ClientController@factureContrat')->name('contrat.facture');
        // Route::get('/facture/{id}/printer', 'Website\Client\ClientController@affiche')->name('print');
        // Signaler une absence
        Route::resource('signalerabsences', 'Website\Client\SignalerClientController');
        Route::resource('absences', 'Website\Client\AbsenceController');
        // Route::resource('valider', 'Website\Client\AbsenceController');

    });
});

Route::name('admin.')->group(function () {

    Route::group(['prefix' => 'admin'], function () {
        //Admin Auth
        Route::get('login', 'Admin\AuthController@getLogin')->name('login');
        Route::post('login', 'Admin\AuthController@postLogin');
        Route::get('dashboard', 'Admin\DashboardController@adminHome')->name('dashboard');
        Route::post('logout', 'Admin\AuthController@postLogout')->name('logout');
        //Routes Ressources Admin
        Route::resource('admins', 'Admin\UserController');
        Route::resource('roles', 'Admin\RoleController');
        Route::resource('permissions', 'Admin\PermissionController');
        Route::resource('posts', 'Admin\PostController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::resource('faqs', 'Admin\FaqController');
        Route::resource('faqcategories', 'Admin\FaqCategoryController');
        Route::resource('typecontrats', 'Admin\TypeContratController');
        Route::resource('secteurs', 'Admin\SecteurController');
        Route::resource('regions', 'Admin\RegionController');
        Route::resource('villes', 'Admin\VilleController');
        Route::resource('jobtypes', 'Admin\JobTypeController');
        Route::resource('quotations', 'Admin\QuotationController');
        Route::get('/quotation/archived', 'Admin\QuotationController@archived')->name('quotation.archived');
        Route::resource('reservations', 'Admin\ReservationController');
        Route::get('/reservation/archived', 'Admin\ReservationController@archived')->name('reservation.archived');
        Route::get('/reserver/prestataire/{id}', ['as' => 'take.prestataire', 'uses' => 'Admin\ReservationController@take']);
        Route::resource('prestataires', 'Admin\PrestataireController');
        Route::resource('clients', 'Admin\ClientController');
        Route::resource('offers', 'Admin\OfferController');
        Route::get('/offre/pending', 'Admin\OfferController@pending')->name('offer.pending');
        Route::get('/offre/archived', 'Admin\OfferController@archived')->name('offer.archived');
        Route::get('offer/{id}/treat', ['as' => 'offer.treat', 'uses' => 'Admin\OfferController@treat']);
        Route::patch('offer/{id}/treat', ['as' => 'offer.updatetreat', 'uses' => 'Admin\OfferController@treatUpdate']);
        Route::resource('applies', 'Admin\ApplyController');
        Route::get('/apply/pending', 'Admin\ApplyController@pending')->name('apply.pending');
        Route::get('/apply/archived', 'Admin\ApplyController@archived')->name('apply.archived');
        Route::resource('contrats', 'Admin\ContratController');
        Route::resource('demandeformations', 'Admin\DemandeFormationController');
        Route::get('/demandeformation/archived', 'Admin\DemandeFormationController@archived')->name('demandeformation.archived');
        Route::get('demande/formation/{id}/treat', ['as' => 'demandeformation.treat', 'uses' => 'Admin\DemandeFormationController@treat']);
        Route::patch('demande/formation/{id}/treat', ['as' => 'demandeformation.updatetreat', 'uses' => 'Admin\DemandeFormationController@treatUpdate']);
        Route::get('/contrat/archived', 'Admin\ContratController@archived')->name('contrat.archived');
        Route::resource('typeformations', 'Admin\TypeFormationController');
        Route::resource('formations', 'Admin\FormationController');
        Route::resource('typeabsences', 'Admin\TypeAbsenceController');
        Route::resource('demandeabsences', 'Admin\DemandeAbsenceController');
        Route::get('demande/absence/{id}/updateValidate', ['as' => 'demandeabsences.updateValidate', 'uses' => 'Admin\DemandeAbsenceController@updateValidate']);
        Route::post('demande/absence/{id}/validateStore', ['as' => 'demandeabsences.validateStore', 'uses' => 'Admin\DemandeAbsenceController@validateStore']);
        Route::resource('typeconges', 'Admin\TypeCongeController');
        Route::resource('demandeconges', 'Admin\CongesController');
        Route::get('demande/conge/{id}/updateValidateConge', ['as' => 'demandeconges.updateValidateConge', 'uses' => 'Admin\CongesController@updateValidateConge']);
        Route::post('demande/conge/{id}/validateStoreConge', ['as' => 'demandeconges.validateStoreConge', 'uses' => 'Admin\CongesController@validateStoreConge']);
        Route::resource('historiques', 'Admin\HistoricalController');
        Route::resource('signalerabsences', 'Admin\SignalerController');
        Route::get('signaler/absences/{id}/updateValidateSignaler', ['as' => 'signalerabsences.updateValidateSignaler', 'uses' => 'Admin\SignalerController@updateValidateSignaler']);
        Route::post('signaler/absences/{id}/validateStoreSignaler', ['as' => 'signalerabsences.validateStoreSignaler', 'uses' => 'Admin\SignalerController@validateStoreSignaler']);
        Route::resource('rappels', 'Admin\RappelController');
        Route::resource('offreHistoriques', 'Admin\OffreHistoriqueController');
        Route::get('/rappel/archived', 'Admin\RappelController@archived')->name('rappel.archived');
        //Facture
        Route::resource('factures', 'Admin\FactureController');
        Route::get('offers/prestataire/{id}/treatApply', ['as' => 'offers.treatApply', 'uses' => 'Admin\OfferController@treatApply']);
        Route::post('offers/prestataire/{id}/updateApply', ['as' => 'offers.updateApply', 'uses' => 'Admin\OfferController@updateApply']);
        Route::get('contrat/{id}/pdf', ['as' => 'contrat.pdf', 'uses' => 'Admin\ContratController@pdf']);
        //Number of the post offer days
        Route::get('nombre-jours-offer', 'Admin\PostDateController@index')->name('nbdaypost');
        Route::post('nombre-jours-offer', 'Admin\PostDateController@edit')->name('nombre-jours-offer');
        //Langue
        Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'Admin\LanguageController@switchLang']);
    });
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'Admin\LanguageController@switchLang']);
