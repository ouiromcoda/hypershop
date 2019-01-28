<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['version/francaise'] = 'home/langue';
$route['version/english'] = 'home/langue';

$route['utilisateur/s-inscrire'] = "home/inscription";
$route['utilisateur/se-connecter'] = "home/connexion";


$route['qui-sommes-nous'] = "home/africanvillage";
$route['african-village/notre-vision'] = "home/vision";
$route['african-village/nos-offres'] = "home/offre";
$route['african-village/l-organisation-du-village'] = "home/organisation";
$route['african-village/notre-equipe'] = "home/equipe";
$route['african-village/notre-programme-pour-2018'] = "home/programme";
$route['african-village/notre-contact'] = "home/contact";
$route['notre-web-tv'] = "home/web_tv";
$route['galerie/details/(:any)'] = "home/details_galerie/$1";

$route['galerie/photo'] = "home/galerie_photo";
$route['galerie/video'] = "home/galerie_video";
$route['galerie'] = "home/galerie";
$route['nos-packs'] = "home/packs";
$route['notre-store'] = "home/store";


$route['utilisateur/register'] = "home/step1";
$route['russie-2018'] = "home/russie";

$route['utilisateur/espace-personnel'] = "home/espace_perso";
$route['utilisateur/se-deconnecter'] = "home/se_deconnecter";
$route['utilisateur/mettre-a-jour'] = "home/step2";
$route['utilisateur/changer-mot-de-passe'] = "home/changer_pwd";
$route['utilisateur/mot-de-passe-oublie'] = "home/mot_passe_oublie";




//product
$route['produit/details/(:any)'] = "panier/home/details_produit/$1";
$route['categorie/produit/(:any)'] = "panier/home/details_categorie/$1";

$route['panier/voir-mes-commandes'] = "panier/order/vcommande";
$route['panier/paiement-effectue'] = "panier/order/paiement_effectue";
$route['panier/proceder-au-paiement'] = "panier/order/payer";
$route['panier/imprimer-mon-recu/(:any)'] = "panier/order/print_recu/$1";
$route['panier/retour-paiement'] = "panier/home/redi_payement_gateway";

$route['panier/retour'] = "panier/home/retour";
$route['panier/annule'] = "panier/home/annule";
$route['panier/notify'] = "panier/home/notify";



 

/* End of file routes.php */
/* Location: ./application/config/routes.php */