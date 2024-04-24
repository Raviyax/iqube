<?php
class Subjectadmins extends Model
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
    public function get_subject_admins($subject = null)
    {
        $columns = 'subject_admin_id, fname, lname, subject, email';
        if ($subject != null) {
            return $this->query("SELECT $columns FROM subject_admins WHERE subject='$subject'");
        } else {
            return $this->query("SELECT $columns FROM subject_admins");
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
        $this->query("UPDATE users SET  username=? WHERE user_id=?", [
            $data['username'],
            $id
        ]);
        $this->query("UPDATE subject_admins SET username=?, fname=?, lname=?, cno=? WHERE user_id=?", [
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
        $_SESSION['USER_DATA']['email'] = $data['email'];
        return true;
    }
    public function view_tutors($subject)
    {
        return $this->query("SELECT tutor_id, fname, lname, email FROM tutors WHERE subject='$subject'");
    }
    public function save_image_data($imagename, $id)
    {
        $this->query("UPDATE subject_admins SET image=? WHERE subject_admin_id=?", [
            $imagename,
            $id
        ]);
        $_SESSION['USER_DATA']['image'] = $imagename;
        return true;
    }
    public function get_subject_admin_count_subject_vise()
    {
        $query = "SELECT subject,COUNT(*) as count FROM subject_admins GROUP BY subject";
        return $this->query($query);
    }
    public function get_notifications()
    {
        $subject = $_SESSION['USER_DATA']['subject'];
        $last_tutor_requests = $this->query("SELECT fname, lname, requested_date FROM tutor_requests WHERE subject = '$subject' AND declined = 0 ORDER BY request_id DESC LIMIT 3;");
        // Check if the query result is not null
        if ($last_tutor_requests != null) {
            foreach ($last_tutor_requests as $key => $value) {
                $requestedDate = strtotime($value->requested_date);
                $currentDate = time();
                $daysPassed = floor(($currentDate - $requestedDate) / (60 * 60 * 24));
                // Update the object with the calculated days passed
                $last_tutor_requests[$key]->requested_days_passed = $daysPassed;
            }
            // Make notifications with tutor name and days passed
            $notifications = [
                'last_tutor_requests' => [], // You can add more types here
            ];
            foreach ($last_tutor_requests as $tutor) {
                // Use an indexed array for each tutor
                $notifications['last_tutor_requests'][] = [
                    'fname' => $tutor->fname,
                    'lname' => $tutor->lname,
                    'requested_days_passed' => $tutor->requested_days_passed,
                ];
            }
            return $notifications;
        } else {
            // Handle the case where the query result is null (e.g., log a message, return an empty array, etc.)
            return [
                'last_tutor_requests' => [],
            ];
        }
    }
    public function get_tutor_requests($subject)
    {
        $query = "SELECT request_id, fname, lname, email, requested_date FROM tutor_requests WHERE subject = :subject AND declined = 0";
        $params = ['subject' => $subject];
        $result = $this->query($query, $params);
        // Check if the query result is not null
        if ($result !== null) {
            return $result;
        } else {
            // Handle the case where the query result is null (e.g., log an error, return an empty array, etc.)
            return [];
        }
    }
    public function get_tutor_request($id)
    {
        //get tutor request where approval status is 0
        return $this->first([
            'request_id' => $id,
            'declined' => 0
        ], 'tutor_requests', 'request_id');
    }
    public function accept_tutor_request($id)
    {
        // Auto-generate password for tutor
        $password = bin2hex(random_bytes(8));
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // 1st copy the entire row from tutor_requests to users
        $tutor_request = $this->first([
            'request_id' => $id
        ], 'tutor_requests', 'request_id');
        // Send an email with a link to tutor
        $mail = new Mail();
        $link = URLROOT . "/Tutor/first_time_login?email=" . $tutor_request->email . "&token=" . $password;
        if ($mail->send($tutor_request->email, 'Tutor Account Created', 'Please <a href="' . $link . '">click here</a> to log in and change your password.')) {
            // Insert data into users table
            $this->query("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)", [
                'username' => $tutor_request->username,
                'email' => $tutor_request->email,
                'password' => $hashedPassword,
                'role' => 'tutor'
            ]);
            // Get the user_id from the inserted user record
            $row = $this->first([
                'email' => $tutor_request->email
            ], 'users', 'user_id');
            // Insert data into tutors table
            $this->query("INSERT INTO tutors (user_id, subject, fname, lname, username, email, cno, qualification, cv) VALUES (:user_id, :subject, :fname, :lname, :username, :email, :cno, :qualification, :cv)", [
                'user_id' => $row->user_id,
                'subject' => $tutor_request->subject,
                'fname' => $tutor_request->fname,
                'lname' => $tutor_request->lname,
                'username' => $tutor_request->username,
                'email' => $tutor_request->email,
                'cno' => $tutor_request->cno,
                'qualification' => $tutor_request->qualification,
                'cv' => $tutor_request->cv,
            ]);
            // 2nd delete the row from tutor_requests
            $this->query("DELETE FROM tutor_requests WHERE request_id=?", [$id]);
            return true;
        } else {
            echo "<script>alert('Error');</script>";
        }
    }
    public function get_chapters()
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
    weight";;
        return $this->query($query, ['subject' => $_SESSION['USER_DATA']['subject']]);
    }
    public function update_syllabus($id, $subunit, $weight)
    {
        $this->query("UPDATE chapters SET chapter_level_2=?, weight=? WHERE id=?", [
            $subunit,
            $weight,
            $id
        ]);
        return true;
    }
    public function delete_syllabus($id)
    {
        $this->query("DELETE FROM chapters WHERE id=?", [$id]);
        return true;
    }
    public function insert_subunit($chapter_level_1, $subunit, $weight)
    {
        $this->query("INSERT INTO chapters (subject, chapter_level_1, chapter_level_2, weight) VALUES (:subject, :chapter_level_1, :chapter_level_2, :weight)", [
            'subject' => $_SESSION['USER_DATA']['subject'],
            'chapter_level_1' => $chapter_level_1,
            'chapter_level_2' => $subunit,
            'weight' => $weight
        ]);
        return true;
    }
    public function get_a_chat_agent()
    {
        $subjectadmins = $this->query("SELECT user_id FROM subject_admins WHERE 1");
        //get a random subject admin
        $user_id = $subjectadmins[array_rand($subjectadmins)]->user_id;
        return $user_id;
    }
    public function get_subunit($id)
    {
        return $this->first([
            'id' => $id
        ], 'chapters', 'id');
    }
    public function is_subunit_available_and_belongs_to_subject($id)
    {
        $subunit = $this->first([
            'id' => $id,
            'subject' => $_SESSION['USER_DATA']['subject']
        ], 'chapters', 'id');
        if ($subunit) {
            return true;
        } else {
            return false;
        }
    }
    public function get_videos_by_subunit($id)
    {
        $sql = "SELECT * FROM video_content WHERE CONCAT('[', covering_chapters, ']') LIKE ?";
        $id = '%[' . $id . ']%';
        $videos = $this->query($sql, [$id]);
        if ($videos) {
            //add tutor name to each video
            foreach ($videos as $video) {
                $tutor = $this->query("SELECT fname, lname FROM tutors WHERE tutor_id=?", [$video->tutor_id]);
                $video->tutor_name = $tutor[0]->fname . ' ' . $tutor[0]->lname;
            }
            return $videos;
        } else {
            false;
        }
    }
    public function get_model_paper_by_subunit($id)
    {
        $sql = "SELECT * FROM model_paper_content WHERE CONCAT('[', covering_chapters, ']') LIKE ?";
        $id = '%[' . $id . ']%';
        $model_papers = $this->query($sql, [$id]);
        if ($model_papers) {
            //add tutor name to each model paper
            foreach ($model_papers as $model_paper) {
                $tutor = $this->query("SELECT fname, lname FROM tutors WHERE tutor_id=?", [$model_paper->tutor_id]);
                $model_paper->tutor_name = $tutor[0]->fname . ' ' . $tutor[0]->lname;
            }
            return $model_papers;
        } else {
            false;
        }
    }
    public function get_mcqs_for_progress_tracking_by_subunit($id)
    {
        $mcqs = $this->query("SELECT * FROM mcqs_for_progress_tracking WHERE subunit_id=?", [$id]);
        if ($mcqs) {
            return $mcqs;
        } else {
            return false;
        }
    }
    public function save_mcq($mcq_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)
    {
        $this->query("UPDATE mcqs_for_progress_tracking SET question=?, option1=?, option2=?, option3=?, option4=?, option5=?, correct=? WHERE mcq_id=?", [
            $question,
            $option1,
            $option2,
            $option3,
            $option4,
            $option5,
            $correct,
            $mcq_id
        ]);
        //update the date and done subject admin id
        $this->query("UPDATE chapters SET last_edited_date=?, last_edited_subject_admin=? WHERE id=?", [
            date('Y-m-d H:i:s'),
            $_SESSION['USER_DATA']['subject_admin_id'],
            $mcq_id
        ]);
        return true;
    }
    public function delete_mcq($mcq_id)
    {
        $this->query("DELETE FROM mcqs_for_progress_tracking WHERE mcq_id=?", [$mcq_id]);
        //update the date and done subject admin id
        $this->query("UPDATE chapters SET last_edited_date=?, last_edited_subject_admin=? WHERE id=?", [
            date('Y-m-d H:i:s'),
            $_SESSION['USER_DATA']['subject_admin_id'],
            $mcq_id
        ]);
        return true;
    }
    public function add_mcq($subunit_id, $question, $option1, $option2, $option3, $option4, $option5, $correct)
    {
        $this->query("INSERT INTO mcqs_for_progress_tracking (subunit_id, question, option1, option2, option3, option4, option5, correct) VALUES (:subunit_id, :question, :option1, :option2, :option3, :option4, :option5, :correct)", [
            'subunit_id' => $subunit_id,
            'question' => $question,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'option5' => $option5,
            'correct' => $correct
        ]);
        //update the date and done subject admin id
        $this->query("UPDATE chapters SET last_edited_date=?, last_edited_subject_admin=? WHERE id=?", [
            date('Y-m-d H:i:s'),
            $_SESSION['USER_DATA']['subject_admin_id'],
            $subunit_id
        ]);
        return true;
    }
    public function save_duration($id, $duration)
    {
        $this->query("UPDATE chapters SET model_paper_duration=? WHERE id=?", [
            $duration,
            $id
        ]);
        return true;
    }

    public function get_my_subject_tutor_count()
    {
        $query = "SELECT COUNT(*) as count FROM tutors WHERE subject=?";
        return $this->query($query, [$_SESSION['USER_DATA']['subject']]);
    }

    public function get_subject_id($subject)
    {
        $query = "SELECT subject_id FROM subjects WHERE subject_name=?";
        return $this->query($query, [$subject]);
    }

    public function get_my_subject_student_Count()
    {
        $subject_id = $this->get_subject_id($_SESSION['USER_DATA']['subject']);
        

        $query = "SELECT COUNT(*) AS student_count
              FROM students
              WHERE CONCAT(',', subjects, ',') LIKE '%," . $subject_id[0]->subject_id . ",%'";
        $student_count = $this->query($query);
        if ($student_count) {
            return $student_count;
        } else {
            return false;
        }
    }

    public function get_my_subject_premium_student_Count()
    {
        $subject_id = $this->get_subject_id($_SESSION['USER_DATA']['subject']);
        $query = "SELECT COUNT(*) AS student_count
              FROM students
              WHERE CONCAT(',', subjects, ',') LIKE '%," . $subject_id[0]->subject_id . ",%' AND premium=1";
        $student_count = $this->query($query);
        if ($student_count) {
            return $student_count;
        } else {
            return false;
        }
    }

    public function get_my_not_completed_support_requests()
    {
        $query = "SELECT COUNT(*) as count FROM iqube_support where subject_admin_user_id=? AND completed=0";
        return $this->query($query, [$_SESSION['USER_DATA']['user_id']]);
    }

    public function get_tutor_request_count()
    {
        $query = "SELECT COUNT(*) as count FROM tutor_requests WHERE subject=? AND declined=0";
        return $this->query($query, [$_SESSION['USER_DATA']['subject']]);
    }

    public function get_model_paper_count()
    {
        $query = "SELECT COUNT(*) as count FROM model_paper_content WHERE subject=? AND active=1";
        return $this->query($query, [$_SESSION['USER_DATA']['subject']]);
    }

    public function get_video_count()
    {
        $query = "SELECT COUNT(*) as count FROM video_content WHERE subject=? AND active=1";
        return $this->query($query, [$_SESSION['USER_DATA']['subject']]);
    }
}
