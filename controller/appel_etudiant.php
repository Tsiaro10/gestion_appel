<?php
session_start();

require_once("../model/etudiant.php");
require_once("../model/appel.php");

if(isset($_SESSION["id_professeur"])) {
    
    $id_professeur = $_SESSION["id_professeur"];
    $id_cours = $_POST["id_cours"];
    $date_cours = $_POST['date_cours'];
    $date = date("Y-m-d");

    if(isset($_POST["enregistrer"])){
       
        if ($_POST['date_cours'] != $date) {
            echo "le presence fait pendant le jour du cours";
            exit;
        }

        
        $missing_data = false;
        foreach($_POST as $key => $value) {
            
            if(strpos($key, "etat_presence_") !== false) {
                
                $id_etudiant = substr($key, strlen("etat_presence_"));
                
                if(isset($_POST["etat_presence_" . $id_etudiant])) {
                    
                    $etat_presence = $_POST["etat_presence_" . $id_etudiant];
                  
                   
                    $appel = new Appel();
                    $appel->setIdEtudiant($id_etudiant);
                    $appel->setIdCours($id_cours);
                    $appel->setDateAppel($date);
                    $appel->setEtatPresence($etat_presence);
                    $appel->setIdprofesseur($id_professeur);

                    $appel->create();

                }
                 else {
                    
                    $missing_data = true;
                }
            }
        }
       
        if($missing_data) {
            echo "Erreur : Données manquantes.";
        } else {

            header("location: ../view/liste_cours_prof.php");
            exit; 
        }
    }
} else {
    header("Location: inscription.php");
    exit; 
}

?>
