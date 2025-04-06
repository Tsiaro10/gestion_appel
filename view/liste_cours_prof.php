<?php 
session_start();
require_once "header2.php";
require_once "../model/cours.php";
$cours = new Cours();
require_once "../model/professeur.php";
$prof = new Professeur();
$liste_prof =$prof->read();


if(isset($_SESSION["id_professeur"])) {

    $id_professeur = $_SESSION["id_professeur"];
    $liste_cours = $cours->readByProfesseur($id_professeur);

    if(empty($liste_cours)) {
        echo "pas de prof";
    }
}

 else {
    header("Location: inscription.php");
    exit;
}

?>

<link rel="stylesheet" href="css/image.css">
<div class="container jumbotron h-100">
    <h2 class="text-center text-info text-uppercase"><u>Liste du cours aoujourd'hui</u></h2><br>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th class="text-center">Cours</th>
                <th class="text-center">Prof </th>
                <th class="text-center">Date du cours</th>
                <th class="text-center">Heure debut</th>    
                <th class="text-center">Heure fin </th>                   
                <th class="text-center">Presence</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($liste_cours as $le) {
                if (date('Y-m-d', strtotime($le["date_cours"])) == date('Y-m-d')) { ?>
                    <tr>
                        <td><?php echo $le["nom_cours"]; ?></td>

                        <td>
                                        <?php 
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
                            $id_cours = $le["id_cours"];
                            $date_cours = $le["date_cours"];
                            $appels = $cours->getAppelsByCoursAndDate($id_cours, $date_cours);

                            // teste appel
                            if (!empty($appels)) {
                                echo "Présence déjà effectuée";
                            } else {
                            ?>
                                        <!-------form presence-------->
                                <form action="../controller/presence.php" method="POST">
                                    
                                    <input type="hidden" name="id_cours" value="<?php echo $le["id_cours"]; ?>">
                                    <button type="submit" name="presence" class="btn-info">Presence</button>
                                </form>

                            <?php
                            }
                            ?>
                        </td>
                    </tr>
            <?php 
                }
            } ?>
        </tbody>
    </table>

<!---============     liste presence  ================================--->

    <form action="liste_presence.php" method="GET">
    <input type="hidden" name="id_cours" value="<?php echo $le["id_cours"]; ?>">
    <button type="submit" class="btn-info">Liste de présence</button>
    </form>

</div>
