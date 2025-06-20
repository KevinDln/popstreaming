<?php 
session_start();

header('Content-Type: application/json');

if (isset($_POST['langue'])) {
    $_SESSION['langue'] = $_POST['langue'];
    
    echo json_encode([
        'status' => 'success',
        'langue' => $_POST['langue'],
        'message' => 'Langue mise à jour'
    ]);
} 
;
?>