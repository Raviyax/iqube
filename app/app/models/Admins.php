<?php
class Admins extends Model 
{
    public $errors = [];

    public function get_total_student_count()
    {
        //get count of all students
        $count = $this->query('SELECT COUNT(*) as total_students FROM students');
        if ($count) {
            return $count[0]->total_students;
        }
        else {
            return 0;
        }

    }

    public function get_student_joined_this_month()
    {
        //get count of students joined this month
        $count = $this->query('SELECT COUNT(*) as total_students FROM  users where role = "student" AND created_at >= CURDATE() - INTERVAL 1 MONTH');

      //get as a percentage relative to current count
        if ($count) {
            $total_students = $this->get_total_student_count();
            $percentage = ($count[0]->total_students / $total_students) * 100;
            return $percentage;
        }
        return 0;
    }

    public function get_total_tutor_count()
    {
        //get count of all tutors
        $count = $this->query('SELECT COUNT(*) as total_tutors FROM tutors');
        if ($count) {
            return $count[0]->total_tutors;
        }
        else {
            return 0;
        }
    }

    public function get_tutor_joined_this_month()
    {
        //get count of tutors joined this month
        $count = $this->query('SELECT COUNT(*) as total_tutors FROM  users where role = "tutor" AND created_at >= CURDATE() - INTERVAL 1 MONTH');

        //get as a percentage relative to current count
        if ($count) {
            $total_tutors = $this->get_total_tutor_count();
            $percentage = ($count[0]->total_tutors / $total_tutors) * 100;
            return $percentage;
        }
        return 0;
    }

    public function get_total_subject_admin_count()
    {
        //get count of all subject admins
        $count = $this->query('SELECT COUNT(*) as total_subject_admins FROM subject_admins');
        if ($count) {
            return $count[0]->total_subject_admins;
        }
        else {
            return 0;
        }
    }

    public function get_subject_admin_joined_this_month()
    {
        //get count of subject admins joined this month
        $count = $this->query('SELECT COUNT(*) as total_subject_admins FROM  users where role = "subject_admin" AND created_at >= CURDATE() - INTERVAL 1 MONTH');

        //get as a percentage relative to current count
        if ($count) {
            $total_subject_admins = $this->get_total_subject_admin_count();
            $percentage = ($count[0]->total_subject_admins / $total_subject_admins) * 100;
            return $percentage;
        }
        return 0;
    }

    public function get_total_premium_student_count()
    {
        //get count of all premium students
        $count = $this->query('SELECT COUNT(*) as total_premium_students FROM students WHERE premium = 1');
        if ($count) {
            return $count[0]->total_premium_students;
        }
        else {
            return 0;
        }
    }

    public function get_last_month_video_purchases()
    {
        try {
            // Get this month's video purchases along with their prices
            $query = "SELECT pv.video_content_id, vc.price 
                      FROM purchased_videos pv 
                      JOIN video_content vc ON pv.video_content_id = vc.video_content_id 
                      WHERE pv.purchased_date >= CURDATE() - INTERVAL 1 MONTH";
            $purchases = $this->query($query);
    
            // Calculate total price and count
            $total = 0;
            $count = 0;
            if ($purchases) {
                foreach ($purchases as $purchase) {
                    $total += $purchase->price;
                    $count++;
                }
            }
    
            // Create a purchase object
            $purchase = new stdClass();
            $purchase->total = $total;
            $purchase->count = $count;
    
            return $purchase;
        } catch (Exception $e) {
            // Handle any exceptions
            error_log("Error in get_this_month_video_purchases: " . $e->getMessage());
    
            // Return an empty purchase object indicating failure
            return (object) ['total' => 0, 'count' => 0];
        }
    }

    public function get_last_month_model_paper_purchases()
    {
        try {
            // Get this month's model paper purchases along with their prices
            $query = "SELECT mp.model_paper_content_id, mp.price 
                      FROM purchased_model_papers pmp 
                      JOIN model_paper_content mp ON pmp.model_paper_content_id = mp.model_paper_content_id 
                      WHERE pmp.purchased_date >= CURDATE() - INTERVAL 1 MONTH";
            $purchases = $this->query($query);
    
            // Calculate total price and count
            $total = 0;
            $count = 0;
            if ($purchases) {
                foreach ($purchases as $purchase) {
                    $total += $purchase->price;
                    $count++;
                }
            }
    
            // Create a purchase object
            $purchase = new stdClass();
            $purchase->total = $total;
            $purchase->count = $count;
    
            return $purchase;
        } catch (Exception $e) {
            // Handle any exceptions
            error_log("Error in get_this_month_model_paper_purchases: " . $e->getMessage());
    
            // Return an empty purchase object indicating failure
            return (object) ['total' => 0, 'count' => 0];
        }
    }


        public function sql_backup()
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        $backupFileName = 'iqube_backup_' . date('Y-m-d_H-i-s') . '.sql';

        // Full path to the backup file
        define('BACKUP_FILE_PATH', BACKUP_DIRECTORY . '/' . $backupFileName);
        
        // Command to execute
        $command = PATH_MYSQLDUMP." --user=".DB_USER." --password=".DB_PASS." ".DB_NAME." > ".BACKUP_FILE_PATH;
        
        // Execute the command
        exec($command, $output, $return_var);
        
        // Check if the command executed successfully
        if ($return_var === 0) {
            echo "Database backup successful. Backup saved as: {$backupFileName}";
        } else {
            echo "Error occurred during database backup.";
        }
    }
    public function get_premium_purchases()
    {
        try {
            // Get premium student purchases with their names and purchase date
            $query = "
                SELECT s.student_id, s.email, CONCAT(ps.fname, ' ', ps.lname) AS name, ps.purchased_date
                FROM students AS s 
                INNER JOIN premium_students AS ps ON s.student_id = ps.student_id
                WHERE s.premium = 1
            ";
    
            // Execute the query
            $purchases = $this->query($query);
    
            // Check if any purchases found
            if (!$purchases) {
                throw new Exception("No premium purchases found.");
            }
    
            return $purchases;
        } catch (Exception $e) {
            // Log or handle the error appropriately
            error_log("Error in get_premium_purchases(): " . $e->getMessage());
            return false;
        }
    }

    public function get_video_purchases()
    {
        try {
            // Get all purchased videos with student ID, tutor ID, price, and names
            $query = "
                SELECT pv.video_content_id, pv.student_id, pv.purchased_date, vc.tutor_id, vc.price, 
                       CONCAT(t.fname, ' ', t.lname) AS tutor_name,
                       CONCAT(ps.fname, ' ', ps.lname) AS student_name
                FROM purchased_videos AS pv
                INNER JOIN video_content AS vc ON pv.video_content_id = vc.video_content_id
                LEFT JOIN tutors AS t ON vc.tutor_id = t.tutor_id
                LEFT JOIN premium_students AS ps ON pv.student_id = ps.student_id
            ";
    
            // Execute the query
            $purchases = $this->query($query);
    
            // Check if any purchases found
            if (!$purchases) {
                throw new Exception("No video purchases found.");
            }
    
            return $purchases;
        } catch (Exception $e) {
            // Log or handle the error appropriately
            error_log("Error in get_video_purchases(): " . $e->getMessage());
            return false;
        }
    }

    public function get_model_paper_purchase()
    {
        try {
         // Get all purchased videos with student ID, tutor ID, price, and names
            $query = "
                SELECT pmp.model_paper_content_id, pmp.student_id, pmp.purchased_date, mpc.tutor_id, mpc.price, 
                       CONCAT(t.fname, ' ', t.lname) AS tutor_name,
                       CONCAT(ps.fname, ' ', ps.lname) AS student_name
                FROM purchased_model_papers AS pmp
                INNER JOIN model_paper_content AS mpc ON pmp.model_paper_content_id = mpc.model_paper_content_id
                LEFT JOIN tutors AS t ON mpc.tutor_id = t.tutor_id
                LEFT JOIN premium_students AS ps ON pmp.student_id = ps.student_id
            ";
    
            // Execute the query
            $purchases = $this->query($query);
    
            // Check if any purchases found
            if (!$purchases) {
                throw new Exception("No model paper purchases found.");
            }
    
            return $purchases;
        } catch (Exception $e) {
            // Log or handle the error appropriately
            error_log("Error in get_model_paper_purchase(): " . $e->getMessage());
            return false;
        }
    }

    public function get_available_subject_count()
    {
        // Get the count of available subjects
        $query = "SELECT COUNT(*) AS available_subjects FROM subjects";
        $result = $this->query($query);
    
        // Check if the query was successful
        if ($result) {
            return $result[0]->available_subjects;
        } else {
            return 0;
        }
    }

    public function get_total_content_count()
    {
        // Get the count of video content
        $count = 0;
        $query = "SELECT COUNT(*) AS total_content FROM video_content";
        $result = $this->query($query);
        if ($result) {
            $count = $result[0]->total_content;
        }


       //get the count of model paper content
        $query = "SELECT COUNT(*) AS total_content FROM model_paper_content";
        $result = $this->query($query);
        if ($result) {
            $count += $result[0]->total_content;
        }

        return $count;
    }
    

    public function validate_password($password)
    {
       $query = "SELECT password FROM admins WHERE email = :email";
         $row = $this->query($query, ['email' => $_SESSION['USER_DATA']['email']]);
            if(!empty($row) && !password_verify($password, $row[0]->password)){
                $this->errors['mismatch_err'] = 'Wrong user credentials*';
                return false;
            }
            return true;
          

    }

    public function get_backup_files()
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        // Get all backup files
        $backupFiles = scandir(BACKUP_DIRECTORY);
    
        // Remove . and .. from the list
        $backupFiles = array_diff($backupFiles, ['.', '..']);
    
        return $backupFiles;
    }

    public function download_backup($backupFile)
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        // Full path to the backup file
        $backupFilePath = BACKUP_DIRECTORY . '/' . $backupFile;
    
        // Check if the file exists
        if (file_exists($backupFilePath)) {
            // Set the headers
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($backupFilePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($backupFilePath));
    
            // Read the file
            readfile($backupFilePath);
            exit;
        } else {
            // Redirect to the backup page
            header('Location: ' . URLROOT . '/admin/site_backups');
        }
    }


    public function deactivate_subject_admin($id)
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        // Deactivate the subject admin
        $query = "UPDATE subject_admins SET active = 0 WHERE user_id = :id";
        $result = $this->query($query, ['id' => $id]);
    
        return true;
    }

    public function activate_subject_admin($id)
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        // Activate the subject admin
        $query = "UPDATE subject_admins SET active = 1 WHERE user_id = :id";
        $result = $this->query($query, ['id' => $id]);
    
        return true;
    }

    public function deactivate_tutor($id)
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        // Deactivate the tutor
        $query = "UPDATE tutors SET active = 0 WHERE user_id = :id";
        $result = $this->query($query, ['id' => $id]);
    
        return true;
    }

    public function activate_tutor($id)
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        // Activate the tutor
        $query = "UPDATE tutors SET active = 1 WHERE user_id = :id";
        $result = $this->query($query, ['id' => $id]);
    
        return true;
    }

    public function change_password($current, $new)
    {
        if(!Auth::is_logged_in() || !Auth::is_admin()) {
            return false;
        }
        // Get the current password hash
        $query = "SELECT password FROM admins WHERE email = :email";
        $row = $this->query($query, ['email' => $_SESSION['USER_DATA']['email']]);
    
        // Check if the current password is correct
        if (!empty($row) && password_verify($current, $row[0]->password)) {
            // Hash the new password
            $newPassword = password_hash($new, PASSWORD_DEFAULT);
    
            // Update the password
            $query = "UPDATE admins SET password = :password WHERE email = :email";
            $result = $this->query($query, ['password' => $newPassword, 'email' => $_SESSION['USER_DATA']['email']]);
    
            return true;
        } else {
            // Set an error message
            $this->errors['mismatch_err'] = 'Wrong user credentials';
            return false;
        }
    }
    


}