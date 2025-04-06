<?php

require_once("connexion_base.php");

class Etudiant {
    private $id_etudiant;
    private $nom;
    private $prenom;
    private $email;
    private $photoe;
    private $classe_etudiant;
    private $connex;

    public function __construct() {
        $this->id_etudiant = 0;
        $this->nom = "";
        $this->prenom = "";
        $this->email = "";
        $this->photoe = "";
        $this->classe_etudiant="";
        $this->connex = Connexion::getConnexion(); 
    }

    // Setters
    public function setId_etudiant($id_etudiant) {
        $this->id_etudiant = $id_etudiant;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhotoe($photoe) {
        $this->photoe = $photoe;
    }
     
    public function setClasse_etudiant($classe_etudiant){
        $this->classe_etudiant= $classe_etudiant;
    }
    // Getters
    public function getId_etudiant() {
        return $this->id_etudiant;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhotoe() {
        return $this->photoe;
    }

    public function getClasse_etudiant(){
        return $this->classe_etudiant;
    }

    // Méthode pour créer un nouvel étudiant
    public function create() {
        $requete = "INSERT INTO Etudiant (nom, prenom, email, photoe, classe_etudiant) VALUES (:nom, :prenom, :email, :photoe, :classe_etudiant)";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'photoe' => $this->photoe,
            "classe_etudiant" =>$this->classe_etudiant
        ));
    }

    // Méthode pour récupérer tous les étudiants
    public function read() {
        $requete = "SELECT * FROM Etudiant";
        $statement = $this->connex->query($requete);
        $etudiants = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $etudiants;
    }

    // Méthode pour mettre à jour un étudiant existant
    public function update() {
        $requete = "UPDATE Etudiant SET nom = :nom, prenom = :prenom, email = :email, photoe = :photoe, classe_etudiant = :classe_etudiant WHERE id_etudiant = :id_etudiant";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            'id_etudiant' => $this->id_etudiant,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'photoe' => $this->photoe,
            "classe_etudiant" =>$this->classe_etudiant
        ));
    }

    // Méthode pour supprimer un étudiant
    public function delete() {
        $requete = "DELETE FROM Etudiant WHERE id_etudiant = :id_etudiant";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array('id_etudiant' => $this->id_etudiant));
    }
}

?>
