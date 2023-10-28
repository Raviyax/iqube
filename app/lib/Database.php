<?php
class Database 
{
    private function connect()
    {
      $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function query()
    {
        $this->connect();
       
    }
}