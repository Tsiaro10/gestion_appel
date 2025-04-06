<?php 
require_once "header2.php";
$title="prof";
require_once "../model/cours.php";
require_once "../model/professeur.php";
$prof= new Professeur;
$liste_prof=$prof->read();

?>

<div class="container h-100">

<!---formulaire-->
<form  action="../controller/add_cour_controller.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Ajouter une cours</h2><hr class="col-4">
  <div class="form-group">
      <div class="row">
          <div class="col-lg-3">
          <label >Matiere</label>
    <input type="text" class="form-control" placeholder="" name="nom_cours">
          </div>

          <div class="col-lg-3">
          <label >date du cours:</label>
    <input type="date" class="form-control" placeholder="" name="date_cours">
          </div>
          <div class="col-lg-3">
          <label >heure debut</label>
    <input type="time" class="form-control" placeholder="" name="heure_debut">
          </div>
          <div class="col-lg-3">
          <label >heure fin</label>
    <input type="time" class="form-control" placeholder="" name="heure_fin">
          </div> 
          <div class="col-lg-12">
                                         <!-- selction-->
                                         <div class="col-lg-3"><br>
          <label for="">Selectioner le prof :</label>
          <select class="" name="id_professeur" id="">
<?php 
foreach($liste_prof as $v){
?>
<option value="<?php echo $v["id_professeur"]; ?>">
<?php  echo $v["nom"]?>
</option>

<?php }?>
          </select>
          <!----- fin selection------------>
          </div> 
<!--fin formulaire-->
</div></div><br>
<!---bouton d enregistrement--->
<button class="btn btn-info btn-lg activ float-right " name="enregistrer">Enregistrer</button>

</div>

<br>
</form>
</div>
