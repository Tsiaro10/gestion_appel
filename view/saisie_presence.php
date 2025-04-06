<?php
// Vérifiez si l'identifiant du cours est passé dans l'URL
if (isset($_GET['id_cours'])) {
    // Récupérez l'identifiant du cours depuis l'URL
    $id_cours = $_GET['id_cours'];

    // Ici, vous pouvez effectuer des opérations supplémentaires, telles que la récupération des données du cours à partir de la base de données

    // Affichez les informations du cours
    echo "<h1>Saisie de la présence pour le cours avec l'ID : $id_cours</h1>";

    // Affichez le formulaire de saisie de présence ici
    echo "<form action=\"traitement_saisie_presence.php\" method=\"POST\">";
    // Ajoutez des champs pour saisir la présence
    echo "<input type=\"hidden\" name=\"id_cours\" value=\"$id_cours\">";
    echo "<input type=\"submit\" value=\"Enregistrer la présence\">";
    echo "</form>";
} else {
    // Si l'identifiant du cours n'est pas passé dans l'URL, affichez un message d'erreur
    echo "<h1>Erreur : Identifiant du cours manquant dans l'URL</h1>";
}
?>
