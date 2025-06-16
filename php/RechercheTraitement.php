<?php
require "connectdb.php";
require "fonctionrecherche.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $result = fonctionRecherche($_POST['film'], $conn);
}

?>