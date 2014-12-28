<?php
error_reporting(E_ALL);
define('sample_path', '../sample/');
define('sample_path_chalet', sample_path . 'chalet/');

$data = new stdClass();
/** Dynamique */
$data->specimen = isset($_REQUEST['specimen']) ? true : false;
$data->locataire->civilite = $_REQUEST['civilite'];
$data->locataire->prenom = ucfirst(strtolower($_REQUEST['prenom']));
$data->locataire->nom = strtoupper($_REQUEST['nom']);
$data->locataire->adresse = nl2br($_REQUEST['adresse']);
$data->locataire->telephone = $_REQUEST['telephone'];
$data->locataire->email = $_REQUEST['email'];
$data->locataire->dateDebut = $_REQUEST['date_arrivee'];
$data->locataire->dateFin = $_REQUEST['date_depart'];
$data->locataire->dateLimiteAcompte = $_REQUEST['date_limite_acompte'];
$data->locataire->dateLimitePaiement = $_REQUEST['date_limite_paiement'];
$data->locataire->caution = $_REQUEST['caution'];
$data->locataire->prixChiffre = $_REQUEST['prix_chiffres'];
$data->locataire->prixLettre = $_REQUEST['prix_lettres'];
$data->locataire->prixMenage = $_REQUEST['prix_menage'];
$data->locataire->acompte = round($data->locataire->prixChiffre * 0.3);
$data->locataire->restantDu = $data->locataire->prixChiffre - $data->locataire->acompte;
$data->type->duree = $_REQUEST['duree'];
$data->type->saison = $_REQUEST['saison'];
$data->location->heureFin = ($_REQUEST['duree'] == 'week-end') ? '17:00' : '10:00';
$data->annee = array_shift(array_reverse(explode('/', $data->locataire->dateDebut)));
/** Statique */
$data->location->mention = $_REQUEST['mention'];
switch ($_REQUEST['location']) {
    case 'chalet/es2':
        $data->location->nom = 'Etch Soulet 2';
        $data->location->nomLong = 'Appartement ETCH SOULET 2 dans chalet';
        $data->location->chapeau = 'Capacité d\'accueil maximale de 14 personnes';
        $data->location->code = 'es2';
        $data->location->type = 'simple';
        $data->location->emplacement = 'Appartement ' . $data->location->nom . ' situé au 1er et au 2ème étage du chalet avec une entrée indépendante de plain pied.';
        $data->location->superficie = 180;
        $data->location->nbPieces = 12;
        $data->location->capacite = 14;
        $data->location->balcon = 'Oui';
        $data->location->jardin = 'Jardin privatif pentu';
        $data->location->autre = 'Connexion Wi-Fi Orange<br/>Casier à ski extérieur dans un cabanon';
        break;
    case 'chalet/es1':
        $data->location->nom = 'Etch Soulet 1';
        $data->location->nomLong = 'Appartement ETCH SOULET 1 dans chalet';
        $data->location->chapeau = 'Capacité d\'accueil maximale de 8 personnes';
        $data->location->code = 'es1';
        $data->location->type = 'simple';
        $data->location->emplacement = 'Appartement ' . $data->location->nom . ' situé au rez-de-chaussée du chalet avec une entrée indépendante de plain pied.';
        $data->location->superficie = 100;
        $data->location->nbPieces = 6;
        $data->location->capacite = 8;
        $data->location->balcon = 'Non';
        $data->location->jardin = 'Jardin privatif clôturé avec vue sur montagnes';
        $data->location->autre = 'Connexion Wi-Fi Orange<br/>Casier à ski extérieur dans un cabanon';
        break;
    default:
        $data->location->nom = 'Etch Soulet';
        $data->location->nomLong = 'Appartement ETCH SOULET dans chalet';
        $data->location->chapeau = 'Capacité d\'accueil maximale de 14 et 8 personnes';
        $data->location->code = 'es';
        $data->location->type = 'simple';
        $data->location->emplacement = '';
        $data->location->superficie = 280;
        $data->location->nbPieces = 18;
        $data->location->capacite = 22;
        $data->location->balcon = 'Oui';
        $data->location->jardin = 'Jardin privatif pentu et jardin clôturé';
        $data->location->autre = 'Connexion Wi-Fi Orange<br/>Casier à ski extérieur dans un cabanon';
        break;
}
switch ($_REQUEST['location']) {
    case 'chalet/es1':
    case 'chalet/es2':
        $data->location->detailLocation = file_get_contents(sample_path_chalet . $data->location->code . '-detailLocation.html');
        break;

    default:
        $data->location->detailLocation = file_get_contents(sample_path_chalet . 'es1-detailLocation.html') .
            file_get_contents(sample_path_chalet . 'es2-detailLocation.html');
        break;

}
$data->location->introduction =
    sprintf(file_get_contents(sample_path_chalet . $data->location->type . '-introduction.html'), $data->location->nom) .
    sprintf(file_get_contents(sample_path_chalet . 'introduction.html'), $data->locataire->civilite);
$data->location->descriptionChalet =
    file_get_contents(sample_path_chalet . 'descriptionChalet.html') .
    sprintf(
        file_get_contents(sample_path_chalet . 'descriptionLocation.html'),
        $data->location->emplacement,
        $data->location->superficie,
        $data->location->nbPieces,
        $data->location->capacite,
        $data->location->balcon,
        $data->location->jardin,
        $data->location->autre
    );
$data->infosLegales = sprintf(
    file_get_contents(sample_path_chalet . 'infosLegales.html'),
    $data->locataire->dateDebut,
    $data->locataire->dateFin,
    $data->location->heureFin,
    $data->locataire->prixChiffre,
    $data->locataire->prixLettre,
    $data->locataire->acompte,
    $data->locataire->dateLimiteAcompte,
    $data->locataire->restantDu,
    $data->locataire->dateLimitePaiement,
    $data->locataire->prixMenage,
    $data->locataire->caution,
    $data->locataire->prixMenage
);
$data->signatures = sprintf(
    file_get_contents(sample_path_chalet . 'signature.html'),
    $data->locataire->dateLimiteAcompte,
    $data->locataire->acompte,
    $data->locataire->dateLimiteAcompte,
    $data->locataire->restantDu,
    date('d/m/Y')
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
<div id="container" class="<?= !$data->specimen ?: 'specimen'; ?>">
    <header>
        <span class="illustration"></span>

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
            <?php if ($data->specimen): ?>
                <h3 class="specimen">Envoyé à titre d'information</h3>
            <?php endif; ?>
            <strong>Entre les sousignés</strong>
            <ul id="prestataire" class="list">
                <li>
                    Monsieur et Madame ROY, gérants agissant pour le compte de
                    <strong>S.A.R.L Luchon Location Vacances</strong><br/>
                    <em>(RCS de Toulouse 500 008 636 00010)</em>
                </li>
                <li><label>Adresse</label> <span>28, avenue de Gascogne <br/> 31110 Saint Mamet</span></li>
                <li><label>Mobile</label> <span>06.18.64.14.29 / 06.12.89.31.25</span></li>
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
            <h2>État descriptif de l'habitation</h2>
            <?= $data->location->descriptionChalet; ?>
        </div>

        <hr class="breaker"/>

        <div id="detail_location">
            <h2>Détails de la location</h2>
            <em class="equipement">Toutes nos chambres sont équipées de draps, couettes et oreillers</em>
            <?= $data->location->detailLocation; ?>
        </div>

        <hr class="breaker"/>

        <div id="infos_legales">
            <h2>Observations générales et conditions d'exécution du contrat</h2>
            <?= $data->infosLegales; ?>
        </div>

        <hr class="breaker"/>
        <div id="signatures">
            <h2>Conclusion du contrat</h2>
            <?php if ($data->specimen): ?>
                <h3 class="specimen">Envoyé à titre d'information</h3>
            <?php endif; ?>
            <?= $data->signatures; ?>
        </div>
    </main>
</div>
</body>
</html>