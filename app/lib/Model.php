<?php
class Model extends Database
{

    protected $table = 'users';


    protected $allowedColumns = ['name', 'email', 'password'];

    public function insert($data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $query = "INSERT INTO " . $this->table . " (" . implode(',', array_keys($data)) . ") VALUES (:" . implode(',:', array_keys($data)) . ")";

        $this->query($query, $data);
    }

    public function first($data)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM " . $this->table . " WHERE ";
        $conditions = [];
        foreach ($keys as $key) {
            $conditions[] = $key . "=:" . $key;
        }
        $query .= implode(' AND ', $conditions) . ' ORDER BY id DESC LIMIT 1';
    
        $res = $this->query($query, $data);
    
        if (is_array($res) && !empty($res)) {
            return $res[0];
        }
    
        return false;
    }
    
}
