<?php
class Crud {



    function readData($tableName, $condition = [], $selectColumns = ['*']) {
        try {
            // Create a PDO connection to the database.
            $db = new Database();
            $pdo = $db->connect();
    
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