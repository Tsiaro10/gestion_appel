<?php
if(isset($_POST["enregistrer"])) {
    if(!empty($_POST["nom_cours"]) && !empty($_POST["date_cours"]) && !empty($_POST["heure_debut"]) && !empty($_POST["heure_fin"]) && !empty($_POST["id_professeur"])) {
        
        extract($_POST);
        require_once("../model/cours.php");
        $cours = new Cours();
        $cours->setNom_cours($nom_cours);
        $cours->setDate_cours($date_cours);
        $cours->setHeure_debut($heure_debut);
        $cours->setHeure_fin($heure_fin);
        $cours->setId_professeur($id_professeur);

        $cours->create();

        echo "Le cours a été enregistré avec succès.";
    } else {

        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
