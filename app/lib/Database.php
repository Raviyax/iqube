<?php
class Database
{
  private function connect()
  {
    $str = DBDRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
    $conn = new PDO($str, DB_USER, DB_PASS);
    return $conn;
  }
  public function query($query, $data = [], $type = 'object')
  {
    $conn = $this->connect();
    $stm = $conn->prepare($query);
    if ($stm) {
      $check = $stm->execute($data);
      if ($check) {
        if ($type == 'object') {
          $result = $stm->fetchAll(PDO::FETCH_OBJ);
        } else {
          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        if (is_array($result) && count($result) >0) {
          return $result;
        } else {
          return false;
        }
      }
    }
  }
}
