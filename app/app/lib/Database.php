<?php
class Database
{

  // private function connect()
  // {
  //   $str = DBDRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
  //   $conn = new PDO($str, DB_USER, DB_PASS);
  //   return $conn;
  // }

  private function connect()
{
    $dsn = DBDRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    try {
        $conn = new PDO($dsn, DB_USER, DB_PASS);
        // Set PDO to throw exceptions on error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // Handle connection errors
        die("Connection failed: " . $e->getMessage());
    }
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
        if (is_array($result) && count($result) > 0) {
          return $result;
        } else {
          return false;
        }
      }
    }
  }
}
