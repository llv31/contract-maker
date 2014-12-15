<?php
$echeancePaiement = '';
if (isset($_REQUEST['date_arrivee'])) {
    $arrivee = DateTime::createFromFormat('d/m/Y', $_REQUEST['date_arrivee']);
    $paiementInterval = new DateInterval('P1M');
    $paiementInterval->invert = 1;
    $paiement = $arrivee->add($paiementInterval);
    $echeancePaiement = $paiement->format('d/m/Y');
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./media/style.css"/>
</head>
<body>
<div id="container">
<header>
    <h1>Contracts maker</h1>
</header>
<main>
<form action="/data/chalet.php">
    <fieldset>
        <legend>LOCATION DU CHALET</legend>
        <p>
            <label>Location <br/>(<?= $_REQUEST['location']; ?>)</label>
            <select name="location">
                <option value="chalet/es">Etch Soulet</option>
                <option value="chalet/es1">Etch Soulet 1</option>
                <option value="chalet/es2">Etch Soulet 2</option>
            </select>
        </p>
        <p>
            <label>Civilite</label>
            <select name="civilite">
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
        </p>

        <p>
            <label>Nom</label>
            <input type="text" value="<?= $_REQUEST['nom']; ?>" name="nom" placeholder="Nom">
        </p>

        <p>
            <label>Prenom</label>
            <input type="text" value="<?= $_REQUEST['prenom']; ?>" name="prenom" placeholder="Prenom">
        </p>

        <p>
            <label>Email</label>
            <input type="text" value="<?= $_REQUEST['email']; ?>" name="email" placeholder="Email">
        </p>

        <p>
            <label>Téléphone</label>
            <input type="text" value="<?= $_REQUEST['telephone']; ?>" name="telephone" placeholder="Téléphone">
        </p>

        <p>
            <label>Adresse</label>
            <textarea name="adresse"><?= $_REQUEST['adresse']; ?></textarea>
        </p>

        <p>
            <label>Date arrivée</label>
            <input type="text" value="<?= $_REQUEST['date_arrivee']; ?>" name="date_arrivee"
                   placeholder="Date arrivée">
        </p>

        <p>
            <label>Date départ</label>
            <input type="text" value="<?= $_REQUEST['date_depart']; ?>" name="date_depart"
                   placeholder="Date départ">
        </p>

        <p>
            <label>Saison</label>
            <select name="saison">
                <option value="Hiver">Hiver</option>
                <option value="Été">Été</option>
                <option value="Printemps">Printemps</option>
                <option value="Automne">Automne</option>
                <option value="Noël">Noël</option>
            </select>
        </p>

        <p>
            <label>Durée</label>
            <select name="duree">
                <option value="semaine">semaine</option>
                <option value="week-end">week-end</option>
                <option value="mid-week">mid-week</option>
            </select>
        </p>

        <p>
            <label>Date échéance acompte</label>
            <input type="text" value="<?= date('d/m/Y', (time() + 60 * 60 * 24 * 5)); ?>" name="date_limite_acompte"
                   placeholder="Date échéance acompte">
        </p>

        <p>
            <label>Date échéance paiement</label>
            <input type="text" value="<?= $echeancePaiement; ?>" name="date_limite_paiement"
                   placeholder="Date échéance paiement">
        </p>

        <p>
            <label>Montant menage</label>
            <input type="text" value="<?= $_REQUEST['prix_menage']; ?>" name="prix_menage"
                   placeholder="Montant menage">
        </p>

        <p>
            <label>Montant caution</label>
            <input type="text" value="<?= $_REQUEST['caution']; ?>" name="caution"
                   placeholder="Montant caution">
        </p>

        <p>
            <label>Prix en chiffres</label>
            <input type="text" value="<?= $_REQUEST['prix_chiffres']; ?>" name="prix_chiffres"
                   placeholder="Prix en chiffres">
        </p>

        <p>
            <label>Prix en lettres</label>
            <input type="text" value="<?= $_REQUEST['prix_lettres']; ?>" name="prix_lettres"
                   placeholder="Prix en lettres">
        </p>

        <p>
            <label for="specimen">Le contrat est un specimen ?</label>
            <input type="checkbox" value="<?= $_REQUEST['specimen']; ?>" name="specimen" id="specimen"
                   placeholder="Le contrat est un specimen ?">
        </p>

        <p>
            <label>Montant acompte</label>
            <input type="text" value="<?= $_REQUEST['montant_acompte']; ?>" name="montant_acompte"
                   placeholder="Montant acompte (laisser vide pour 30%)">
        </p>

        <p>
            <label></label>
            <input type="submit" value="Créer un contrat">
        </p>
    </fieldset>
</form>



















<form action="/data/chambre.php">

    <fieldset>
        <legend>LOCATION DES CHAMBRES D'HÔTES</legend>
        <p>
            <label>Location <br/>(<?= $_REQUEST['location']; ?>)</label>
            <select name="location">
                <option value="chambre/ch-p">Peyresourde</option>
                <option value="chambre/ch-e">Estive</option>
                <option value="chambre/ch-v">Vénasque</option>
            </select>
        </p>
        <p>
            <label>Civilite</label>
            <select name="civilite">
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
        </p>

        <p>
            <label>Nom</label>
            <input type="text" value="<?= $_REQUEST['nom']; ?>" name="nom" placeholder="Nom">
        </p>

        <p>
            <label>Prenom</label>
            <input type="text" value="<?= $_REQUEST['prenom']; ?>" name="prenom" placeholder="Prenom">
        </p>

        <p>
            <label>Email</label>
            <input type="text" value="<?= $_REQUEST['email']; ?>" name="email" placeholder="Email">
        </p>

        <p>
            <label>Téléphone</label>
            <input type="text" value="<?= $_REQUEST['telephone']; ?>" name="telephone" placeholder="Téléphone">
        </p>

        <p>
            <label>Adresse</label>
            <textarea name="adresse"><?= $_REQUEST['adresse']; ?></textarea>
        </p>

        <p>
            <label>Date arrivée</label>
            <input type="text" value="<?= $_REQUEST['date_arrivee']; ?>" name="date_arrivee"
                   placeholder="Date arrivée">
        </p>

        <p>
            <label>Date départ</label>
            <input type="text" value="<?= $_REQUEST['date_depart']; ?>" name="date_depart"
                   placeholder="Date départ">
        </p>

        <p>
            <label>Date échéance acompte</label>
            <input type="text" value="<?= date('d/m/Y', (time() + 60 * 60 * 24 * 5)); ?>" name="date_limite_acompte"
                   placeholder="Date échéance acompte">
        </p>

        <p>
            <label>Date échéance paiement</label>
            <input type="text" value="<?= $echeancePaiement; ?>" name="date_limite_paiement"
                   placeholder="Date échéance paiement">
        </p>

        <p>
            <label>
                Nombre de personnes<br/>
                (adultes : <?= $_REQUEST['nbAdultes']; ?>, enfants : <?= $_REQUEST['nbEnfants']; ?>)
            </label>
            <input type="text" value="<?= $_REQUEST['nbTotal']; ?>" name="nb_personnes"
                   placeholder="Nombre de personnes">
        </p>

        <p>
            <label>Nombre nuités</label>
            <input type="text" value="<?= $_REQUEST['nb_nuit']; ?>" name="nb_nuit"
                   placeholder="Nombre nuités">
        </p>

        <p>
            <label>Prix nuité en chiffres</label>
            <input type="text" value="<?= $_REQUEST['prix_nuite']; ?>" name="prix_nuite"
                   placeholder="Prix nuité en chiffres">
        </p>

        <p>
            <label>Montant remise forfaitaire</label>
            <input type="text" value="<?= isset($_REQUEST['montant_remise']) ? $_REQUEST['montant_remise'] : 4; ?>"
                   name="montant_remise"
                   placeholder="montant remise forfaitaire">
        </p>

        <p>
            <label>Prix en total en chiffres</label>
            <input type="text" value="<?= $_REQUEST['prix_chiffres']; ?>" name="prix_chiffres"
                   placeholder="Prix en chiffres">
        </p>

        <p>
            <label>Montant acompte</label>
            <input type="text" value="<?= $_REQUEST['montant_acompte']; ?>" name="montant_acompte"
                   placeholder="Montant acompte (laisser vide pour 30%)">
        </p>

        <p>
            <label>Prix en lettres</label>
            <input type="text" value="<?= $_REQUEST['prix_lettres']; ?>" name="prix_lettres"
                   placeholder="Prix en lettres">
        </p>

        <p>
            <label for="specimen">Le contrat est un specimen ?</label>
            <input type="checkbox" value="<?= $_REQUEST['specimen']; ?>" name="specimen" id="specimen"
                   placeholder="Le contrat est un specimen ?">
        </p>

        <p>
            <label></label>
            <input type="submit" value="Créer un contrat">
        </p>
    </fieldset>
</form>
</main>
</div>
</body>
</html>