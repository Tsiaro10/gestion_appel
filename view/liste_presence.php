<?php 
session_start();
require_once "header2.php";
require_once "../model/cours.php";
$cours = new Cours();
require_once "../model/professeur.php";
$prof = new Professeur();
$liste_prof =$prof->read();

// Vérifier si l'ID du professeur est défini dans la session
if(isset($_SESSION["id_professeur"])) {
    $id_professeur = $_SESSION["id_professeur"];

    // Récupérer uniquement les cours pour l'ID du professeur connecté
    $liste_cours = $cours->readByProfesseur($id_professeur);

    // Si aucun cours n'est trouvé pour cet ID de professeur, affichez un message approprié
    if(empty($liste_cours)) {
        echo "Aucun cours trouvé pour cet utilisateur.";
    }
} else {
    // Rediriger l'utilisateur vers la page d'inscription s'il n'est pas connecté
    header("Location: inscription.php");
    exit;
}
?>

<link rel="stylesheet" href="css/image.css">
<!-- Déplacer le formulaire à l'extérieur de la boucle foreach -->
<div class="container jumbotron h-100">
    <h2 class="text-center text-info text-uppercase"><u>Liste du cours aujourd'hui</u></h2><br>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th class="text-center">Cours</th>
                <th class="text-center">Prof </th>
                <th class="text-center">Date du cours</th>
                <th class="text-center">Heure début</th>    
                <th class="text-center">Heure fin </th>                   
                <th class="text-center">Présence</th>
                <th class="text-center">Liste de présence</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($liste_cours as $le) {
                // Vérifier si la date du cours correspond à la date actuelle
                if (date('Y-m-d', strtotime($le["date_cours"])) == date('Y-m-d')) { ?>
                    <tr>
                        <td><?php echo $le["nom_cours"]; ?></td>

                        <td>
                            <?php 
                            // nom prof
                            foreach ($liste_prof as $prof) {
                                if ($prof["id_professeur"] == $id_professeur) {
                                    echo $prof["nom"];
                                    break;
                                }
                            }
                            ?>

                        </td>  

                        <td><?php echo $le["date_cours"]; ?></td>
                        <td><?php echo $le["heure_debut"]; ?></td>
                        <td><?php echo $le["heure_fin"]; ?></td>
                        <td>
                            <?php 
                            // Récupérer les appels pour la date du cours
                            $id_cours = $le["id_cours"];
                            $date_cours = $le["date_cours"];
                            $appels = $cours->getAppelsByCoursAndDate($id_cours, $date_cours);
                            // Vérifier si des appels existent pour cette date
                            if (!empty($appels)) {
                                echo "Présence déjà effectuée";
                            } else {
                                echo "Non pris";
                            }
                            ?>
                        </td>
                        <td>
                            <form action="fiche_presence.php" method="GET">
                                <input type="hidden" name="id_cours" value="<?php echo $le["id_cours"]; ?>">
                                <button type="submit" class="btn btn-info">Liste de présence</button>
                            </form>
                        </td>
                    </tr>
            <?php 
                }
            } ?>
        </tbody>
    </table>
    <!-- Bouton d'enregistrement en fin de liste -->
</div>
