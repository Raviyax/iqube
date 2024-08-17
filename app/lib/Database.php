<?php

  /**
 * Executes a prepared SQL query with optional data binding and result fetching.
 *
 * @param string $query The SQL query to execute.
 * @param array $data An associative array of parameters to bind to the query. Defaults to an empty array.
 * @param string $type The type of result to fetch. Options are 'object' for objects and 'array' for associative arrays. Defaults to 'object'.
 *
 * @return mixed|array|false Returns the fetched result as an array or false on failure.
 */
class Database
{

  private function connect()
  {
    $str = DBDRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
    $conn = new PDO($str, DB_USER, DB_PASS);
    return $conn;
  }

//   private function connect()
// {
//     $dsn = DBDRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
//     try {
//         $conn = new PDO($dsn, DB_USER, DB_PASS);
//         // Set PDO to throw exceptions on error
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $conn;
//     } catch (PDOException $e) {
//         // Handle connection errors
//         die("Connection failed: " . $e->getMessage());
//     }
// }



public function query($query, $data = [], $type = 'object')
{
    try {
        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            // Bind parameters if data is provided
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    // Assuming all parameters are strings by default. Modify if necessary.
                    $stm->bindValue(":$key", $value, PDO::PARAM_STR);
                }
            }

            $check = $stm->execute();

            if ($check) {
                // Fetch result based on type
                if ($type === 'object') {
                    $result = $stm->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                }

                // Check if result is not empty
                if (!empty($result)) {
                    return $result;
                }
            }
        }
    } catch (PDOException $e) {
        // Handle any database exceptions here, log or throw as needed
        // Log the error message or handle it based on your application's requirements
        // You might also want to throw the exception to be handled by the caller
        // Example: throw new Exception("Database error: " . $e->getMessage());
        error_log("Database error: " . $e->getMessage());
    }

    // Return false if the query execution failed or no results were found
    return false;
}

}
