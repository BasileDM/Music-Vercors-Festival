<?php
class Database{
  private $_DataBase;

  public function __construct(){
    $this->_DataBase = __DIR__ . '/../csv/reservations.csv';
  }

  public function getDatabase() : string {
    return $this->_DataBase;
  }

  public function setDatabase(string $database) {
    $this->_DataBase = $database;
  }

  public function getAllReservations(): array {
    $connexion = fopen($this->_DataBase, 'r');
    $reservations = [];

    while (($reservation = fgetcsv($connexion, 1000, ",")) !== FALSE) {
      $reservations[] = new Reservation($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6], $reservation[7], $reservation[8], $reservation[9]);
    }
    fclose($connexion);
    return $reservations;
  }

  public function saveReservation(Reservation $reservation): bool {
    $connexion = fopen($this->_DataBase, 'ab');
    $retour = fputcsv($connexion, $reservation->getObjectToArray());
    fclose($connexion);
    return $retour;
  }
}
?>