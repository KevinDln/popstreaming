<?php
require "connectdb.php"; // Connexion a la base de données

/* DOCUMENTATION

// Table profils contenant les informations des profils
// id_compte permettra de reconnaitre a quel compte ce profil est associé
// img contient le chemin d'acces a l'image de profil (ex : "../img/profilpicture.jpeg" sera contenu dans img)

//Table films contenant les informations des films
// poster_path correspond au chemin d'acces pour le poster du film (meme chose que img)
// genre est le genre principal du contenu :  comédie, horreur, action etc..
// nb_vote permettra de calculer la popularité moyenne du film sur le site (ne pas confondre avec popularité presse)
// rating permettra de vérifier si le contenu est adapté a l'utilisateur (1 = adulte et 0 = Tout public)

// casting serie / film correspond a l'ID du contenu où l'acteur est présent, mais ne gardera qu'une seule
// information sur la ligne
// Exemple : acteur présent dans le film ID 125 -> casting_film = 125, casting_serie 0
// Exemple : meme acteur présent dans la série ID 485 -> casting_film = 0, casting_serie = 485

*/


$user="CREATE TABLE IF NOT EXISTS utilisateur (
    id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    type_abo varchar(50) NOT NULL,
    date_creation DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS profils (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    id_compte INT(11) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    img VARCHAR(255) NOT NULL,
    controle_parental INT(1) NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS films (
    id_film INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    genre VARCHAR(255) NOT NULL,
    original_language VARCHAR(4) NOT NULL,
    overview TEXT NOT NULL,
    popularity INT(5) NOT NULL DEFAULT 0,
    release_year YEAR(4) NOT NULL,
    poster_path VARCHAR(255),
    nb_vote INT(255) NOT NULL DEFAULT 0,
    rating INT(1) DEFAULT 0,
    content_duration INT(255)
);


CREATE TABLE IF NOT EXISTS series (
    id_series INT(11) AUTO_INCREMENT PRIMARY KEY,
    genre VARCHAR(255) NOT NULL,
    original_language VARCHAR(4) NOT NULL,
    overview TEXT NOT NULL,
    popularity INT(5) NOT NULL DEFAULT 0,
    release_year YEAR(4) NOT NULL,
    poster_path VARCHAR(255),
    nb_vote INT(255) NOT NULL DEFAULT 0,
    rating INT(1) DEFAULT 0,
    content_duration INT(255)
);

CREATE TABLE IF NOT EXISTS acteurs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    casting_film int(255) DEFAULT 0,
    casting_serie int(255) DEFAULT 0,
    img VARCHAR(255) NOT NULL    
);";


if ($conn->multi_query($user) === TRUE) {
    echo "Tables de la base de données créées avec succès.";
} else {
    echo "Erreur lors de la création des tables : " . $conn->error;
}



?>
