<?php
class Model extends Database
{


    public function insert($data , $table , $allowedColumns)
    {
        if (!empty($allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $query = "INSERT INTO " . $table . " (" . implode(',', array_keys($data)) . ") VALUES (:" . implode(',:', array_keys($data)) . ")";

        $this->query($query, $data);
    }
   
    public function first($data,$table,$orderby)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM " . $table . " WHERE ";
        $conditions = [];
        foreach ($keys as $key) {
            $conditions[] = $key . "=:" . $key;
        }
        $query .= implode(' AND ', $conditions) . ' ORDER BY '.$orderby.' DESC LIMIT 1';
    
        $res = $this->query($query, $data);
    
        if (is_array($res) && !empty($res)) {
            return $res[0];
        }
    
        return false;
    }

    
    
}
