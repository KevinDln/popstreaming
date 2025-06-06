<?php
include "connectdb.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {

    $titre = $_POST['film'];
    $stmt = $conn->prepare("SELECT * FROM films WHERE title LIKE ? ");
    $stmt->bind_param("s", "%".$titre."%");
    $stmt->execute();
    $result = $stmt->get_result();
    $nbresults = $result->num_rows;
    if ($nbresults > 0){

    }
}
?>