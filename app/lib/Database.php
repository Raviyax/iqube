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
        if (is_array($result) && count($result) > 0) {
          return $result;
        } else {
          return false;
        }
      }
    }
  }

  public static function get_image($image = [], $path)
  {
    $file = APPROOT . $path . $image;
    $b64image = base64_encode(file_get_contents($file));
    return $b64image;
  }

  public function update_image($image= [], $targetDir, $table, $condition)
  {
      try {
          if (!empty($image)) {
              $fileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
              $uniqueFilename = uniqid('', true) . '.' . $fileType;
              $targetFilePath = $targetDir . $uniqueFilename;
  
              $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
              
              if (in_array($fileType, $allowTypes)) {
                  if (move_uploaded_file($image['tmp_name'], $targetFilePath)) {
                      // Update the database with the unique filename
                      $this->query("UPDATE $table SET image = '{$uniqueFilename}' WHERE user_id = '{$condition}'");
                      return $uniqueFilename;
                  } else {
                      throw new Exception('File upload failed.');
                  }
              } else {
                  throw new Exception('Invalid file type.');
              }
          } else {
              throw new Exception('No image uploaded.');
          }
      } catch (Exception $e) {
          echo 'Error: ' . $e->getMessage();
      }
  }
  
}
