<?php
class Admins extends Model 
{
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
        // Set backup file name with timestamp
        $backup_file = 'backup-' . date("Y-m-d-H-i-s") . '.sql';
    
        // Adjust the path format for Windows
        $backup_file_path = 'C:\\xampp\\htdocs\\iqube\\' . $backup_file;
    
        // Enclose DB credentials in double quotes
        $command = PATH_MYSQLDUMP . " --opt -h\"" . DB_HOST . "\" -u\"" . DB_USER . "\" -p\"" . DB_PASS . "\" " . DB_NAME . " > $backup_file_path";    
        // Execute the command and capture both standard output and standard error
        system($command);
    
        // Check if the backup file was created successfully
        if (file_exists($backup_file_path)) {
            return $backup_file;
        } else {
            echo "Error: Backup file was not created!";
            return false;
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
    
    
    
    
  
    
    
    
    


}