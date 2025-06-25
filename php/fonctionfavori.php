<?php
require 'connectdb.php';
session_start();
function ajoutsfilmsfavoris($id_film, $id_utilisateur, $conn)
{
    $insert_sql = $conn->prepare("INSERT INTO favoris_films (id_film, id_profil) VALUES (?, ?);");
    $insert_sql->bind_param("ii", $id_film,$id_utilisateur);
    $insert_sql->execute();
}
function ajoutsseriesfavoris($id_serie, $id_utilisateur, $conn)
{
    $insert_sql = $conn->prepare("INSERT INTO favoris_series (id_serie, id_profil) VALUES (?, ?);");
    $insert_sql->bind_param("ii", $id_serie,$id_utilisateur);
    $insert_sql->execute();
}
function supprimmefilmsfavoris($id_film, $id_utilisateur, $conn)
{
    $delete_sql = $conn->prepare("DELETE FROM favoris_films WHERE id_film = ? AND id_profil = ?;");
    $delete_sql->bind_param("ii", $id_film,$id_utilisateur);
    $delete_sql->execute();
}
function supprimmeseriesfavoris($id_serie, $id_utilisateur, $conn)
{;
    $delete_sql = $conn->prepare("DELETE FROM favoris_series WHERE id_serie = ? AND id_profil = ?;");
    $delete_sql->bind_param("ii", $id_serie,$id_utilisateur);
    $delete_sql->execute();
}
?>