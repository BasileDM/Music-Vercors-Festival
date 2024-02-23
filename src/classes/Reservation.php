<?php
class Reservation
{
    // private $_ID;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_telephone;
    private $_adresse;
    private $_nbPersonnes;
    private $_date;
    private $_nbCasquesEnfants;
    private $_nbLugesEte;
    private $_prixTotal;

    public function __construct(string $nom, string $prenom, string $mail, string $telephone, string $adresse, string $nbPersonnes, string $date, string $nbCasquesEnfants, string $nbLugesEte, int $prixTotal)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_mail = $mail;
        $this->_telephone = $telephone;
        $this->_adresse = $adresse;
        $this->_nbPersonnes = $nbPersonnes;
        $this->_date = $date;
        $this->_nbCasquesEnfants = $nbCasquesEnfants;
        $this->_nbLugesEte = $nbLugesEte;
        $this->_prixTotal = $prixTotal;
    }
//#region Getters and Setters
    public function getNom() : string {
        return $this->_nom;
    }

    public function setNom(string $nom) {
        $this->_nom = $nom;
    }

    public function getPrenom() : string {
        return $this->_prenom;
    }

    public function setPrenom(string $prenom) {
        $this->_prenom = $prenom;
    }

    public function getMail() : string {
        return $this->_mail;
    }

    public function setMail(string $mail) {
        $this->_mail = $mail;
    }

    public function getTelephone() : string {
        return $this->_telephone;
    }

    public function setTelephone(string $telephone) {
        $this->_telephone = $telephone;
    }

    public function getAdresse() : string {
        return $this->_adresse;
    }

    public function setAdresse(string $adresse) {
        $this->_adresse = $adresse;
    }

    public function getNbPersonnes() : int {
        return $this->_nbPersonnes;
    }

    public function setNbPersonnes(int $nbPersonnes) {
        $this->_nbPersonnes = $nbPersonnes;
    }

    public function getDate() : string {
        return $this->_date;
    }

    public function setDate(string $date) {
        $this->_date = $date;
    }

    public function getNbCasquesEnfants() : int {
        return $this->_nbCasquesEnfants;
    }

    public function setNbCasquesEnfants(int $nbCasquesEnfants) {
        $this->_nbCasquesEnfants = $nbCasquesEnfants;
    }

    public function getNbLugesEte() : int {
        return $this->_nbLugesEte;
    }

    public function setNbLugesEte(int $nbLugesEte) {
        $this->_nbLugesEte = $nbLugesEte;
    }

    public function getPrixTotal() : int {
        return $this->_prixTotal;
    }

    public function setPrixTotal(int $prixTotal) {
        $this->_prixTotal = $prixTotal;
    }
#endregion

    public function getObjectToArray(): array {
        return [
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "mail" => $this->getMail(),
            "telephone" => $this->getTelephone(),
            "adresse" => $this->getAdresse(),
            "nbPersonnes" => $this->getNbPersonnes(),
            "date" => $this->getDate(),
            "nbCasquesEnfants" => $this->getNbCasquesEnfants(),
            "nbLugesEte" => $this->getNbLugesEte()
        ];
    }

}