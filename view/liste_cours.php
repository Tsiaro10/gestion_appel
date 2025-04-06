<?php 
require_once "header2.php";
require_once "../model/cours.php";
$cours=new Cours();
$liste_cours = $cours->read();
?>
<link rel="stylesheet" href="css/image.css">
<!-- Déplacer le formulaire à l'extérieur de la boucle foreach -->

    <div class="container jumbotron h-100">
        <a href="interface_commercant.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
        
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">NOM</th>
                    <th class="text-center">Prof </th>
                    <th class="text-center">Date du cours</th>
                    <th class="text-center">Heure debut</th>    
                    <th class="text-center">Heure fin </th>                   
                    <th class="text-center">Presence</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($liste_cours as $le) { ?>
                    <tr>
                        <td><?php echo $le["nom_cours"]; ?></td>
                        <td><?php echo $le["id_professeur"]; ?></td>        
                        <td><?php echo $le["date_cours"]; ?></td>
                        <td><?php echo $le["heure_debut"]; ?></td>
                        <td><?php echo $le["heure_fin"]; ?></td>
                        <td>
                        <form action="../controller/presence.php" method="POST">
                            <!-- Utiliser des champs de formulaire avec des noms d'attributs uniques -->
                            <input type="hidden" name="id_cours" value="<?php echo $le["id_cours"]; ?>">
                            <button type="submit" name="presence" class="btn-info">Presence</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Bouton d'enregistrement en fin de liste -->
        
    </div>

