<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $server = "localhost";
    $db = "table2testphp";
    $user = "root";
    $pass = "";

    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.

    $newUser = "
        INSERT INTO table2testphp.utilisateur (id, nom, prenom, rue, numero, code_postal, ville, pays, mail, date_enregistrement) 
        VALUES (NULL, 'Droskall', 'Droskall', 'de la liberte', '272700', '2727', Fort-dragon, Novigrad, 'droskall@dodo.com', NULL)
    ";
    $pdo->exec($newUser);

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $newProduct = "
        INSERT INTO table2testphp.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'pomme', 200, 'un fruit', 'un fruit rouge qui se mange')
    ";
    $pdo->exec($newProduct);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.

    $newUsers = "
        INSERT INTO table2testphp.utilisateur (id, nom, prenom, rue, numero, code_postal, ville, pays, mail, date_enregistrement) 
        VALUES (NULL, 'Dada', 'Dada', 'nxt', '0000', '58789', NewYork, USA, 'dada@gmail.com', NULL),
               (NULL, 'Sarah', 'Conor', 'hopital', '3333', 4566, 'Paris', 'France', NULL)
    ";
    $pdo->exec($newUsers);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.

    $newProducts = "
        INSERT INTO table2testphp.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'table', 7000, 'un meuble', 'un meuble pour manger'),
               (NULL, 'chaise', 8, 'un meuble', 'un meuble pour se reposer le deriere')";
    $pdo->exec($newProducts);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.

    $pdo->beginTransaction();

    $newUser1 = "
        INSERT INTO table2testphp.utilisateur (id, nom, prenom, rue, numero, code_postal, ville, pays, mail, date_enregistrement) 
        VALUES (NULL, 'Link', 'Inconu', 'lilas', 5353, 59600, 'Hyrule', 'Nintendo', 'link@nintendo.com', NULL)
    ";
    $pdo->exec($newUser1);

    $newUser2 = "
        INSERT INTO table2testphp.utilisateur (id, nom, prenom, rue, numero, code_postal, ville, pays, mail, date_enregistrement) 
        VALUES (NULL, 'Zelda', 'Inconu', 'lilas', 5353, 59600, 'Hyrule', 'Nintendo', 'zelda@nintendo.com', NULL)
    ";
    $pdo->exec($newUser2);

    $newUser3 = "
        INSERT INTO table2testphp.utilisateur (id, nom, prenom, rue, numero, code_postal, ville, pays, mail, date_enregistrement) 
        VALUES (NULL, 'Mario', 'Bross', 'chateau', 99953, 552369, 'Super', 'Nintendo', 'mariobroos@nintendo.com', NULL)
    ";
    $pdo->exec($newUser3);

    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();

    $newProduct1 = "
        INSERT INTO table2testphp.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'epee', 450, 'epee', 'eppe pour decapiter les gens')
    ";
    $pdo->exec($newProduct1);

    $newProduct2 = "
        INSERT INTO table2testphp.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'hache', 250, 'hache', 'devenez johny dans Shining')
    ";
    $pdo->exec($newProduct2);

    $newProduct3 = "
        INSERT INTO table2testphp.produit (id, titre, prix, description_courte, descrition_longue) 
        VALUES (NULL, 'dague', 35, 'dague', 'ideal pour assasiner les ennemies')
    ";
    $pdo->exec($newProduct3);

    $pdo->commit();
}

catch (PDOException $e){
    echo $e->getMessage();
    $pdo->rollBack();
}