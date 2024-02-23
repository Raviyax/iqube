<?php
class Students extends Model {

    public $errors;
 
    public function complete_profile(){
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $this->query("UPDATE students SET subjects = '$_POST[subjects]', completed = 1 WHERE student_id = $student_id");
        $_SESSION['USER_DATA']['completed'] = 1;
        header('location:'.$_SERVER['HTTP_REFERER']);
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

    public function upgrade_to_premium($payment_id){
        $this->query("UPDATE students SET premium = 1 WHERE student_id = $_SESSION[USER_DATA][student_id]");
        $_SESSION['USER_DATA']['premium'] = 1;
        //update payment_id to premium_payments table where student_id = $_SESSION[USER_DATA][student_id]
        $this->query("UPDATE premium_payments SET payment_id = $payment_id WHERE student_id = $_SESSION[USER_DATA][student_id]");
     
        return true;
    
       
    }
}