<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../model/appel.php");

    // Récupérer les données du formulaire
    $id_etudiant = $_POST["id_etudiant"];
    $id_cours = $_POST["id_cours"];
    $date_appel = $_POST["date_appel"];
    $etat_presence = $_POST["etat_presence"];
    $id_professeur= $_POST["id_professeur"]; // Récupérer la valeur du bouton radio

    // Créer une instance de la classe Appel
    $appel = new Appel();

    // Configurer les propriétés de l'objet Appel
    $appel->setIdEtudiant($id_etudiant);
    $appel->setIdCours($id_cours);
    $appel->setDateAppel($date_appel);
    $appel->setEtatPresence($etat_presence);
    $appel->setIdprofesseur($id_professeur);

    // Appeler la méthode pour enregistrer l'appel
    $appel->create();

    // Redirection ou affichage de confirmation
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}
?>
