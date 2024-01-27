<?php
/*
Base Controller
Loads the models and views
*/

class Controller {
    // Load model
    public function model($model){
        // Require model file
        require_once '../app/models/' . $model . '.php';
        // Instantiate model
        return new $model();
    }

    // Load view
    public function view($view, $data = []){
        // Check for view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
 
    public function retrive_media($media,$path){
      $mediapath = APPROOT.$path.$media;
        if(file_exists($mediapath)){
            readfile($mediapath);
    }
    
}
public function upload_media($file, $path)
{
    $uniqueFilename = generate_unique_filename($file);
    $target_file = $path . $uniqueFilename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    if ($file["size"] > 500000) {
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        return false;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $uniqueFilename;
        } else {
            return false;
        }
    }
}
}
