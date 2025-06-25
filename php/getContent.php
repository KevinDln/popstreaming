<?php

session_start();
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

$genre = $_GET['genre'] ?? null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$depart = ($page - 1) * $limit;

if (!$genre || !isset($_SESSION['content'][$genre])) {
    http_response_code(400);
    echo json_encode(['error' => 'Genre invalide']);
    exit;
}

$films = $_SESSION['content'][$genre];
$filmsPage = array_slice($films, $depart, $limit);

header('Content-Type: application/json');
echo json_encode($filmsPage);
?>