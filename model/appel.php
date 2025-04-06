<?php

require_once "connexion_base.php";

class Appel {
    // Propriétés de la classe
    private $id_appel;
    private $id_etudiant;
    private $id_cours;
    private $date_appel;
    private $etat_presence;
    private $id_professeur;
    private $connex;

    // Constructeur
    public function __construct() {
        $this->id_appel = null;
        $this->id_etudiant = null;
        $this->id_cours = null;
        $this->date_appel = null;
        $this->etat_presence = null;
        $this->id_professeur = null;
        $this->connex = Connexion::getConnexion();
    }

    // Méthodes setter
    public function setIdAppel($id_appel) {
        $this->id_appel = $id_appel;
    }

    public function setIdEtudiant($id_etudiant) {
        $this->id_etudiant = $id_etudiant;
    }

    public function setIdCours($id_cours) {
        $this->id_cours = $id_cours;
    }

    public function setDateAppel($date_appel) {
        $this->date_appel = $date_appel;
    }

    public function setEtatPresence($etat_presence) {
        $this->etat_presence = $etat_presence;
    }

    public function setIdProfesseur($id_professeur) {
        $this->id_professeur = $id_professeur;
    }

    // Méthodes getter
    public function getIdAppel() {
        return $this->id_appel;
    }

    public function getIdEtudiant() {
        return $this->id_etudiant;
    }

    public function getIdCours() {
        return $this->id_cours;
    }

    public function getDateAppel() {
        return $this->date_appel;
    }

    public function getEtatPresence() {
        return $this->etat_presence;
    }

    public function getIdProfesseur() {
        return $this->id_professeur;
    }

    // create
    public function create() {
    
        $query = "INSERT INTO Appel (id_etudiant, id_cours, date_appel, etat_presence, id_professeur) VALUES (:id_etudiant, :id_cours, :date_appel, :etat_presence, :id_professeur)";

        // Préparation de la requête
        $statement = Connexion::getConnexion()->prepare($query);

        // Liaison des valeurs des paramètres
        $statement->bindParam(':id_etudiant', $this->id_etudiant);
        $statement->bindParam(':id_cours', $this->id_cours);
        $statement->bindParam(':date_appel', $this->date_appel);
        $statement->bindParam(':etat_presence', $this->etat_presence);
        $statement->bindParam(':id_professeur', $this->id_professeur);

        // Exécution de la requête
        if ($statement->execute()) {
            return true; // Succès
        } else {
            return false; // Échec
        }
    }
    
    public function readAll() {
        $requete = "SELECT * FROM Appel";
        $statement = $this->connex->query($requete);
        $appel = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $appel;
    }


        public function read($id_cours = null) {
            // Requête SQL de base pour sélectionner tous les appels
            $query = "SELECT * FROM Appel";
        
           
            if ($id_cours !== null) {
                $query .= " WHERE id_cours = :id_cours";
            }
            $query .= " ORDER BY date_appel DESC";
            $statement = Connexion::getConnexion()->prepare($query);

            if ($id_cours !== null) {
                $statement->bindParam(':id_cours', $id_cours, PDO::PARAM_INT);
            }
        
            // Exécutez la requête
            $statement->execute();
        
            // Récupérez les résultats sous forme de tableau associatif
            $appels = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            // Retournez les résultats
            return $appels;
        }
        
        
        
    // Update
    public function update($id_appel, $etat_presence) {
        $requete = "UPDATE Appel SET etat_presence = :etat_presence WHERE id_appel = :id_appel";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            'id_appel' => $id_appel,
            'etat_presence' => $etat_presence
        ));
    }

    // Delete
    public function delete($id_appel) {
        $requete = "DELETE FROM Appel WHERE id_appel = :id_appel";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array('id_appel' => $id_appel));
    }
    // Dans la classe Appel

public function getAllAppels() {
    // Requête SQL pour récupérer tous les appels
    $query = "SELECT * FROM Appel";
    
    // Préparation de la requête
    $statement = $this->connex->prepare($query);
    
    // Exécution de la requête
    $statement->execute();
    
    // Récupération des résultats
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner les résultats
    return $result;
}

}

?>
