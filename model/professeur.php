<?php

require_once("connexion_base.php");

class Professeur {
    private $id_professeur;
    private $nom;
    private $prenom;
    private $email;
    private $nump;
    private $photop;
    private $mdpp;
    private $connex;

    public function __construct() {
        $this->connex = Connexion::getConnexion();
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNump($nump) {
        $this->nump = $nump;
    }

    public function setPhotop($photop) {
        $this->photop = $photop;
    }

    public function setMdpp($mdpp) {
        $this->mdpp = $mdpp;
    }

    // Getters
    public function getIdProfesseur() {
        return $this->id_professeur;
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

    public function getNump() {
        return $this->nump;
    }

    public function getPhotop() {
        return $this->photop;
    }

    public function getMdpp() {
        return $this->mdpp;
    }
    // Méthode pour créer un nouveau professeur
    public function create() {
        $requete = "INSERT INTO Professeur (nom, prenom, email, nump, photop, mdpp) VALUES (:nom, :prenom, :email, :nump, :photop, :mdpp)";
        $statement = $this->connex->prepare($requete);
        $statement->execute(array(
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'nump' => $this->nump,
            'photop' =>$this->photop,
            'mdpp' =>$this->mdpp
        ));
    }

    // Méthode pour récupérer tous les professeurs
    public function read() {
        $requete = "SELECT * FROM Professeur";
        $statement = $this->connex->query($requete);
        $professeurs = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $professeurs;
    }
         //read by mdpe
         public function read_by_mdpp($mdpp){
            $requete = "SELECT * FROM Professeur WHERE mdpp=:mdpp";
            $etat = $this->connex->prepare($requete);
            $etat->execute(array(
                "mdpp" =>$mdpp
            ));
            $resultat = $etat->fetchAll();
            $etat->closeCursor();
            return $resultat;
        }
}

?>
