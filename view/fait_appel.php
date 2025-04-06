<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer un appel</title>
</head>
<body>
    <h2>Enregistrer un appel</h2>
    <form action="../controller/control_appel.php" method="POST">
        <label for="id_etudiant">ID de l'étudiant :</label>
        <input type="text" id="id_etudiant" name="id_etudiant" required><br><br>
        
        <label for="id_cours">ID du cours :</label>
        <input type="text" id="id_cours" name="id_cours" required><br><br>
        
        <label for="date_appel">Date de l'appel :</label>
        <input type="date" id="date_appel" name="date_appel" required><br><br>
        
        <label for="present">Présent</label>
    <input type="radio" id="present" name="etat_presence" value="Present">
    <label for="retard">Retard</label>
    <input type="radio" id="retard" name="etat_presence" value="Retard">
    <label for="absent">Absent</label>
    <input type="radio" id="absent" name="etat_presence" value="Absent">
    <!-- Autres champs du formulaire -->
    <button type="submit" name="enregistrer">Enregistrer</button>
        <label for="id_professeur">ID du professeur :</label>
        <input type="text" id="id_professeur" name="id_professeur" required><br><br>

        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>
