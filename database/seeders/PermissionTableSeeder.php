<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Lister contrats',
            'Creer contrat',
            'Modifier contrat',
            'Voir contrat',
            'Supprimer contrat',
            'Lister reservations',
            'Creer reservation',
            'Modifier reservation',
            'Voir reservation',
            'Supprimer reservation',
            'Lister requetes',
            'Creer requete',
            'Modifier requete',
            'Voir requete',
            'Supprimer requete',
            'Lister offres',
            'Creer offre',
            'Modifier offre',
            'Voir offre',
            'Supprimer requete',
            'Lister candidatures',
            'Voir candidature',
            'Supprimer candidature',
            'Lister clients',
            'Creer client',
            'Modifier client',
            'Voir client',
            'Supprimer client',
            'Lister prestataires',
            'Creer prestataire',
            'Modifier prestataire',
            'Voir prestataire',
            'Supprimer prestataire',
            'Lister secteurs',
            'Creer secteur',
            'Modifier secteur',
            'Voir secteur',
            'Supprimer secteur',
            'Lister demandes formations',
            'Voir demande formation',
            'Supprimer demande formation',
            'Lister categories FAQ',
            'Creer categorie FAQ',
            'Modifier categorie FAQ',
            'Voir categorie FAQ',
            'Supprimer categorie FAQ',
            'Lister FAQs',
            'Creer FAQ',
            'Modifier FAQ',
            'Voir FAQ',
            'Supprimer FAQ',
            'Lister categories',
            'Creer categorie',
            'Modifier categorie',
            'Voir categorie',
            'Supprimer categorie',
            'Lister posts',
            'Creer post',
            'Modifier post',
            'Voir post',
            'Supprimer post',
            'Lister formations',
            'Creer formation',
            'Modifier formation',
            'Voir formation',
            'Supprimer formation',
            'Lister types formations',
            'Creer type formation',
            'Modifier type formation',
            'Voir type formation',
            'Supprimer type formation',
            'Lister types contrats',
            'Creer type contrat',
            'Modifier type contrat',
            'Voir type contrat',
            'Supprimer type contrat',
            'Lister types emplois',
            'Creer type emploi',
            'Modifier type emploi',
            'Voir type emploi',
            'Supprimer type emploi',
            'Lister types requetes',
            'Creer type requete',
            'Modifier type requete',
            'Voir type requete',
            'Supprimer type requete',
            'Lister villes',
            'Creer ville',
            'Modifier ville',
            'Voir ville',
            'Supprimer ville',
            'Lister regions',
            'Creer region',
            'Modifier region',
            'Voir region',
            'Supprimer region',
            'Lister types absence',
            'Creer types absence',
            'Modifier types absence',
            'Lister types absence',
            'Lister demande absence',
            'Valider demande absence',
            'Supprimer demande absence',
            'Lister types conge',
            'Creer types conge',
            'Modifier types conge',
            'Supprimer types conge',
            'Valider demande conge',
            'Supprimer demande conge',
            'Paiement',
        ];

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}