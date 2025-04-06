<?php
require_once "header2.php";
require_once "../model/etudiant.php";
require_once "../model/cours.php";

$etudiant = new Etudiant();
$liste_etudiant = $etudiant->read();

if (isset($_GET['id_cours'])) {
    // Récupérer l'identifiant du cours depuis l'URL
    $id_cours = $_GET['id_cours'];
    // Récupérer la date du cours
    $cours = new Cours(); // Supposons que vous avez une classe Cours pour gérer les cours
    $date_cours = $cours->getDateCoursById($id_cours); // Remplacez cette méthode par celle qui récupère la date du cours
?>

<link rel="stylesheet" href="css/image.css">
<!-- Déplacer le formulaire à l'extérieur de la boucle foreach -->
<form action="../controller/appel_etudiant.php" method="POST">
    <div class="container jumbotron h-100">
        <h2 class="text-center text-uppercase text-info"><u>Liste Etudiant</u></h2>
        <a href="interface_commercant.php" class="btn btn-info btn-small"><i class="fa fa-arrow-circle-o-left"></i></a><br>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">PHOTO</th>
                    <th class="text-center">MATRICULE</th>
                    <th class="text-center">NOM</th>    
                    <th class="text-center">PRENOM</th>
                    <th class="text-center">CLASSE</th>
                    <th class="text-center">état de présence</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($liste_etudiant as $le) {
                    // Vérifier si la classe de l'étudiant est NTIC17
                    if ($le["classe_etudiant"] === "NTIC") { ?>
                    <tr>
                        <td><img src="img/<?php echo $le["photoe"]; ?>" alt="" class="imagep"></td>
                        <td><?php echo $le["id_etudiant"]; ?></td>       
                        <td><?php echo $le["nom"]; ?></td>
                        <td><?php echo $le["prenom"]; ?></td>
                        <td><?php echo $le["classe_etudiant"]; ?></td>
                        <td>
                            <!-- Utiliser des champs de formulaire avec des noms d'attributs uniques -->
                            <input type="hidden" name="id_cours" value="<?php echo $id_cours ?>">
                            <input type="hidden" name="date_cours" value="<?php echo $date_cours ?>">
                            <input type="hidden" name="id_etudiant_<?php echo $le["id_etudiant"]; ?>" value="<?php echo $le["id_etudiant"]; ?>">
                            <label for="present_<?php echo $le["id_etudiant"]; ?>">Présent</label>
                            <input type="radio" id="present_<?php echo $le["id_etudiant"]; ?>" name="etat_presence_<?php echo $le["id_etudiant"]; ?>" value="Present">
                            <label for="retard_<?php echo $le["id_etudiant"]; ?>">Retard</label>
                            <input type="radio" id="retard_<?php echo $le["id_etudiant"]; ?>" name="etat_presence_<?php echo $le["id_etudiant"]; ?>" value="Retard">
                            <label for="absent_<?php echo $le["id_etudiant"]; ?>">Absent</label>
                            <input type="radio" id="absent_<?php echo $le["id_etudiant"]; ?>" name="etat_presence_<?php echo $le["id_etudiant"]; ?>" value="Absent">
                        </td>
                    </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <!-- Bouton d'enregistrement en fin de liste -->
        <button type="submit" name="enregistrer" class="btn-info">Enregistrer</button>
    </div>
</form>

<?php
} else {
    // Si l'identifiant du cours n'est pas passé dans l'URL, affichez un message d'erreur
    echo "<h1>Erreur : Identifiant du cours manquant dans l'URL</h1>";
}
?>
