<?php
if(isset($_POST["enregistrer"])){

         if(!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"]) and !empty($_POST["classe_etudiant"])){
            extract($_POST);
                // creer une proffesuer
                require_once("../model/etudiant.php");
                $prof = new Etudiant();
                $prof->setNom($nom);
                $prof->setPrenom($prenom);
                $prof->setEmail($email);
                $prof->setPhotoe($photoe);
                $prof->setClasse_etudiant($classe_etudiant);
                $prof->create();

                exit;
            }
            
            else
            
            {
            echo "veuillez remplir toute les champs";
            exit;
            }
}
?>