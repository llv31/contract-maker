<?php
error_reporting(E_ALL);
define('sample_path', '../sample/');
define('sample_path_chalet', sample_path . 'chalet/');

$data = new stdClass();
/** Dynamique */
$data->locataire->civilite = $_REQUEST['civilite'];
$data->locataire->prenom = ucfirst(strtolower($_REQUEST['prenom']));
$data->locataire->nom = strtoupper($_REQUEST['nom']);
$data->locataire->adresse = nl2br($_REQUEST['adresse']);
$data->locataire->telephone = $_REQUEST['telephone'];
$data->locataire->email = $_REQUEST['email'];
$data->locataire->dateDebut = $_REQUEST['date_arrivee'];
$data->locataire->dateFin = $_REQUEST['date_depart'];
$data->locataire->dateLimiteReservation = $_REQUEST['date_limite_reservation'];
$data->locataire->dateLimiteAcompte = $_REQUEST['date_limite_acompte'];
$data->locataire->dateLimitePaiement = $_REQUEST['date_limite_paiement'];
$data->locataire->caution = $_REQUEST['caution'];
$data->locataire->prixChiffre = $_REQUEST['prix_chiffres'];
$data->locataire->prixLettre = $_REQUEST['prix_lettres'];
$data->locataire->acompte = round($data->locataire->prixChiffre * 0.3);
$data->locataire->restantDu = $data->locataire->prixChiffre - $data->locataire->acompte;
/** Almost Dynamique */
$data->type->duree = $_REQUEST['duree'];;
$data->type->saison = $_REQUEST['saison'];;
$data->annee = array_shift(array_reverse(explode('/', $data->locataire->dateDebut)));
/** Statique */
$data->location->nom = 'Etch Soulet 2';
$data->location->nomLong = 'Appartement ETCH SOULET 2 dans chalet';
$data->location->chapeau = 'Capacité d\'accueil maximale de 14 personnes';
$data->location->code = 'es2';
$data->location->type = 'simple';
$data->location->emplacement = 'Appartement ' . $data->location->nom . ' situé au 1er et 2ème étages du chalet avec une entrée indépendante de plain pied.';
$data->location->superficie = 180;
$data->location->nbPieces = 12;
$data->location->capacite = 14;
$data->location->balcon = 'Oui';
$data->location->jardin = 'Jardin privatif pentu';
$data->location->autre = 'Casier à ski extérieur dans un cabanon;<br/>Connexion Wi-Fi Orange';
/** Contenu */
$data->location->introduction =
    sprintf(file_get_contents(sample_path_chalet . $data->location->type . '-introduction.html'), $data->location->nom) .
    sprintf(file_get_contents(sample_path . 'introduction.html'), $data->locataire->civilite);
$data->location->descriptionChalet = file_get_contents(sample_path_chalet . 'descriptionChalet.html') . sprintf(
        file_get_contents(sample_path_chalet . $data->location->code . '-descriptionChalet.html'),
        $data->location->emplacement,
        $data->location->superficie,
        $data->location->nbPieces,
        $data->location->capacite,
        $data->location->balcon,
        $data->location->jardin,
        $data->location->autre
    );
$data->location->detailLocation = file_get_contents(sample_path_chalet . $data->location->code . '-detailLocation.html');
/**
 * DateDebut
 * DateFin
 * Prix chiffre
 * Prix lettre
 * Acompte
 * Limite versement accompte
 * Restant dû
 * Date limite du paiement
 * Montant Caution
 * Date validation réservation
 * Acompte
 * Limite versement accompte
 * Restant dû
 */
$data->infosLegalesContent = file_get_contents(sample_path_chalet . 'infosLegales.html');
$data->infosLegales = sprintf(
    $data->infosLegalesContent,
    $data->locataire->dateDebut,
    $data->locataire->dateFin,
    $data->locataire->prixChiffre,
    $data->locataire->prixLettre,
    $data->locataire->acompte,
    $data->locataire->dateLimiteAcompte,
    $data->locataire->restantDu,
    $data->locataire->dateLimitePaiement,
    $data->locataire->caution,
    $data->locataire->dateLimiteReservation,
    $data->locataire->acompte,
    $data->locataire->dateLimiteAcompte,
    $data->locataire->restantDu
);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../media/style.css"/>
</head>
<body>
<div id="container">
    <header>
        <h1>Contrat de Location Saisonnière – <?= $data->type->duree; ?> <?= $data->annee; ?></h1>

        <h2><?= $data->location->nomLong; ?></h2>
        <em><?= $data->location->chapeau; ?></em>
    </header>
    <main>
        <div id="introduction">
            <p><?= $data->locataire->civilite; ?>,</p>
            <?= $data->location->introduction; ?>
            <p class="signature">Frédérique &amp; François ROY</p>
        </div>
        <!---->
        <!---->
        <!---->
        <!---->
        <div id="parties">
            <h3>Envoyé à titre d'information</h3>
            <strong>Entre les sousignés</strong>
            <ul id="prestataire" class="list">
                <li>
                    Monsieur et Madame ROY, gérants agissant pour le compte de <strong>S.A.R.L Luchon Location
                        Vacances</strong>
                    <br/>(RCS de Toulouse 50000863600010)
                </li>
                <li><label>Adresse</label> <span>28, avenue de Gascogne <br/> 31110 Saint Mamet</span></li>
                <li><label>Mobile</label> <span>06.18.64.29 / 06.12.89.31.25</span></li>
                <li><label>E-mail</label> <span>contact@gite-luchon.com</span></li>
                <li class="denomination">Ci-après nommé <strong>LE PROPRIÉTAIRE</strong></li>
            </ul>
            <strong>Et</strong>
            <ul id="locataire" class="list">
                <li><?= $data->locataire->civilite; ?> <?= $data->locataire->prenom; ?> <?= $data->locataire->nom; ?></li>
                <li><label>Adresse</label> <span><?= $data->locataire->adresse; ?></span></li>
                <li><label>Téléphone</label> <span><?= $data->locataire->telephone; ?></span></li>
                <li><label>E-mail</label> <span><?= $data->locataire->email; ?></span></li>
                <li class="denomination">Ci-après nommé <strong>LE LOCATAIRE</strong></li>
            </ul>
        </div>

        <hr class="breaker"/>

        <div id="description_chalet">
            <h2>État descriptif de la location</h2>
            <?= $data->location->descriptionChalet; ?>
        </div>

        <hr class="breaker"/>

        <div id="detail_location">
            <h2>Détails de la location</h2>
            <?= $data->location->detailLocation; ?>
        </div>

        <hr class="breaker"/>

        <div id="infos_legales">
            <h2>Observations générales et conditions d'exécution du contrat</h2>
            <?= $data->infosLegales; ?>
        </div>
    </main>
</div>
</body>
</html>