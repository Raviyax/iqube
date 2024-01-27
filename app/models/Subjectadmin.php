<?php
class Subjectadmin extends Model
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

   
    public function get_subject_admins($subject=null)
    {
        if($subject!=null){
            return $this->query("SELECT * FROM subject_admins WHERE subject='$subject'");
        }else{
            return $this->query("SELECT * FROM subject_admins");
        }
    }

    public function add_new_subject_admin($data)
    {
        if ($this->validate($data)) {
            $this->query("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)", [
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'role' => 'subject_admin'
            ]);
            $row = $this->first([
                'email' => $data['email']
            ], 'users', 'user_id');
            $this->query("INSERT INTO subject_admins (user_id,subject,fname,lname,username,email,cno) VALUES (:user_id,:subject,:fname,:lname,:username,:email,:cno)", [
                'user_id' => $row->user_id,
                'subject' => $data['subject'],
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'username' => $data['username'],
                'email' => $data['email'],
                'cno' => $data['cno']
            ]);
            return true;
        }
        
}

public function get_subject_admin($id)
{
    return $this->first([
        'subject_admin_id' => $id
    ], 'subject_admins', 'subject_admin_id');

}

public function update_subject_admin($data, $id)
{
    
   
        $this->query("UPDATE users SET email=?, username=? WHERE email=?", [
            $data['email'],
            $data['username'],
            $data['email']
        ]);
        $this->query("UPDATE subject_admins SET email=?, username=?, fname=?, lname=?, cno=? WHERE subject_admin_id=?", [
            $data['email'],
            $data['username'],
            $data['fname'],
            $data['lname'],
            $data['cno'],
            $id
        ]);
        return true;
   
}
public function update_profile($data, $id)
{
    
   
    $this->query("UPDATE users SET email=?, username=? WHERE email=?", [
        $data['email'],
        $data['username'],
        $data['email']
    ]);
    $this->query("UPDATE subject_admins SET email=?, username=?, fname=?, lname=?, cno=? WHERE subject_admin_id=?", [
        $data['email'],
        $data['username'],
        $data['fname'],
        $data['lname'],
        $data['cno'],
        $id
    ]);

    $_SESSION['USER_DATA']['username'] = $data['username'];
    $_SESSION['USER_DATA']['fname'] = $data['fname'];
    $_SESSION['USER_DATA']['lname'] = $data['lname'];
    $_SESSION['USER_DATA']['cno'] = $data['cno'];

    
    return true;

}

public function view_tutors($subject)
{
    return $this->query("SELECT * FROM tutors WHERE subject='$subject'");
}

public function save_image_data($imagename,$id)
{
    $this->query("UPDATE subject_admins SET image=? WHERE subject_admin_id=?", [
        $imagename,
        $id
    ]);
    return true;
}
}

