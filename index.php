<?php

/**
 * Créez via PhpMyAdmin une nouvelle base de données table_test_phpmyadmin
 * Toujours via PhpMyAdmin, créez dans cette base de données deux nouvelles tables   utilisateur  ET   produit
 *
 * La table "utilisateur" doit contenir les champs suivants :
 *   - id           --> non signé et auto incrémenté
 *   - nom          --> non null, taille 50
 *   - prenom       --> non null, taille 50
 *   - email        --> non null, taille 100 et unique
 *   - password     --> non null, taille 100
 *   - adresse      --> non null, taille 255 ( équivaut au maximum )
 *   - code postal  --> non null... a vous de choisir le reste.
 *   - pays         --> non null, taille selon votre choix
 *   - date_join    --> .... no comment :-) et par défaut la date du jour.
 *
 * La table "produit" doit contenir les champs suivants :
 *   - id                  --> a vous de choisir
 *   - titre               --> a vous de choisir
 *   - prix                --> ... un prix doit pouvoir contenir des centimes, p.ex: 3,45 ( dans le cadre d'un prix en base de données on se moque de la devise )
 *   - description_courte  --> ... 255 caractères maximum, trouvez le meilleur type.
 *   - description_longue  --> ... plus de 255 caractères, trouvez le bon type.
 *
 * Bien qu'un gros indice soit donné à chaque fois, utilisez le type le plus approprié selon vous !
 *
 * Envoyez moi une capture d'écran des deux tables via Discord.
 */

// FIXME => Aucun code pour cette partie de l'exo, tout se passe sur PhpMyAdmin.




/**
 * Créez via PhpMyAdmin une nouvelle base de données table_test_php
 * Créez dans cette base de données deux nouvelles tables   utilisateur  ET   produit VIA PHP, en passant par une requête.
 *
 * La table "utilisateur" doit contenir les champs suivants :
 *   - id
 *   - nom
 *   - prenom
 *   - email
 *   - password
 *   - adresse
 *   - code postal
 *   - pays
 *   - date_join
 *
 * La table "produit" doit contenir les champs suivants :
 *   - id
 *   - titre
 *   - prix
 *   - description_courte
 *   - description_longue
 *
 * Si vous estimez avoir fais le bon choix des types dans l'exo 1, alors vous pouvez les réutiliser.
 *
 * Gardez ce code en local et envoyez moi le lien de votre repo Github pour que je puisse vérifier votre requête...
 */

// TODO Votre code ici.

try {
    $server = 'localhost';
    $db = 'table_test_php';
    $user = 'root';
    $pass = '';
    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Pour créer une table dans une base de données.
    $request = "CREATE TABLE utilisateur (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(30) NOT NULL,
            prenom VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            pass VARCHAR(255) NOT NULL,
            adresse VARCHAR(70) NOT NULL,
            code_postal SMALLINT NOT NULL,
            pays VARCHAR(150) NOT NULL,
            date_join DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            UNIQUE(email)
        )";

    $bdd->exec($request);

    //Pour créer une table dans une base de données.
    $request = "CREATE TABLE produit (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(100) NOT NULL,
        prix DOUBLE NOT NULL,
        description_courte VARCHAR(255) NOT NULL,
        description_longue TEXT NOT NULL
    )";

    $bdd->exec($request);

    echo "La requête c'est bien déroulé.";
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}