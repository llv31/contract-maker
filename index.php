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
                <label>Date arrivée</label>
                <input type="date" value="<?= $_REQUEST['date_arrivee']; ?>" name="date_arrivee"
                       placeholder="Date arrivée">
            </p>

            <p>
                <label>Date départ</label>
                <input type="date" value="<?= $_REQUEST['date_depart']; ?>" name="date_depart"
                       placeholder="Date départ">
            </p>

            <p>
                <label>Date échéance réservation</label>
                <input type="date" value="<?= $_REQUEST['date_limite_reservation']; ?>" name="date_limite_reservation"
                       placeholder="Date échéance réservation">
            </p>

            <p>
                <label>Date échéance acompte</label>
                <input type="date" value="<?= $_REQUEST['date_limite_acompte']; ?>" name="date_limite_acompte"
                       placeholder="Date échéance acompte">
            </p>

            <p>
                <label>Date échéance paiement</label>
                <input type="date" value="<?= $_REQUEST['date_limite_paiement']; ?>" name="date_limite_paiement"
                       placeholder="Date échéance paiement">
            </p>

            <p>
                <label>Date échéance réservation</label>
                <input type="date" value="<?= $_REQUEST['date_limite_reservation']; ?>" name="date_limite_reservation"
                       placeholder="Date échéance réservation">
            </p>

            <p>
                <label>Montant caution</label>
                <input type="text" value="<?= $_REQUEST['caution']; ?>" name="caution" placeholder="Montant caution">
            </p>

            <p>
                <label>Prix en chiffres</label>
                <input type="text" value="<?= $_REQUEST['prix_chiffres']; ?>" name="prix_chiffres" placeholder="Prix en chiffres">
            </p>

            <p>
                <label>Prix en lettres</label>
                <input type="text" value="<?= $_REQUEST['prix_lettres']; ?>" name="prix_lettres" placeholder="Prix en lettres">
            </p>

            <p>
                <label></label>
                <input type="submit" value="Créer un contrat">
            </p>
        </form>
    </main>
</div>
</body>
</html>