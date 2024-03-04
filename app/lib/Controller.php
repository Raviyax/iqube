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
    $target_file = APPROOT . $path . $uniqueFilename;
    // Move the uploaded file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
       //allow only 100 mega bytes
        if ($file["size"] > 100000000) {
            unlink($target_file); // Delete the uploaded file if it exceeds the file size limit
            return false;
        }
        // Check file type
        $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (!in_array($FileType, ["jpg", "jpeg", "png", "pdf", "mp4", "mov", "avi", "mkv"])) {
            unlink($target_file); // Delete the uploaded file if it has an invalid file type
            return false;
        }
        return $uniqueFilename; // All checks passed, return the unique filename
    } else {
        return false; // Error uploading file
    }
}
}
