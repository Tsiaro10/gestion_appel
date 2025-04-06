<?php
session_start();
	// compte admin
	require_once ("../model/professeur.php");
	if($_POST["bouton"] == "connexion") {
		if(isset($_POST["email"]) and isset($_POST["mdpp"])) {
			extract($_POST);
			$prof = new Professeur();
$liste_prof = $prof->read_by_mdpp($mdpp);
			$mot_de_passe = $liste_prof[0]["mdpp"];
			if($mdpp==$mot_de_passe) {
				$_SESSION["id_professeur"] = $liste_prof[0]["id_professeur"];
				header ("location: ../view/liste_cours_prof.php");
				exit;
             
			}
            else {
				//header("Location: ../view/inscription.php");
                echo "diso";
			}
		}
         else 
        {
			header("Location: ../view/inscription.php");
		}
	}
?>