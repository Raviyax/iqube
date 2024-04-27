<?php
class User extends Model
{
    public $errors = [];
    public $login_errors = [];
    public function validate($data)
    {
        $this->errors = [];
        $query = "SELECT * FROM users WHERE username = :username";
        if (empty($data['username'])) {
            $this->errors['name_err'] = '*Enter name';
        }
        elseif ($this->query($query, ['username' => $data['username']])) {
            $this->errors['name_err'] = '*Username already taken';
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
        if (empty($data['terms'])) {
            $this->errors['terms_err'] = '*Please accept terms and conditions';
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
    public function validate_admin_login($data)
    {
        $this->login_errors = [];
        $query = "SELECT * FROM admins WHERE email = :email";
        if (empty($data['email'])) {
            $this->login_errors['email_err'] = 'Please enter email*';
        } elseif (!$this->query($query, ['email' => $data['email']])) {
            $this->login_errors['mismatch_err'] = '*Wrong user credentials';
        }
        if (empty($data['password'])) {
            $this->login_errors['password_err'] = 'Please enter password*';
        }
        if(!empty($data['email']) && !empty($data['password'])){
            $row = $this->query($query, ['email' => $data['email']]);
            if(!empty($row) && !password_verify($data['password'], $row[0]->password)){
                $this->login_errors['mismatch_err'] = 'Wrong user credentials*';
            }
        }
        if (empty($this->login_errors)) {
            return $row;
        }
        return false;
    }
    public function load_user_data($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $row = $this->query($query, ['email' => $email]);
        return $row;
    }
    public function load_tutor_data($email)
    {
        $query = "SELECT * FROM tutors WHERE email = :email";
        $row = $this->query($query, ['email' => $email]);
        return $row;
    }
    public function validate_tutor_login($data)
    {
        $this->login_errors = [];
        $query = "SELECT * FROM users WHERE email = :email AND role = 'tutor'";
        if (empty($data['email'])) {
            $this->login_errors['email_err'] = 'Please enter email*';
        } elseif (!$this->query($query, ['email' => $data['email']])) {
            $this->login_errors['mismatch_err'] = '*Wrong user credentials';
        }
        if (empty($data['password'])) {
            $this->login_errors['password_err'] = 'Please enter password*';
        }
        if(!empty($data['email']) && !empty($data['password'])){
            $row = $this->query($query, ['email' => $data['email']]);
            if(!empty($row) && !password_verify($data['password'], $row[0]->password)){
                $this->login_errors['mismatch_err'] = 'Wrong user credentials*';
            }
        }
        if (empty($this->login_errors)) {
            return $row;
        }
        return false;
    }
    public function validate_subject_admin_login($data)
    {
        $this->login_errors = [];
        $query = "SELECT * FROM users WHERE email = :email AND role = 'subject_admin'";
        if (empty($data['email'])) {
            $this->login_errors['email_err'] = 'Please enter email*';
        } elseif (!$this->query($query, ['email' => $data['email']])) {
            $this->login_errors['mismatch_err'] = '*Wrong user credentials';
        }
        if (empty($data['password'])) {
            $this->login_errors['password_err'] = 'Please enter password*';
        }
        if(!empty($data['email']) && !empty($data['password'])){
            $row = $this->query($query, ['email' => $data['email']]);
            $query = "SELECT active FROM subject_admins WHERE email = :email";
            $active = $this->query($query, ['email' => $data['email']]);
            $row[0]->active = $active[0]->active;
            if(!empty($row) && !password_verify($data['password'], $row[0]->password)){
                $this->login_errors['mismatch_err'] = 'Wrong user credentials*';
            }
            if(!empty($row) && $row[0]->active == 0){
                $this->login_errors['inactive_err'] = 'Your account is inactive. Please contact the admin';
            }
        }
        if (empty($this->login_errors)) {
            return $row;
        }
        return false;
    }
    public function load_subject_admin_data($email)
    {
        $query = "SELECT * FROM subject_admins WHERE email = :email";
        $row = $this->query($query, ['email' => $email]);
        return $row;
    }
    public function google_recaptcha($google_captcha) {
        // Your Google reCAPTCHA secret key
        $secretKey = "6Lf_GGMpAAAAADDck4EoTxHqZMkgdvsuMPm_ZDHg";
        // Google reCAPTCHA verification endpoint
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $google_captcha;
        // Use cURL for making the HTTP request
        $ch = curl_init($url);
        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Execute the cURL request
        $response = curl_exec($ch);
        // Check for cURL errors
        if (curl_errno($ch)) {
            // Handle cURL error (e.g., log, return an error response, etc.)
            curl_close($ch);
            return false;
        }
        // Close cURL session
        curl_close($ch);
        // Decode the JSON response
        $responseKeys = json_decode($response, true);
        // Check if the verification was successful
        return isset($responseKeys["success"]) && $responseKeys["success"];
    }
}
