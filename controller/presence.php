<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["presence"]) && isset($_POST["id_cours"])) {
   
    $id_cours = $_POST["id_cours"];
    header("Location: ../view/liste_etudiant.php?id_cours=$id_cours");
    exit;

} 
else {
    echo "erreur";
    exit;
}
?>
