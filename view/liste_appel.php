<?php 
session_start();
require_once "header2.php";
require_once "../model/cours.php";
require_once "../model/professeur.php";
require_once "../model/etudiant.php";
require_once "../model/appel.php";
// cours
$cours = new Cours();
$liste_cours = $cours->read();

// prof

$prof = new Professeur();
$liste_prof =$prof->read();

// etudiant

$etudiant = new Etudiant();
$liste_etudiant = $etudiant->read();

// APPEL 
$appel = new Appel();
$liste_appel = $appel->readAll();

?>

<link rel="stylesheet" href="css/image.css">
<!-- Déplacer le formulaire à l'extérieur de la boucle foreach -->
<div class="container jumbotron h-100">
    <h2 class="text-center text-info text-uppercase"><u>Tous les appel</u></h2><br>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
            <th class="text-center">Etudiant</th>
                <th class="text-center">Cours</th>
                <th class="text-center">Prof </th>
                <th class="text-center">Date du cours</th>                 
                <th class="text-center">Etat de presence</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($liste_appel as $le) {
                ?>
                            <td>
                            <?php 
                            // nom etudiant
                            foreach ($liste_etudiant as $etudiant) {
                                if ($etudiant["id_etudiant"] == $le["id_etudiant"]) {
                                    ?>
                                    <img src="img/<?php echo $etudiant["photoe"];?>" alt=""><?php
                                    
                                    break;
                                }
                            }
                            ?>

                        </td>

                        <td><?php echo $le["id_appel"]; ?></td>
                        <td>
                            <?php 
                            // nom prof
                            foreach ($liste_prof as $prof) {
                                if ($prof["id_professeur"] == $le["id_professeur"]) {
                                    echo $prof["nom"];
                                    break;
                                }
                            }
                            ?>

                        </td>

                        <td><?php echo $le["date_appel"]; ?></td>
                        <td><?php echo $le["etat_presence"]; ?></td>
                       
                
                    </tr>
            <?php 
                }
             ?>
        </tbody>
    </table>
    <!-- Bouton d'enregistrement en fin de liste -->
</div>
