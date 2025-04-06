<?php

require_once("connexion_base.php");

class Cours {
    private $id_cours;
    private $nom_cours;
    private $date_cours;
    private $heure_debut;
    private $heure_fin;
    private $id_professeur; // Clé étrangère vers la table Professeur
    private $connex;

    public function __construct() {
        $this->id_cours = 0;
        $this->nom_cours = "";
        $this->date_cours = null;
        $this->heure_debut = null;
        $this->heure_fin = null;
        $this->id_professeur = 0;
        $this->connex = Connexion::getConnexion(); 
    }

    // Setters
    public function setId_cours($id_cours) {
        $this->id_cours = $id_cours;
    }

    public function setNom_cours($nom_cours) {
        $this->nom_cours = $nom_cours;
    }

    public function setDate_cours($date_cours) {
        $this->date_cours = $date_cours;
    }

    public function setHeure_debut($heure_debut) {
        $this->heure_debut = $heure_debut;
    }

    public function setHeure_fin($heure_fin) {
        $this->heure_fin = $heure_fin;
    }

    public function setId_professeur($id_professeur) {
        $this->id_professeur = $id_professeur;
    }

    // Getters
    public function getId_cours() {
        return $this->id_cours;
    }

    public function getNom_cours() {
        return $this->nom_cours;
    }

    public function getDate_cours() {
        return $this->date_cours;
    }

    public function getHeure_debut() {
        return $this->heure_debut;
    }

    public function getHeure_fin() {
        return $this->heure_fin;
    }

    public function getId_professeur() {
        return $this->id_professeur;
    }

    // Méthode pour créer un nouveau cours
    public function create() {
        $requete = "INSERT INTO Cours (nom_cours, date_cours, heure_debut, heure_fin, id_professeur) VALUES (:nom_cours, :date_cours, :heure_debut, :heure_fin, :id_professeur)";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            'nom_cours' => $this->nom_cours,
            'date_cours' => $this->date_cours,
            'heure_debut' => $this->heure_debut,
            'heure_fin' => $this->heure_fin,
            'id_professeur' => $this->id_professeur
        ));
    }

    // Méthode pour récupérer tous les cours
    public function read() {
        $requete = "SELECT * FROM Cours";
        $statement = $this->connex->query($requete);
        $cours = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cours;
    }

    public function readByProfesseur($id_professeur) {
        // Requête SQL pour sélectionner les cours associés à un professeur spécifique
        $query = "SELECT * FROM Cours WHERE id_professeur = :id_professeur";
    
        // Préparation de la requête
        $statement = Connexion::getConnexion()->prepare($query);
    
        // Liaison des valeurs des paramètres
        $statement->bindParam(':id_professeur', $id_professeur);
    
        // Exécution de la requête
        $statement->execute();
    
        // Récupération des résultats
        $cours = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        // Retourner les cours
        return $cours;
    }
    

    // Méthode pour mettre à jour un cours existant
    public function update() {
        $requete = "UPDATE Cours SET nom_cours = :nom_cours, date_cours = :date_cours, heure_debut = :heure_debut, heure_fin = :heure_fin, id_professeur = :id_professeur WHERE id_cours = :id_cours";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            'id_cours' => $this->id_cours,
            'nom_cours' => $this->nom_cours,
            'date_cours' => $this->date_cours,
            'heure_debut' => $this->heure_debut,
            'heure_fin' => $this->heure_fin,
            'id_professeur' => $this->id_professeur
        ));
    }

    // Méthode pour supprimer un cours
    public function delete() {
        $requete = "DELETE FROM Cours WHERE id_cours = :id_cours";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array('id_cours' => $this->id_cours));
    } 
    // comparaison du date 
    public function getAppelsByCoursId($id_cours) {
        // Requête SQL pour récupérer les appels en fonction de l'ID du cours
        $query = "SELECT * FROM Appel WHERE id_cours = :id_cours";
        
        // Préparation de la requête
        $statement = Connexion::getConnexion()->prepare($query);
        
        // Liaison des valeurs des paramètres
        $statement->bindParam(':id_cours', $id_cours);
        
        // Exécution de la requête
        $statement->execute();
        
        // Récupération des résultats
        $appels = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Retourner les appels
        return $appels;
    }
    
    public function getAppelsByCoursAndDate($id_cours, $date_cours) {
        // Requête SQL pour récupérer les appels en fonction de l'ID du cours et de la date du cours
        $query = "SELECT * FROM Appel WHERE id_cours = :id_cours AND DATE(date_appel) = :date_cours";
        
        // Préparation de la requête
        $statement = Connexion::getConnexion()->prepare($query);
        
        // Liaison des valeurs des paramètres
        $statement->bindParam(':id_cours', $id_cours);
        $statement->bindParam(':date_cours', $date_cours);
        
        // Exécution de la requête
        $statement->execute();
        
        // Récupération des résultats
        $appels = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Retourner les appels
        return $appels;
    }
    
    // Dans la classe Cours

public function getDateCoursById($id_cours) {
    // Requête SQL pour récupérer la date du cours en fonction de l'ID du cours
    $query = "SELECT date_cours FROM Cours WHERE id_cours = :id_cours";

    // Préparation de la requête
    $statement = Connexion::getConnexion()->prepare($query);

    // Liaison des valeurs des paramètres
    $statement->bindParam(':id_cours', $id_cours, PDO::PARAM_INT);

    // Exécution de la requête
    $statement->execute();

    // Récupération du résultat
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Retourner la date du cours
    return $result['date_cours'];
}

    
    
}

?>
