<?php
function set_value($key){
    if(isset($_POST[$key])){
        return $_POST[$key];
    }
    return '';
}

function redirect($path){
    header("Location: " . URLROOT . $path);
    exit();
}

function generate_unique_filename($file){
  try {
     if (!empty($file)) {
         $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
         $uniqueFilename = uniqid('', true) . '.' . $fileType;
         return $uniqueFilename;
     } else {
         throw new Exception('File upload failed.');
     }  

    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();


}
}

