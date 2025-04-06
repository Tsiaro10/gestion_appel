<?php
if(isset($_POST["enregistrer"])){

            if(!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"]) and !empty($_POST["nump"]) and !empty($_POST["photop"]) and !empty($_POST["mdpp"]) ){
            extract($_POST);
                // creer une proffesuer
                require_once("../model/professeur.php");
                $prof = new Professeur();
                $prof->setNom($nom);
                $prof->setPrenom($prenom);
                $prof->setEmail($email);
                $prof->setNump($nump);
                $prof->setPhotop($photop);
                $prof->setMdpp($mdpp);
                //appel fonction create
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