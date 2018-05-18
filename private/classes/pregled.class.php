<?php

class Pregled extends DatabaseObject {

  static protected $table_name = "pregled";
  static protected $db_columns = ['id', 'date', 'br_kartona', 'anamneza', 'dijagnoza', 'terapija','cena'];

  public $id;
  public $date;
  public $br_kartona;
  public $anamneza;
  public $dijagnoza;
  public $terapija;
  public $cena;
  
  public function __construct($args=[]) {
    $this->date = $args['date'] ?? '';
    $this->br_kartona = $args['br_kartona'] ?? '';
    $this->anamneza = $args['anamneza'] ?? '';
    $this->dijagnoza = $args['dijagnoza'] ?? '';
    $this->terapija = $args['terapija'] ?? '';
    $this->cena = $args['cena'] ?? '';   
  }
public function euro_date($val){
$day = substr($val, -2);
$month = substr($val, -5, 2);
$year = substr($val, -(strlen($val)), 4);
return $day.".".$month.".".$year.".";
}
/*static public function find_all(){
      $sql = "SELECT * FROM " . self::$table_name . "ORDER by " . self::$date;
      return static::find_by_sql($sql);
  }
  */
  static public function find_by_username($username) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  protected function validate() {
     
  $this->errors = [];
  if(is_blank($this->br_kartona)) {
    $this->errors[] = "Broj kartona ne može biti prazno polje.";
  }  
}
}
 
 

