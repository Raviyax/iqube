<?php
class Students extends Model {
    public $errors;
public function complete_profile($data){
        $student_id = $_SESSION['USER_DATA']['student_id'];
        //separate the subjects with a comma
        $subjects = implode(',', $data['subject']);
        if($this->query("UPDATE students SET subjects = :subjects WHERE student_id = $student_id", ['subjects' => $subjects])){
            //update completed to 1
            $this->query("UPDATE students SET completed = 1 WHERE student_id = $student_id");
            $_SESSION['USER_DATA']['completed'] = 1;
        }
        $_SESSION['USER_DATA']['subjects'] = $data['subject'];

        return true;
    }
    public function insert_to_premium_students($data){
        $this->query("INSERT INTO premium_students (student_id, fname, lname, cno, address, city) VALUES (:student_id, :fname, :lname, :cno, :address, :city)" , [
            'student_id' => $_SESSION['USER_DATA']['student_id'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'cno' => $data['cno'],
            'address' => $data['address'],
            'city' => $data['city']
        ]);
        return true;
    }
    public function validate_insert_to_premium_students($data){
        if(empty($data['fname'])){
            $this->errors['fname'] = 'First name is required';
        }
        if(empty($data['lname'])){
            $this->errors['lname'] = 'Last name is required';
        }
        if(empty($data['cno'])){
            $this->errors['cno'] = 'Contact number is required';
        }
        if(empty($data['address'])){
            $this->errors['address'] = 'Address is required';
        }
        if(empty($data['city'])){
            $this->errors['city'] = 'City is required';
        }
        if(empty($this->errors)){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_premium_data($student_id){
        $result = $this->query("SELECT * FROM premium_students WHERE student_id = $student_id");
     if($result){
        if($result[0]->student_id == $student_id){
            return $result[0];
        }
        else{
            return false;
        }
     }
     else{
         return false;
     }
    }
    public function upgrade_to_premium(){
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $this->query("UPDATE students SET premium = 1 WHERE student_id = $student_id");
        $_SESSION['USER_DATA']['premium'] = 1;
        //set prAZ45\'ෛඬඞ]/emium data
        $premium_data = $this->query("SELECT * FROM premium_students WHERE student_id = $student_id");
        $_SESSION['USER_DATA']['fname'] = $premium_data[0]->fname;
        $_SESSION['USER_DATA']['lname'] = $premium_data[0]->lname;
        $_SESSION['USER_DATA']['cno'] = $premium_data[0]->cno;
        $_SESSION['USER_DATA']['address'] = $premium_data[0]->address;
        $_SESSION['USER_DATA']['city'] = $premium_data[0]->city;
        return true;
    }
    //send a verification email to the studentWGTRP
    public function send_verification_email($email) {
        // Generate a random token (16 characters)
        $token = bin2hex(random_bytes(16));
        // Insert the token into the database
        $this->query("UPDATE students SET token = :token WHERE email = :email", ['token' => $token, 'email' => $email]);
        $mail = new Mail();
        // Send the email
        $to = $email;
        $subject = "Email Verification";
        $message = "Click the link below to verify your email address: ";
        $message .= "<a href='" . URLROOT . "/student/verify_email?token=$token&email=$email'>Verify Email</a>";
        $headers = "From: Verify.Iqube\r\n";
        $headers .= "Content-type: text/html\r\n";
        if ($mail->send($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }
    public function verify_email($token, $email) {
        $result = $this->query("SELECT token, email FROM students WHERE token = :token AND email = :email", ['token' => $token, 'email' => $email]);
        if ($result) {
            $this->query("UPDATE students SET verify = 1, token = 'no token' WHERE email = :email", ['email' => $email]);
            return true;
        } else {
            return false;
        }
    }

    public function validate_complete_profile($data){
        if(empty($data['subject'])){
            $this->errors['subjects'] = 'Please select at least one subject';
        }else if(count($data['subject']) > 3){
            $this->errors['subjects'] = 'You can select up to 3 subjects';
        }else{
            //check whether the entered subject_id s tally with the subjects in the database
            $subjects = $this->query("SELECT subject_id FROM subjects");
            $subject_ids = [];
            foreach($subjects as $subject){
                $subject_ids[] = $subject->subject_id;
            }
            foreach($data['subject'] as $subject){
                if(!in_array($subject, $subject_ids)){
                    $this->errors['subjects'] = 'Invalid subject';
                    break;
                }
            }

   }
        if(empty($this->errors)){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_my_subject_names($student_id){
        $subjects = $this->query("SELECT subjects FROM students WHERE student_id = :student_id", ['student_id' => $student_id]);
        if($subjects){
            $subject_ids = explode(',', $subjects[0]->subjects);
            $subject_names = [];
            foreach($subject_ids as $subject_id){
                $subject = $this->query("SELECT subject_name FROM subjects WHERE subject_id = :subject_id", ['subject_id' => $subject_id]);
                if($subject){
                    $subject_names[] = $subject[0]->subject_name;
                }
            }
            return $subject_names;
        }
        else{
            return false;
        }
      
      
    }

   public function get_all_tutors_for_my_subjects($student_id){
       $subjects = $this->query("SELECT subjects FROM students WHERE student_id = :student_id", ['student_id' => $student_id]);
       if($subjects){
           $subject_ids = explode(',', $subjects[0]->subjects);
          // get subject_name for relavant subject_id
            $subject_names = [];
            foreach($subject_ids as $subject_id){
                $subject = $this->query("SELECT subject_name FROM subjects WHERE subject_id = :subject_id", ['subject_id' => $subject_id]);
                if($subject){
                    $subject_names[] = $subject[0]->subject_name;
                }
            }
            //get tutors for each subject
            $tutors = [];
            foreach($subject_names as $subject_name){
                $tutor = $this->query("SELECT fname ,lname ,tutor_id ,subject ,approved_date ,image FROM tutors WHERE subject LIKE :subject_name", ['subject_name' => "%$subject_name%"]);
                if($tutor){
                    $tutors[] = $tutor;
                }
            }
           return $tutors;
       }
       else{
           return false;
       }
   }

   public function get_chapters_for_subject()
   {  //get chapter level 1 and level 2 groups by chapter level 1 wher subject equals to the subject of the tutor
       $query = "SELECT
       id,
       chapter_level_1,
       chapter_level_2,
       weight
   FROM
       chapters
   WHERE
       subject = :subject
   ORDER BY
       chapter_level_1,
       weight";
   ;
   
       return $this->query($query, ['subject' => $_SESSION['USER_DATA']['subject']]);
   }

   public function get_chapters_for_my_subjects(){
    
    $my_subjects = $this->get_my_subject_names($_SESSION['USER_DATA']['student_id']);
    //get chapters for each subject
    $chapters = [];
    foreach($my_subjects as $subject){
        $chapter = $this->query("SELECT * FROM chapters WHERE subject = :subject", ['subject' => $subject]);
        if($chapter){
            $chapters[] = $chapter;
        }
    }
    return $chapters;

   }

   public function get_videos(){
    // Fetch video uploads
    $query = "SELECT video_content_id, name, thumbnail, price FROM video_content WHERE tutor_id = :tutor_id AND active = 1";
    $result_video_content = $this->query($query, ['tutor_id' => $_SESSION['USER_DATA']['tutor_id']]);
   if (empty($result_video_content)) {
        return [];
    }
    foreach ($result_video_content as &$video_content) {
        $query = "SELECT date FROM mcq_for_video WHERE video_content_id = :video_content_id";
        $result_date = $this->query($query, ['video_content_id' => $video_content->video_content_id]);
        // Check if $result_date is an array before accessing it
        if (is_array($result_date) && !empty($result_date)) {
            $video_content->date = $result_date[0]->date;
            $video_content->type = 'video';
        } else {
            $video_content->date = null; // Set to null or any default value if no date found
        }
    }
    return $result_video_content;
   }
   

}