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

  function readData($tableName, $condition = [], $selectColumns = ['*']) {
    try {
        // Create a PDO connection to the database.
        $pdo = $this->connect();

        // Construct the SQL query.
        $selectColumns = implode(', ', $selectColumns);
        $query = "SELECT $selectColumns FROM $tableName";

        // Add a WHERE clause if conditions are provided.
        if (!empty($condition)) {
            $whereConditions = [];
            foreach ($condition as $key => $value) {
                $whereConditions[] = "$key = :$key";
            }
            $query .= " WHERE " . implode(' AND ', $whereConditions);
        }

        // Prepare the statement.
        $stmt = $pdo->prepare($query);

        // Bind parameters.
        foreach ($condition as $key => $value) {
            $stmt->bindParam(':' . $key, $value);
        }

        // Execute the query.
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false; // Query execution failed.
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return false; // Query failed due to an error.
    }
}




}
