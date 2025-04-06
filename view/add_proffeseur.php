<?php 
require_once "header2.php";
$title="prof";
require_once "../model/professeur.php";

?>

<div class="container h-100">

<!---formulaire-->
<form  action="../controller/add_prof_controller.php" class="jumbotron" method="POST"><br>
<h2 class="text-left text-danger"> Ajouter une proffeseur</h2><hr class="col-4">
  <div class="form-group">
      <div class="row">
          <div class="col-lg-3">
          <label >Nom:</label>
    <input type="text" class="form-control" placeholder="" name="nom">
          </div>

          <div class="col-lg-3">
          <label >Prenom:</label>
    <input type="text" class="form-control" placeholder="" name="prenom">
          </div>

          <div class="col-lg-3">
          <label >Email</label>
    <input type="text" class="form-control" placeholder="" name="email">
          </div>

          <div class="col-lg-3">
          <label >Contact</label>
    <input type="text" class="form-control" placeholder="" name="nump">
          </div> 

          <div class="col-lg-3">
          <label >Photo:</label>
    <input type="file" class="form-control" placeholder="" name="photop">
          </div> 

          <div class="col-lg-3">
          <label >mot de passe</label>
    <input type="password" class="form-control" placeholder="" name="mdpp">
          </div> 
<!--fin formulaire-->
</div><br>
<!---bouton d enregistrement--->
<button class="btn btn-info btn-lg activ float-right " name="enregistrer">Enregistrer</button>

</div>

<br>
</form>
</div>
