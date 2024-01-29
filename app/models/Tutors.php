<?php
class Tutors extends Model
{
    public $errors = [];
    public function validate($data)
    {
        $this->errors = [];
        if (empty($data['username'])) {
            $this->errors['name_err'] = '*Enter name';
        }
        if (empty($data['fname'])) {
            $this->errors['name_err'] = '*Enter First name';
        }
        if (empty($data['lname'])) {
            $this->errors['name_err'] = '*Enter Last name';
        }
        if (empty($data['cno'])) {
            $this->errors['name_err'] = '*Enter Contact Number';
        }
        $query = "SELECT * FROM users WHERE email = :email";
        if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
            $this->errors['email_err'] = '*Invalid Email';
        } elseif ($this->query($query, ['email' => $data['email']])) {
            $this->errors['email_err'] = '*Email already taken';
        }
        if (empty($data['password'])) {
            $this->errors['password_err'] = '*Please enter password';
        } elseif (strlen($data['password']) < 6) {
            $this->errors['password_err'] = '*Password must be at least 6 characters';
        }
        if (empty($data['confirm_password'])) {
            $this->errors['confirm_password_err'] = '*Please confirm password';
        } else {
            if ($data['password'] != $data['confirm_password']) {
                $this->errors['confirm_password_err'] = '*Passwords do not match';
            }
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
public function get_tutors($subject=null)
{
    if($subject==null){
        $query = "SELECT * FROM tutors";
        return $this->query($query);
    }
    else{
        $query = "SELECT * FROM tutors WHERE subject = :subject";
        return $this->query($query,['subject'=>$subject]);
    }
}
public function get_tutor_count_subject_vise(){
    $query = "SELECT subject,COUNT(*) as count FROM tutors GROUP BY subject";
    return $this->query($query);
}
public function get_tutor($id)
{
    return $this->first([
        'tutor_id' => $id
    ], 'tutors', 'tutor_id');
}
}
