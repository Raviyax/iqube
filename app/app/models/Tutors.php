<?php
class Tutors extends Model
{
  
    public $errors = [];
    public $emailerrors;
    public $request_errors = [];
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
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
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
    public function get_tutors($subject = null)
    {
        if ($subject == null) {
            $query = "SELECT * FROM tutors";
            return $this->query($query);
        } else {
            $query = "SELECT * FROM tutors WHERE subject = :subject";
            return $this->query($query, ['subject' => $subject]);
        }
    }
    public function get_tutor_count_subject_vise()
    {
        $query = "SELECT subject,COUNT(*) as count FROM tutors GROUP BY subject";
        return $this->query($query);
    }
    public function get_tutor($id)
    {
        return $this->first([
            'tutor_id' => $id
        ], 'tutors', 'tutor_id');
    }
    public function add_new_tutor($data)
    {
        if ($this->validate($data)) {
            $this->query("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)", [
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'role' => 'tutor'
            ]);
            $row = $this->first([
                'email' => $data['email']
            ], 'users', 'user_id');
            $this->query("INSERT INTO tutors (user_id, subject, fname, lname, username, email, cno) VALUES (:user_id, :subject, :fname, :lname, :username, :email, :cno)", [
                'user_id' => $row->user_id,
                'subject' => $_SESSION['USER_DATA']['subject'],
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'username' => $data['username'],
                'email' => $data['email'],
                'cno' => $data['cno']
            ]);
            return true;
        }
        return false;
    }
    public function validate_email_change($data)
    {
        $this->emailerrors = [];
        $query = "SELECT * FROM users WHERE email = :email";
        $data['email'];
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->emailerrors['email_err'] = '*Invalid Email';
        } elseif ($result = $this->query($query, ['email' => $data['email']])) {
            if (!empty($result)) {
                $this->emailerrors['email_err'] = '*Email already taken';
            }
        }
        if (empty($data['confirmemail'])) {
            $this->emailerrors['confirm_email_err'] = '*Please confirm email';
        } else {
            if ($data['email'] != $data['confirmemail']) {
                $this->emailerrors['confirm_email_err'] = '*Emails do not match';
            }
        }
        if (empty($data['subjectadminpassword'])) {
            $this->emailerrors['password_err'] = '*Please enter password';
        } elseif (!password_verify($data['subjectadminpassword'], $_SESSION['USER_DATA']['password'])) {
            $this->emailerrors['password_err'] = '*Wrong Password';
        }
        if (empty($this->emailerrors)) {
            return true;
        }
        print_r($this->emailerrors);
        return false;
    }
    public function update_tutor_email($data, $id)
    {
        if ($this->validate_email_change($data)) {
            $this->query("UPDATE users SET email = :email WHERE user_id = :user_id", [
                'email' => $data,
                'user_id' => $id
            ]);
            $this->query("UPDATE tutors SET email = :email WHERE user_id = :user_id", [
                'email' => $data,
                'user_id' => $id
            ]);
            return true;
        }
        return false;
    }
    public function validate_tutor_requests($data, $cvdata)
    {
        $this->request_errors = [];
        $query = "SELECT * FROM users WHERE username = :username";
        if (empty($data['fname'])) {
            $this->request_errors['fname_err'] = '*Enter First name';
        }
        if (empty($data['lname'])) {
            $this->request_errors['lname_err'] = '*Enter Last name';
        }
        if (empty($data['username'])) {
            $this->request_errors['uname_err'] = '*Enter name';
        } elseif ($this->query($query, ['username' => $data['username']])) {
            $this->request_errors['uname_err'] = '*Username already taken';
        }
        $query = "SELECT * FROM users WHERE email = :email";
        if (empty($data['email'])) {
            $this->request_errors['email_err'] = '*Enter email';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->request_errors['email_err'] = '*Invalid Email';
        } elseif ($this->query($query, ['email' => $data['email']])) {
            $this->request_errors['email_err'] = '*Email already taken';
        }
        if (empty($data['cno'])) {
            $this->request_errors['cno_err'] = '*Enter contact number';
        }
        if (empty($data['subject'])) {
            $this->request_errors['subject_err'] = '*Please choose a subject';
        }
        if (empty($data['qualification'])) {
            $this->request_errors['qualification_err'] = '*Please choose a qualification';
        }
        if (empty($cvdata)) {
            $this->request_errors['file_err'] = '*Please upload your CV';
        } elseif ($cvdata['size'] > 1000000) {
            $this->request_errors['file_err'] = '*File size too large';
        }
        if (empty($data['terms'])) {
            $this->request_errors['terms_err'] = '*Please accept terms and conditions';
        }
        if (empty($this->request_errors)) {
            return true;
        }
        return false;
    }
    public function make_a_tutor_request($data, $cv)
    {
        $this->query("INSERT INTO tutor_requests (subject, fname, lname, username, email, cno, qualification, cv,message) VALUES (:subject, :fname, :lname, :username, :email, :cno, :qualification, :cv, :message)", [
            'subject' => $data['subject'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'cno' => $data['cno'],
            'qualification' => $data['qualification'],
            'cv' => $cv,
            'message' => $data['message']
        ]);
        return true;
    }
    public function verify_token($email, $password)
    {
        //check whether the email and password are correct
        $query = "SELECT email, password FROM users WHERE email = :email";
        $result = $this->query($query, ['email' => $email]);
        if ($result) {
            if (password_verify($password, $result[0]->password)) {
                return true;
            }
          
        }
       echo 'Invalid verification link';
    }
    public function set_tutor_active($email)
    {
        $query = "UPDATE tutors SET active = 1 WHERE email = :email";
        $this->query($query, ['email' => $email]);
    }
    public function is_activated($email)
    {
        $query = "SELECT active FROM tutors WHERE email = :email";
        $result = $this->query($query, ['email' => $email]);
        if(!$result){
            return false;
        }
        if ($result[0]->active == 1) {
            return true;
        }
     
        return false;
    }
    public function validate_new_password($data)
    {
        $this->errors = [];
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
    public function create_new_password($password, $email)
    {
        $query = "UPDATE users SET password = :password WHERE email = :email";
        $this->query($query, ['password' => password_hash($password, PASSWORD_DEFAULT), 'email' => $email]);
        return true;
    }
    public function get_chapters()
    {  //get chapter level 1 and level 2 groups by chapter level 1 wher subject equals to the subject of the tutor
        $query = "SELECT
        chapter_level_1,
        GROUP_CONCAT(CONCAT(id, '-->>', chapter_level_2) SEPARATOR '--->>>') AS chapter_level_2_list_with_id
    FROM
        chapters
    WHERE
        subject = :subject
    GROUP BY
        chapter_level_1";
        return $this->query($query, ['subject' => $_SESSION['USER_DATA']['subject']]);
    }
    public function insert_to_video_content($data, $video, $thumbnail)
    {
        //generate uniqe string in 16 characters for video_content_id
        $video_content_id = bin2hex(random_bytes(8));
        $this->query("INSERT INTO video_content (video_content_id, tutor_id, name, subject, description, video, thumbnail, price, covering_chapters) VALUES (:video_content_id, :tutor_id, :name, :subject, :description, :video, :thumbnail, :price, :covering_chapters)", [
            'tutor_id' => $_SESSION['USER_DATA']['tutor_id'],
            'name' => $data['name'],
            'subject' => $_SESSION['USER_DATA']['subject'],
            'description' => $data['description'],
            'video' => $video,
            'thumbnail' => $thumbnail,
            'price' => $data['price'],
            'covering_chapters' => $data['subOption'],
            'video_content_id' => $video_content_id
        ]);
        return $video_content_id;
    }
    public function validate_insert_to_video_content($data, $video, $thumbnail)
    {
        $this->errors = [];
        if (empty($data['name'])) {
            $this->errors['name_err'] = '*Enter name';
        }
        if (empty($data['description'])) {
            $this->errors['description_err'] = '*Enter description';
        }
        if (empty($data['price'])) {
            $this->errors['price_err'] = '*Enter price';
        }
        if (empty($video)) {
            $this->errors['video_err'] = '*Please upload a video';
        } elseif ($video['size'] > 100000000) {
            $this->errors['video_err'] = '*File size too large';
        }
        if (empty($thumbnail)) {
            $this->errors['thumbnail_err'] = '*Please upload a thumbnail';
        } elseif ($thumbnail['size'] > 1000000) {
            $this->errors['thumbnail_err'] = '*File size too large';
        }
        if (empty($data['subOption'])) {
            $this->errors['subOption_err'] = '*Please select at least 1 chapter';
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
    public function is_video_content_id_exists_and_not_active($video_content_id)
    {
        $query = "SELECT * FROM video_content WHERE video_content_id = :video_content_id AND tutor_id = :tutor_id AND active = 0";
        $result = $this->query($query, ['video_content_id' => $video_content_id, 'tutor_id' => $_SESSION['USER_DATA']['tutor_id']]);
        if ($result) {
            return true;
        }
        return false;
    }
    public function validate_insert_to_mcq_for_video($data)
    {
        $this->errors = [];
        $i = 1;
        while (isset($data[$i . 'question'])) {
            if (empty($data[$i . 'question'])) {
                $this->errors[$i . 'question_err'] = '*Enter the question';
            }
            if (empty($data[$i . 'option1'])) {
                $this->errors[$i . 'option1_err'] = '*Enter option 1';
            }
            if (empty($data[$i . 'option2'])) {
                $this->errors[$i . 'option2_err'] = '*Enter option 2';
            }
            if (empty($data[$i . 'option3'])) {
                $this->errors[$i . 'option3_err'] = '*Enter option 3';
            }
            if (empty($data[$i . 'option4'])) {
                $this->errors[$i . 'option4_err'] = '*Enter option 4';
            }
            if (empty($data[$i . 'option5'])) {
                $this->errors[$i . 'option5_err'] = '*Enter option 5';
            }
            if (empty($data[$i . 'correct'])) {
                $this->errors[$i . 'correct_err'] = '*Select the correct answer';
            }
            $i++;
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
    public function insert_to_mcq_for_video($data, $video_content_id)
    {
        $i = 1;
        while (isset($data[$i . 'question'])) {
            $this->query("INSERT INTO mcq_for_video (video_content_id, tutor_id, question, option1, option2, option3, option4, option5, correct) VALUES (:video_content_id, :tutor_id, :question, :option1, :option2, :option3, :option4, :option5, :correct)", [
                'video_content_id' => $video_content_id,
                'question' => $data[$i . 'question'],
                'option1' => $data[$i . 'option1'],
                'option2' => $data[$i . 'option2'],
                'option3' => $data[$i . 'option3'],
                'option4' => $data[$i . 'option4'],
                'option5' => $data[$i . 'option5'],
                'correct' => $data[$i . 'correct'],
                'tutor_id' => $_SESSION['USER_DATA']['tutor_id']
            ]);
            $i++;
        }
        return true;
    }
    //update the videio_content active status to 1
    public function set_video_content_active($video_content_id)
    {
        $query = "UPDATE video_content SET active = 1 WHERE video_content_id = :video_content_id";
        $this->query($query, ['video_content_id' => $video_content_id]);
        return true;
    }
    public function get_my_videos()
    {
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
    public function get_my_model_papers()
    {
        $query = "SELECT model_paper_content_id, name, thumbnail, price FROM model_paper_content WHERE tutor_id = :tutor_id AND active = 1";
        $result_model_paper_content = $this->query($query, ['tutor_id' => $_SESSION['USER_DATA']['tutor_id']]);
        if (empty($result_model_paper_content)) {
            return [];
        }
        foreach ($result_model_paper_content as &$model_paper_content) {
            $query = "SELECT date FROM mcqs_for_model_paper WHERE model_paper_content_id = :model_paper_content_id";
            $result_date = $this->query($query, ['model_paper_content_id' => $model_paper_content->model_paper_content_id]);
            if (is_array($result_date) && !empty($result_date)) {
                $model_paper_content->date = $result_date[0]->date;
                $model_paper_content->type = 'Model Paper';
            } else {
                $model_paper_content->date = null; // Set to null or any default value if no date found
            }
        }
        return $result_model_paper_content;
    }
    //function to randomly concatinate model paper and video results
    public function get_my_uploads()
    {
        $video_content = $this->get_my_videos();
        $model_paper_content = $this->get_my_model_papers();
        $result = array_merge($video_content, $model_paper_content);
        shuffle($result);
        return $result;
    }
    public function validate_insert_to_model_paper_content($data, $thumbnail)
    {
        $this->errors = [];
        if (empty($data['name'])) {
            $this->errors['name_err'] = '*Enter name';
        }
        if (empty($data['description'])) {
            $this->errors['description_err'] = '*Enter description';
        }
        if (empty($data['price'])) {
            $this->errors['price_err'] = '*Enter price';
        }
        if (empty($thumbnail)) {
            $this->errors['thumbnail_err'] = '*Please upload a thumbnail';
        } elseif ($thumbnail['size'] > 1000000) {
            $this->errors['thumbnail_err'] = '*File size too large';
        }
        if (empty($data['time_duration'])) {
            $this->errors['time_duration_err'] = '*Enter time duration';
        }
        if (empty($data['subOption'])) {
            $this->errors['subOption_err'] = '*Please select at least 1 chapter';
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
    public function insert_to_model_paper_content($data, $thumbnail)
    {
        $model_paper_content_id = bin2hex(random_bytes(8));
        $this->query("INSERT INTO model_paper_content (model_paper_content_id, tutor_id, name, subject, description, thumbnail, price, covering_chapters, time_duration) VALUES (:model_paper_content_id, :tutor_id, :name, :subject, :description, :thumbnail, :price, :covering_chapters, :time_duration)", [
            'tutor_id' => $_SESSION['USER_DATA']['tutor_id'],
            'name' => $data['name'],
            'subject' => $_SESSION['USER_DATA']['subject'],
            'description' => $data['description'],
            'thumbnail' => $thumbnail,
            'price' => $data['price'],
            'covering_chapters' => $data['subOption'],
            'time_duration' => $data['time_duration'],
            'model_paper_content_id' => $model_paper_content_id
        ]);
        return $model_paper_content_id;
    }
    public function insert_to_model_paper_content_id_exists_and_not_active($model_paper_content_id)
    {
        $query = "SELECT * FROM model_paper_content WHERE model_paper_content_id = :model_paper_content_id AND tutor_id = :tutor_id AND active = 0";
        $result = $this->query($query, ['model_paper_content_id' => $model_paper_content_id, 'tutor_id' => $_SESSION['USER_DATA']['tutor_id']]);
        if ($result) {
            return true;
        }
        return false;
    }
    public function validate_insert_to_questions_for_model_paper($data)
    {
        $this->errors = [];
        $i = 1;
        while (isset($data[$i . 'question'])) {
            if (empty($data[$i . 'question'])) {
                $this->errors[$i . 'question_err'] = '*Enter the question';
            }
            if (empty($data[$i . 'option1'])) {
                $this->errors[$i . 'option1_err'] = '*Enter option 1';
            }
            if (empty($data[$i . 'option2'])) {
                $this->errors[$i . 'option2_err'] = '*Enter option 2';
            }
            if (empty($data[$i . 'option3'])) {
                $this->errors[$i . 'option3_err'] = '*Enter option 3';
            }
            if (empty($data[$i . 'option4'])) {
                $this->errors[$i . 'option4_err'] = '*Enter option 4';
            }
            if (empty($data[$i . 'option5'])) {
                $this->errors[$i . 'option5_err'] = '*Enter option 5';
            }
            if (empty($data[$i . 'correct'])) {
                $this->errors[$i . 'correct_err'] = '*Select the correct answer';
            }
            $i++;
        }

        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
    public function insert_to_mcqs_for_model_paper($data, $model_paper_content_id)
    {
        $i = 1;
        while (isset($data[$i . 'question'])) {
            $this->query("INSERT INTO mcqs_for_model_paper (model_paper_content_id, tutor_id, question, option1, option2, option3, option4, option5, correct) VALUES (:model_paper_content_id, :tutor_id, :question, :option1, :option2, :option3, :option4, :option5, :correct)", [
                'model_paper_content_id' => $model_paper_content_id,
                'question' => $data[$i . 'question'],
                'option1' => $data[$i . 'option1'],
                'option2' => $data[$i . 'option2'],
                'option3' => $data[$i . 'option3'],
                'option4' => $data[$i . 'option4'],
                'option5' => $data[$i . 'option5'],
                'correct' => $data[$i . 'correct'],
                'tutor_id' => $_SESSION['USER_DATA']['tutor_id']
            ]);
            $i++;
        }
        return true;
    }
    public function set_model_paper_content_active($model_paper_content_id)
    {
        $query = "UPDATE model_paper_content SET active = 1 WHERE model_paper_content_id = :model_paper_content_id";
        $this->query($query, ['model_paper_content_id' => $model_paper_content_id]);
        return true;
    }
    public function is_model_paper_content_id_exists_and_not_active($model_paper_content_id)
    {
        $query = "SELECT * FROM model_paper_content WHERE model_paper_content_id = :model_paper_content_id AND tutor_id = :tutor_id AND active = 0";
        $result = $this->query($query, ['model_paper_content_id' => $model_paper_content_id, 'tutor_id' => $_SESSION['USER_DATA']['tutor_id']]);
        if ($result) {
            return true;
        }
        return false;
    }

    public function update_profile_picture($image)
    {
        $this->query("UPDATE tutors SET image = :image WHERE tutor_id = :tutor_id", [
            'image' => $image,
            'tutor_id' => $_SESSION['USER_DATA']['tutor_id']
        ]);
        return true;
    }

    public function update_tutor_profile($data)
    {
        $this->query("UPDATE tutors SET fname = :fname, lname = :lname, cno = :cno, about_me = :about_me WHERE tutor_id = :tutor_id", [
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'cno' => $data['cno'],
            'about_me' => $data['description'],
            'tutor_id' => $_SESSION['USER_DATA']['tutor_id']
        ]);

        return true;
    }

    public function validate_update_tutor_profile($data)
    {
        $this->errors = [];
        if (empty($data['fname'])) {
            $this->errors['name_err'] = '*Enter First name';
        }
        if (empty($data['lname'])) {
            $this->errors['name_err'] = '*Enter Last name';
        }
        if (empty($data['cno'])) {
            $this->errors['name_err'] = '*Enter Contact Number';
        }
        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function updatePassword($oldpassword, $newpassword)
    {
        $query = "SELECT password FROM users WHERE user_id = :user_id";
        $result = $this->query($query, ['user_id' => $_SESSION['USER_DATA']['user_id']]);
        if (password_verify($oldpassword, $result[0]->password)) {
            $query = "UPDATE users SET password = :password WHERE user_id = :user_id";
            $this->query($query, ['password' => password_hash($newpassword, PASSWORD_DEFAULT), 'user_id' => $_SESSION['USER_DATA']['user_id']]);
            return true;
        }
        return false;
    }

    public function get_my_student_count($tutor_id)
    {
        //get all model_paper and video ids of the tutor
        $model_papers = $this->query("SELECT model_paper_content_id FROM model_paper_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $videos = $this->query("SELECT video_content_id FROM video_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $student_count = 0;
        if ($model_papers) {
            foreach ($model_papers as $model_paper) {
                $students = $this->query("SELECT student_id FROM purchased_model_papers WHERE model_paper_content_id = :model_paper_content_id", ['model_paper_content_id' => $model_paper->model_paper_content_id]);
                if ($students) {
                    $student_count += count($students);
                }
            }
        }
        if ($videos) {
            foreach ($videos as $video) {
                $students = $this->query("SELECT student_id FROM purchased_videos WHERE video_content_id = :video_content_id", ['video_content_id' => $video->video_content_id]);
                if ($students) {
                    $student_count += count($students);
                }
            }
        }
        return $student_count;
    }

    public function get_my_content_count($tutor_id)
    {
        //get all model_paper and video ids of the tutor
        $model_papers = $this->query("SELECT model_paper_content_id FROM model_paper_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $videos = $this->query("SELECT video_content_id FROM video_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $content_count = 0;
        if ($model_papers) {
            $content_count += count($model_papers);
        }
        if ($videos) {
            $content_count += count($videos);
        }
        return $content_count;
    }

    public function get_purchase_count_of_my_materials($tutor_id)
    {
        //get all model_paper and video ids of the tutor
        $model_papers = $this->query("SELECT model_paper_content_id FROM model_paper_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $videos = $this->query("SELECT video_content_id FROM video_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $purchase_count = 0;
        if ($model_papers) {
            foreach ($model_papers as $model_paper) {
                $purchases = $this->query("SELECT student_id FROM purchased_model_papers WHERE model_paper_content_id = :model_paper_content_id", ['model_paper_content_id' => $model_paper->model_paper_content_id]);
                if ($purchases) {
                    $purchase_count += count($purchases);
                }
            }
        }
        if ($videos) {
            foreach ($videos as $video) {
                $purchases = $this->query("SELECT student_id FROM purchased_videos WHERE video_content_id = :video_content_id", ['video_content_id' => $video->video_content_id]);
                if ($purchases) {
                    $purchase_count += count($purchases);
                }
            }
        }
        return $purchase_count;
    }

    public function get_my_last_month_earnings($tutor_id)
    {
        //get all model_paper and video ids of the tutor
        $model_papers = $this->query("SELECT model_paper_content_id,price FROM model_paper_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $videos = $this->query("SELECT video_content_id,price FROM video_content WHERE tutor_id = :tutor_id", ['tutor_id' => $tutor_id]);
        $earnings = 0;
        if ($model_papers) {
            foreach ($model_papers as $model_paper) {
                $purchases = $this->query("SELECT student_id FROM purchased_model_papers WHERE model_paper_content_id = :model_paper_content_id", ['model_paper_content_id' => $model_paper->model_paper_content_id]);
                if ($purchases) {
                    $earnings += count($purchases) * $model_paper->price;
                }
            }
        }
        if ($videos) {
            foreach ($videos as $video) {
                $purchases = $this->query("SELECT student_id FROM purchased_videos WHERE video_content_id = :video_content_id", ['video_content_id' => $video->video_content_id]);
                if ($purchases) {
                    $earnings += count($purchases) * $video->price;
                }
            }
        }
        //detuct 20% commission
        $earnings = $earnings - ($earnings * 0.2);
        return $earnings;
    }


    public function get_my_video_analytics($tutor_id)
    {
        try {
            // Query to fetch video analytics with purchase count and revenue
            $sql = "SELECT vc.video_content_id, vc.name, vc.price, vc.active,
                           IFNULL(COUNT(pv.student_id), 0) AS purchase_count,
                           IFNULL(SUM(IF(pv.student_id IS NULL, 0, vc.price * 0.8)), 0) AS revenue
                    FROM video_content vc
                    LEFT JOIN purchased_videos pv ON vc.video_content_id = pv.video_content_id
                    WHERE vc.tutor_id = :tutor_id
                    GROUP BY vc.video_content_id";

            // Execute the query
            $videos = $this->query($sql, ['tutor_id' => $tutor_id]);

            // Return video analytics
            return $videos;
        } catch (Exception $e) {
            // Log or handle the error
            error_log('Error in get_my_video_analytics function: ' . $e->getMessage());
            // Return an empty array or throw a custom exception
            return [];
        }
    }

    public function get_my_model_paper_analytics($tutor_id)
    {
        try {
            // Query to fetch model paper analytics with purchase count and revenue
            $sql = "SELECT mpc.model_paper_content_id, mpc.name, mpc.price, mpc.active,
                           IFNULL(COUNT(pmp.student_id), 0) AS purchase_count,
                           IFNULL(SUM(IF(pmp.student_id IS NULL, 0, mpc.price * 0.8)), 0) AS revenue
                    FROM model_paper_content mpc
                    LEFT JOIN purchased_model_papers pmp ON mpc.model_paper_content_id = pmp.model_paper_content_id
                    WHERE mpc.tutor_id = :tutor_id
                    GROUP BY mpc.model_paper_content_id";

            // Execute the query
            $model_papers = $this->query($sql, ['tutor_id' => $tutor_id]);

            // Return model paper analytics
            return $model_papers;
        } catch (Exception $e) {
            // Log or handle the error
            error_log('Error in get_my_model_paper_analytics function: ' . $e->getMessage());
            // Return an empty array or throw a custom exception
            return [];
        }
    }

    public function is_model_paper_belongs_to_me($model_paper_content_id, $tutor_id)
    {
        // Query to check if the model paper belongs to the tutor
        $sql = "SELECT model_paper_content_id
                FROM model_paper_content
                WHERE model_paper_content_id = :model_paper_content_id
                AND tutor_id = :tutor_id";

        // Execute the query
        $model_paper = $this->query($sql, ['model_paper_content_id' => $model_paper_content_id, 'tutor_id' => $tutor_id]);

        if ($model_paper) {
            return true;
        }
        return false;
    }

    public function get_from_model_paper_content($model_paper_content_id)
    { //get model paper content by model paper content id
        $query = "SELECT * FROM model_paper_content WHERE model_paper_content_id = :model_paper_content_id";
        $model_paper = $this->query($query, ['model_paper_content_id' => $model_paper_content_id]);
        if ($model_paper) {
            return $model_paper[0];
        } else {
            return false;
        }
    }

    public function get_covering_chapters_for_model_paper($model_paper_content_id)
    {
        //get covering chapters for model paper by model paper content id
        $query = "SELECT covering_chapters FROM model_paper_content WHERE model_paper_content_id = :model_paper_content_id";
        $result = $this->query($query, ['model_paper_content_id' => $model_paper_content_id]);
        if ($result) {
            //explode the chapters and return
            $chapter_ids = explode('][', $result[0]->covering_chapters);
            //get chapter names
            $chapters = [];
            foreach ($chapter_ids as $chapter_id) {
                $query = "SELECT chapter_level_1, chapter_level_2 FROM chapters WHERE id = :id";
                $result = $this->query($query, ['id' => $chapter_id]);
                if ($result) {
                    $chapters[] = $result[0];
                }
            }
            return $chapters;
        }
        return false;
    }

    public function get_mcqs_for_model_paper($model_paper_content_id)
    {
        //get mcqs for model paper by model paper content id
        $query = "SELECT * FROM mcqs_for_model_paper WHERE model_paper_content_id = :model_paper_content_id";
        $mcqs = $this->query($query, ['model_paper_content_id' => $model_paper_content_id]);
        if ($mcqs) {
            return $mcqs;
        }
        return false;
    }

    public function update_model_paper_duration($model_paper_content_id, $time_duration)
    {
        // Validate time duration
        if (!is_numeric($time_duration) || $time_duration < 0) {
            // If time duration is not numeric or negative, return false
            return false;
        }
    
        // Construct SQL query
        $query = "UPDATE model_paper_content SET time_duration = :time_duration WHERE model_paper_content_id = :model_paper_content_id";
    
        // Execute the query with parameters
        $this->query($query, ['time_duration' => $time_duration, 'model_paper_content_id' => $model_paper_content_id]);
    
        // Return true to indicate successful update
        return true;
    }

    public function update_model_paper_description($model_paper_content_id, $description)
    {
        // Construct SQL query
        $query = "UPDATE model_paper_content SET description = :description WHERE model_paper_content_id = :model_paper_content_id";
    
        // Execute the query with parameters
        $this->query($query, ['description' => $description, 'model_paper_content_id' => $model_paper_content_id]);
    
        // Return true to indicate successful update
        return true;
    }

    public function update_model_paper_thumbnail($model_paper_content_id, $thumbnail)
    {
        // Construct SQL query
        $query = "UPDATE model_paper_content SET thumbnail = :thumbnail WHERE model_paper_content_id = :model_paper_content_id";
    
        // Execute the query with parameters
        $this->query($query, ['thumbnail' => $thumbnail, 'model_paper_content_id' => $model_paper_content_id]);
    
        // Return true to indicate successful update
        return true;
    }

    public function activate_model_paper($model_paper_content_id)
    {
        // Construct SQL query
        $query = "UPDATE model_paper_content SET active = 1 WHERE model_paper_content_id = :model_paper_content_id";
    
        // Execute the query with parameters
        $this->query($query, ['model_paper_content_id' => $model_paper_content_id]);
    
        // Return true to indicate successful activation
        return true;
    }

    public function deactivate_model_paper($model_paper_content_id)
    {
        // Construct SQL query
        $query = "UPDATE model_paper_content SET active = 0 WHERE model_paper_content_id = :model_paper_content_id";
    
        // Execute the query with parameters
        $this->query($query, ['model_paper_content_id' => $model_paper_content_id]);
    
        // Return true to indicate successful deactivation
        return true;
    }
    
    public function delete_mcq($mcq_id)
    {
        // Construct SQL query
        $query = "DELETE FROM mcqs_for_model_paper WHERE mcq_id = :mcq_id";
    
        // Execute the query with parameters
        $this->query($query, ['mcq_id' => $mcq_id]);
    
        // Return true to indicate successful deletion
        return true;
    }

    public function add_mcq($model_paper_content_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)
    {
        //validate
        if (empty($question) || empty($option1) || empty($option2) || empty($option3) || empty($option4) || empty($option5) || empty($correct)) {
            return false;
        }
        // Construct SQL query
        $query = "INSERT INTO mcqs_for_model_paper (model_paper_content_id, question, option1, option2, option3, option4, option5, correct) VALUES (:model_paper_content_id, :question, :option1, :option2, :option3, :option4, :option5, :correct)";
        $this->query($query, [
            'model_paper_content_id' => $model_paper_content_id,
            'question' => $question,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'option5' => $option5,
            'correct' => $correct
        ]);
        return true;
    }


    public function update_mcq($mcq_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)
    {
        //validate
        if (empty($question) || empty($option1) || empty($option2) || empty($option3) || empty($option4) || empty($option5) || empty($correct)) {
            return false;
        }
        // Construct SQL query
        $query = "UPDATE mcqs_for_model_paper SET question = :question, option1 = :option1, option2 = :option2, option3 = :option3, option4 = :option4, option5 = :option5, correct = :correct WHERE mcq_id = :mcq_id";
        $this->query($query, [
            'question' => $question,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'option5' => $option5,
            'correct' => $correct,
            'mcq_id' => $mcq_id
        ]);
        return true;
    }

    public function is_video_belongs_to_me($video_content_id, $tutor_id)
    {
        // Query to check if the video belongs to the tutor
        $sql = "SELECT video_content_id
                FROM video_content
                WHERE video_content_id = :video_content_id
                AND tutor_id = :tutor_id";

        // Execute the query
        $video = $this->query($sql, ['video_content_id' => $video_content_id, 'tutor_id' => $tutor_id]);

        if ($video) {
            return true;
        }
        return false;
    }


    public function get_from_video_content($video_content_id)
    { 
        $query = "SELECT * FROM video_content WHERE video_content_id = :video_content_id";
        $video = $this->query($query, ['video_content_id' => $video_content_id]);
        if ($video) {
            return $video[0];
        } else {
            return false;
        }
    }

    public function get_covering_chapters_for_video($video_content_id)
    {
        $query = "SELECT covering_chapters FROM video_content WHERE video_content_id = :video_content_id";
        $result = $this->query($query, ['video_content_id' => $video_content_id]);
        if ($result) {
            $chapter_ids = explode('][', $result[0]->covering_chapters);
            $chapters = [];
            foreach ($chapter_ids as $chapter_id) {
                $query = "SELECT chapter_level_1, chapter_level_2 FROM chapters WHERE id = :id";
                $result = $this->query($query, ['id' => $chapter_id]);
                if ($result) {
                    $chapters[] = $result[0];
                }
            }
            return $chapters;
        }
        return false;
    }


    public function get_mcqs_for_video($video_content_id)
    {
        $query = "SELECT * FROM mcq_for_video WHERE video_content_id = :video_content_id";
        $mcqs = $this->query($query, ['video_content_id' => $video_content_id]);
        if ($mcqs) {
            return $mcqs;
        }
        return false;
    }

    public function update_video_description($video_content_id, $description)
    {
        //validate
        if (empty($description)) {
            return false;
        }
        // Construct SQL query
        $query = "UPDATE video_content SET description = :description WHERE video_content_id = :video_content_id";
        $this->query($query, ['description' => $description, 'video_content_id' => $video_content_id]);
        return true;
    }

    public function update_video_thumbnail($video_content_id, $thumbnail)
    {
        // Construct SQL query
        $query = "UPDATE video_content SET thumbnail = :thumbnail WHERE video_content_id = :video_content_id";
        $this->query($query, ['thumbnail' => $thumbnail, 'video_content_id' => $video_content_id]);
        return true;
    }

    public function activate_video($video_content_id)
    {
        // Construct SQL query
        $query = "UPDATE video_content SET active = 1 WHERE video_content_id = :video_content_id";
        $this->query($query, ['video_content_id' => $video_content_id]);
        return true;
    }

    public function deactivate_video($video_content_id)
    {
        // Construct SQL query
        $query = "UPDATE video_content SET active = 0 WHERE video_content_id = :video_content_id";
        $this->query($query, ['video_content_id' => $video_content_id]);
        return true;
    }

    public function delete_video_mcq($mcq_id)
    {
        // Construct SQL query
        $query = "DELETE FROM mcq_for_video WHERE mcq_id = :mcq_id";
        $this->query($query, ['mcq_id' => $mcq_id]);
        return true;
    }

    public function add_video_mcq($video_content_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)
    {
        //validate
        if (empty($question) || empty($option1) || empty($option2) || empty($option3) || empty($option4) || empty($option5) || empty($correct)) {
            return false;
        }
        // Construct SQL query
        $query = "INSERT INTO mcq_for_video (video_content_id, question, option1, option2, option3, option4, option5, correct) VALUES (:video_content_id, :question, :option1, :option2, :option3, :option4, :option5, :correct)";
        $this->query($query, [
            'video_content_id' => $video_content_id,
            'question' => $question,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'option5' => $option5,
            'correct' => $correct
        ]);
        return true;
    }

    public function update_video_mcq($mcq_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)
    {
        //validate
        if (empty($question) || empty($option1) || empty($option2) || empty($option3) || empty($option4) || empty($option5) || empty($correct)) {
            return false;
        }
        // Construct SQL query
        $query = "UPDATE mcq_for_video SET question = :question, option1 = :option1, option2 = :option2, option3 = :option3, option4 = :option4, option5 = :option5, correct = :correct WHERE mcq_id = :mcq_id";
        $this->query($query, [
            'question' => $question,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'option5' => $option5,
            'correct' => $correct,
            'mcq_id' => $mcq_id
        ]);
        return true;
    }
    public function get_my_video_purchased_students($video_content_id)
    {
        try {
            // Get all students who purchased the video along with their names concatenated
            $query = "SELECT pv.student_id, pv.completed, pv.score, pv.purchased_date, CONCAT(s.fname, ' ', s.lname) AS name
                      FROM purchased_videos pv 
                      JOIN premium_students s ON pv.student_id = s.student_id 
                      WHERE pv.video_content_id = :video_content_id";
            $students = $this->query($query, ['video_content_id' => $video_content_id]);
    
            if ($students) {
                return $students; // Return the fetched students' data
            } else {
                return false; // Return false if no students found
            }
        } catch (Exception $e) {
            // Handle any exceptions
            error_log("Error in get_my_video_purchased_students: " . $e->getMessage());
            return false; // Return false indicating failure
        }
    }
    
    
        

}
