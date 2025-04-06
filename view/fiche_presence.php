User
<?php 
require_once "header2.php";
require_once "../model/appel.php";
require_once "../model/etudiant.php";
$etudiant= new Etudiant();
$liste_etudiant =$etudiant->read();

// Vérifiez si l'ID du cours est défini dans l'URL
if (isset($_GET['id_cours'])) {
    // Récupérez l'identifiant du cours depuis l'URL
    $id_cours = $_GET['id_cours'];
    
    // Connexion à la base de données
    $connexion = Connexion::getConnexion();

    // Instanciation de la classe Appel
    $appel = new Appel();

    // Vérifiez si l'ID du cours est numérique
    if (is_numeric($id_cours)) {
        // Récupération de la liste des appels pour ce cours
        $liste_appel = $appel->read($id_cours);

        // Vérifiez si des appels ont été trouvés pour ce cours
        if ($liste_appel) {
            ?>
            <!-- Déplacer le formulaire à l'extérieur de la boucle foreach -->
            <div class="container  h-100">
                <a href="liste_cours_prof.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                             <th class="text-center">Photo</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Date</th>    
                            <th class="text-center">État de présence</th>                   
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($liste_appel as $appel) { ?>
                            <tr>

                            <td>

<?php 
        // nom etudiant
        foreach ($liste_etudiant as $etudiant) {
            if ($etudiant["id_etudiant"] == $appel["id_etudiant"]) {
               ?><img src="img/<?php echo $etudiant["photoe"];?>" alt=""> <?php
                break;
            }
        }
        ?>

</td>
                                <td>

                                <?php 
                                        // nom etudiant
                                        foreach ($liste_etudiant as $etudiant) {
                                            if ($etudiant["id_etudiant"] == $appel["id_etudiant"]) {
                                                echo $etudiant["nom"];
                                                break;
                                            }
                                        }
                                        ?>

                                </td>        
                    
                                <td><?php echo $appel["date_appel"]; ?></td>
                                <td><?php echo $appel["etat_presence"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            // Afficher un message si aucun appel n'est trouvé pour ce cours
            echo "mbola tsy vita";
        }
    } else {
        // Afficher un message d'erreur si l'ID du cours n'est pas numérique
        echo "L'identifiant du cours n'est pas valide.";
    }
} else {
    // Rediriger l'utilisateur vers une autre page si l'ID du cours n'est pas défini dans l'URL
    echo "le cours n a pas definie";
    exit;
}
?>