<?php
function fonctionRecherche($mot, $conn){
    $tableresult = [ ];
    $titre = "%".$mot."%";
    $stmt = $conn->prepare("SELECT * FROM films WHERE title LIKE ? ");
    $stmt->bind_param("s", $titre);
    $stmt->execute();
    $result = $stmt->get_result();
    $nbresults = $result->num_rows;
    if ($nbresults > 0){
        foreach ($result as $row){
            $tableresult[] = $row['poster_path'];
        }

    }
    $stmt = $conn->prepare("SELECT * FROM series WHERE title LIKE ? ");
    $stmt->bind_param("s", $titre);
    $stmt->execute();
    $result = $stmt->get_result();
    $nbresults = $result->num_rows;
    if ($nbresults > 0){
        foreach ($result as $row){
            $tableresult[] = $row['poster_path'];
        }

    }

    return $tableresult;
}
?>