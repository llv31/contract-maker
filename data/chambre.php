<?php
error_reporting(E_ALL);
define('sample_path', '../sample/');
define('sample_path_chambre', sample_path . 'chambre/');

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
$data->locataire->nbPersonnes = $_REQUEST['nb_personnes'];
$data->locataire->nbNuits = $_REQUEST['nb_nuit'];
$data->locataire->prixNuiteChiffre = $_REQUEST['prix_nuite'];
$data->locataire->prixChiffre = $_REQUEST['prix_chiffres'];
$data->locataire->prixLettre = $_REQUEST['prix_lettres'];
$data->locataire->montantRemise = $_REQUEST['montant_remise'];
if (isset($_REQUEST['montant_acompte']) && floatval($_REQUEST['montant_acompte']) > 0 && strlen($_REQUEST['montant_acompte']) > 0) {
    $data->locataire->acompte = floatval($_REQUEST['montant_acompte']);
} else {
    $data->locataire->acompte = round($data->locataire->prixChiffre * 0.3);
}
$data->locataire->restantDu = $data->locataire->prixChiffre - $data->locataire->acompte;
$data->annee = array_shift(array_reverse(explode('/', $data->locataire->dateDebut)));
/** Statique */
$data->location->mention = $_REQUEST['mention'];
$data->location->code = array_shift(array_reverse(explode('/', $_REQUEST['location'])));
switch ($_REQUEST['location']) {
    case 'chambre/ch-e':
        $data->location->nom = 'Suite l\'Estive';
        $data->location->emplacement = 'Appartement indépendant situé au 2ème étage de notre maison.';
        $data->location->superficie = 41;
        $data->location->nbPieces = 3;
        $data->location->capaciteMaximale = 4;
        $data->location->balcon = 'Oui, vue sur les montagnes et le jardin';
        $data->location->cuisine = 'Non';
        break;
    case 'chambre/ch-v':
        $data->location->nom = 'Suite le Venasque';
        $data->location->emplacement = 'Appartement indépendant situé au 1er étage de notre maison.';
        $data->location->superficie = 35;
        $data->location->nbPieces = 3;
        $data->location->capaciteMaximale = 3;
        $data->location->balcon = 'Oui, vue sur les montagnes';
        $data->location->cuisine = 'Oui';
        break;
    case 'chambre/ch-p':
        $data->location->nom = 'Suite Familiale Peyresourde';
        $data->location->emplacement = 'Appartement indépendant situé au 2ème étage de notre maison.';
        $data->location->superficie = 39;
        $data->location->nbPieces = 4;
        $data->location->capaciteMaximale = 4;
        $data->location->balcon = 'Non';
        $data->location->cuisine = 'Oui';
        break;
}
$data->sousignes =
    sprintf(
        file_get_contents(sample_path_chalet . 'sousignes.html'),
        $data->locataire->civilite,
        $data->locataire->prenom,
        $data->locataire->nom,
        $data->locataire->adresse,
        $data->locataire->telephone,
        $data->locataire->email
    );
$data->location->detailLocation = file_get_contents(sample_path_chambre . $data->location->code . '-detailLocation.html');
$data->location->introduction = sprintf(
    file_get_contents(sample_path_chambre . 'introduction.html'),
    $data->location->nom,
    $data->locataire->civilite
);
$data->location->descriptionChambre =
    file_get_contents(sample_path_chambre . 'descriptionMaison.html') .
    sprintf(
        file_get_contents(sample_path_chambre . 'descriptionLocation.html'),
        $data->location->emplacement,
        $data->location->superficie,
        $data->location->nbPieces,
        $data->locataire->nbPersonnes,
        $data->location->mention
    );
$data->infosLegales = sprintf(
    file_get_contents(sample_path_chambre . 'infosLegales.html'),
    $data->locataire->dateLimiteAcompte,
    $data->locataire->acompte,
    $data->locataire->restantDu
);
$data->tarification = sprintf(
    file_get_contents(sample_path_chambre . 'tarifLocation.html'),
    $data->locataire->dateDebut,
    $data->locataire->dateFin,
    round($data->locataire->prixChiffre / $data->locataire->nbNuits),
    $data->locataire->nbPersonnes,
    round($data->locataire->prixChiffre / $data->locataire->nbNuits),
    $data->locataire->nbNuits,
    $data->locataire->prixChiffre,
    $data->locataire->prixLettre,
    $data->locataire->acompte,
    $data->locataire->dateLimiteAcompte,
    $data->locataire->restantDu
);
$data->signatures = sprintf(
    file_get_contents(sample_path_chambre . 'signature.html'),
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
<div id="container" class="<?= !$data->specimen ?: 'specimen'; ?> chambre">
    <header>
        <span class="illustration"></span>

        <h1>Contrat de Location 'Au delà du temps' - <?= $data->annee; ?></h1>

        <h2><?= $data->location->nom; ?></h2>
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
            <?= $data->sousignes ?>
        </div>

        <hr class="breaker"/>

        <div id="description_chambre">
            <h2>État descriptif de l'habitation</h2>
            <?= $data->location->descriptionChambre; ?>
        </div>


        <div id="detail_location">
            <?= $data->location->detailLocation; ?>
        </div>

        <hr class="breaker"/>

        <div id="tarification">
            <h2>Période et tarification</h2>
            <?= $data->tarification; ?>
        </div>

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