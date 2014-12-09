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
                <label>Location <br/>(<?= $_REQUEST['location']; ?>)</label>
                <select name="location">
                    <option value="chalet/es">Etch Soulet</option>
                    <option value="chalet/es1">Etch Soulet 1</option>
                    <option value="chalet/es2">Etch Soulet 2</option>
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
                <input type="text" value="<?= $_REQUEST['date_limite_acompte']; ?>" name="date_limite_acompte"
                       placeholder="Date échéance acompte">
            </p>

            <p>
                <label>Date échéance paiement</label>
                <input type="text" value="<?= $_REQUEST['date_limite_paiement']; ?>" name="date_limite_paiement"
                       placeholder="Date échéance paiement">
            </p>

            <p>
                <label>Montant menage</label>
                <input type="text" value="<?= $_REQUEST['prix_menage']; ?>" name="prix_menage" placeholder="Montant menage">
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
                <label for="specimen">Le contrat est un specimen ?</label>
                <input type="checkbox" value="<?= $_REQUEST['specimen']; ?>" name="specimen" id="specimen"
                       placeholder="Le contrat est un specimen ?">
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