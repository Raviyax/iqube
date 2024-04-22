<?php
class Students extends Model
{
    public $errors;
    public function complete_profile($data)
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        //separate the subjects with a comma
        $subjects = implode(',', $data['subject']);
        if ($this->query("UPDATE students SET subjects = :subjects WHERE student_id = $student_id", ['subjects' => $subjects])) {
            //update completed to 1
            $this->query("UPDATE students SET completed = 1 WHERE student_id = $student_id");
            $_SESSION['USER_DATA']['completed'] = 1;
        }
        $_SESSION['USER_DATA']['subjects'] = $data['subject'];
        return true;
    }
    public function insert_to_premium_students($data)
    {
        $this->query("INSERT INTO premium_students (student_id, fname, lname, cno, address, city) VALUES (:student_id, :fname, :lname, :cno, :address, :city)", [
            'student_id' => $_SESSION['USER_DATA']['student_id'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'cno' => $data['cno'],
            'address' => $data['address'],
            'city' => $data['city']
        ]);
        return true;
    }
    public function validate_insert_to_premium_students($data)
    {
        if (empty($data['fname'])) {
            $this->errors['fname'] = 'First name is required';
        }
        if (empty($data['lname'])) {
            $this->errors['lname'] = 'Last name is required';
        }
        if (empty($data['cno'])) {
            $this->errors['cno'] = 'Contact number is required';
        }
        if (empty($data['address'])) {
            $this->errors['address'] = 'Address is required';
        }
        if (empty($data['city'])) {
            $this->errors['city'] = 'City is required';
        }
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }
    public function get_premium_data($student_id)
    {
        $result = $this->query("SELECT * FROM premium_students WHERE student_id = $student_id");
        if ($result) {
            if ($result[0]->student_id == $student_id) {
                return $result[0];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function upgrade_to_premium()
    {
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
    public function send_verification_email($email)
    {
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
    public function verify_email($token, $email)
    {
        $result = $this->query("SELECT token, email FROM students WHERE token = :token AND email = :email", ['token' => $token, 'email' => $email]);
        if ($result) {
            $this->query("UPDATE students SET verify = 1, token = 'no token' WHERE email = :email", ['email' => $email]);
            return true;
        } else {
            return false;
        }
    }
    public function validate_complete_profile($data)
    {
        if (empty($data['subject'])) {
            $this->errors['subjects'] = 'Please select at least one subject';
        } else if (count($data['subject']) > 3) {
            $this->errors['subjects'] = 'You can select up to 3 subjects';
        } else {
            //check whether the entered subject_id s tally with the subjects in the database
            $subjects = $this->query("SELECT subject_id FROM subjects");
            $subject_ids = [];
            foreach ($subjects as $subject) {
                $subject_ids[] = $subject->subject_id;
            }
            foreach ($data['subject'] as $subject) {
                if (!in_array($subject, $subject_ids)) {
                    $this->errors['subjects'] = 'Invalid subject';
                    break;
                }
            }
        }
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }
    public function get_my_subject_names($student_id)
    {
        $subjects = $this->query("SELECT subjects FROM students WHERE student_id = :student_id", ['student_id' => $student_id]);
        if ($subjects) {
            $subject_ids = explode(',', $subjects[0]->subjects);
            $subject_names = [];
            foreach ($subject_ids as $subject_id) {
                $subject = $this->query("SELECT subject_name FROM subjects WHERE subject_id = :subject_id", ['subject_id' => $subject_id]);
                if ($subject) {
                    $subject_names[] = $subject[0]->subject_name;
                }
            }
            return $subject_names;
        } else {
            return false;
        }
    }
    public function get_all_tutors_for_my_subjects($student_id)
    {
        $subjects = $this->query("SELECT subjects FROM students WHERE student_id = :student_id", ['student_id' => $student_id]);
        if ($subjects) {
            $subject_ids = explode(',', $subjects[0]->subjects);
            // get subject_name for relavant subject_id
            $subject_names = [];
            foreach ($subject_ids as $subject_id) {
                $subject = $this->query("SELECT subject_name FROM subjects WHERE subject_id = :subject_id", ['subject_id' => $subject_id]);
                if ($subject) {
                    $subject_names[] = $subject[0]->subject_name;
                }
            }
            //get tutors for each subject
            $tutors = [];
            foreach ($subject_names as $subject_name) {
                $tutor = $this->query("SELECT fname ,lname ,tutor_id ,subject ,approved_date ,image FROM tutors WHERE subject LIKE :subject_name", ['subject_name' => "%$subject_name%"]);
                if ($tutor) {
                    $tutors[] = $tutor;
                }
            }
            return $tutors;
        } else {
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
       weight";;
        return $this->query($query, ['subject' => $_SESSION['USER_DATA']['subject']]);
    }
    public function get_chapters_for_my_subjects()
    {
        $my_subjects = $this->get_my_subject_names($_SESSION['USER_DATA']['student_id']);
        //get chapters for each subject
        $chapters = [];
        foreach ($my_subjects as $subject) {
            $chapter = $this->query("SELECT * FROM chapters WHERE subject = :subject", ['subject' => $subject]);
            if ($chapter) {
                $chapters[] = $chapter;
            }
        }
        return $chapters;
    }
    public function get_videos()
    {
        // Fetch video uploads where subject = my subjects and active
        $my_subjects = $this->get_my_subject_names($_SESSION['USER_DATA']['student_id']);
        $videos = [];
        foreach ($my_subjects as $subject) {
            $video = $this->query("SELECT video_content_id, tutor_id, date, name, subject, thumbnail, price, covering_chapters
         FROM video_content WHERE subject = :subject AND active = 1", ['subject' => $subject]);
            if ($video) {
                //add type to the video array
                foreach ($video as $v) {
                    $v->type = 'video';
                    //get tutors name for the video
                    $tutor = $this->query("SELECT fname, lname FROM tutors WHERE tutor_id = :tutor_id", ['tutor_id' => $v->tutor_id]);
                    if ($tutor) {
                        $v->tutor = $tutor[0]->fname . ' ' . $tutor[0]->lname;
                    }
                }
                $videos[] = $video;
            }
        }
        return $videos;
    }
    public function get_model_papers()
    {
        // Fetch model papers where subject = my subjects and active
        $my_subjects = $this->get_my_subject_names($_SESSION['USER_DATA']['student_id']);
        $model_papers = [];
        foreach ($my_subjects as $subject) {
            $model_paper = $this->query("SELECT model_paper_content_id, tutor_id, date, name, subject, price, thumbnail, covering_chapters FROM model_paper_content WHERE subject = :subject AND active = 1", ['subject' => $subject]);
            if ($model_paper) {
                //add type to the model paper array
                foreach ($model_paper as $m) {
                    $m->type = 'model_paper';
                    //get tutors name for the model paper
                    $tutor = $this->query("SELECT fname, lname FROM tutors WHERE tutor_id = :tutor_id", ['tutor_id' => $m->tutor_id]);
                    if ($tutor) {
                        $m->tutor = $tutor[0]->fname . ' ' . $tutor[0]->lname;
                    }
                }
                $model_papers[] = $model_paper;
            }
        }
        return $model_papers;
    }
    public function get_study_materials()
    {
        $model_papers = $this->get_model_papers();
        $videos = $this->get_videos();
        //shuffle them
        $study_materials = array_merge($model_papers, $videos);
        shuffle($study_materials);
        return $study_materials;
    }
    public function get_model_paper_overview($model_paper_content_id)
    {
        $model_paper = $this->query("SELECT * FROM model_paper_content WHERE model_paper_content_id = :model_paper_content_id", ['model_paper_content_id' => $model_paper_content_id]);
        if ($model_paper) {
            //get tutors name for the model paper
            $tutor = $this->query("SELECT fname, lname FROM tutors WHERE tutor_id = :tutor_id", ['tutor_id' => $model_paper[0]->tutor_id]);
            if ($tutor) {
                $model_paper[0]->tutor = $tutor[0]->fname . ' ' . $tutor[0]->lname;
                //get tutors image
                $tutor_image = $this->query("SELECT image FROM tutors WHERE tutor_id = :tutor_id", ['tutor_id' => $model_paper[0]->tutor_id]);
                if ($tutor_image) {
                    $model_paper[0]->tutor_image = $tutor_image[0]->image;
                }
            }
            //get covering chapters for the model paper
            $chapter_ids = explode('][', $model_paper[0]->covering_chapters);
            $chapters = [];
            foreach ($chapter_ids as $chapter_id) {
                $chapter = $this->query("SELECT chapter_level_1, chapter_level_2 FROM chapters WHERE id = :chapter_id", ['chapter_id' => $chapter_id]);
                if ($chapter) {
                    $chapters[] = $chapter[0];
                }
            }
            $model_paper[0]->chapters = $chapters;
            return $model_paper[0];
        } else {
            return false;
        }
    }
    public function get_video_overview($video_content_id)
    {
        $video = $this->query("SELECT video_content_id,tutor_id, name, subject, description, thumbnail, price, covering_chapters, date FROM video_content WHERE video_content_id = :video_content_id AND active = 1", ['video_content_id' => $video_content_id]);
        if ($video) {
            //get tutors name for the video
            $tutor = $this->query("SELECT fname, lname FROM tutors WHERE tutor_id = :tutor_id", ['tutor_id' => $video[0]->tutor_id]);
            if ($tutor) {
                $video[0]->tutor = $tutor[0]->fname . ' ' . $tutor[0]->lname;
                //get tutors image
                $tutor_image = $this->query("SELECT image FROM tutors WHERE tutor_id = :tutor_id", ['tutor_id' => $video[0]->tutor_id]);
                if ($tutor_image) {
                    $video[0]->tutor_image = $tutor_image[0]->image;
                }
            }
            //get covering chapters for the video
            $chapter_ids = explode('][', $video[0]->covering_chapters);
            $chapters = [];
            foreach ($chapter_ids as $chapter_id) {
                $chapter = $this->query("SELECT chapter_level_1, chapter_level_2 FROM chapters WHERE id = :chapter_id", ['chapter_id' => $chapter_id]);
                if ($chapter) {
                    $chapters[] = $chapter[0];
                }
            }
            $video[0]->chapters = $chapters;
            return $video[0];
        } else {
            return false;
        }
    }
    public function purchase_video($video_content_id)
    {
        // Check if user is logged in
        if (!isset($_SESSION['USER_DATA']['student_id'])) {
            return false; // Return false if user is not logged in
        }
        $student_id = $_SESSION['USER_DATA']['student_id'];
        // Check whether the student has already purchased the video
        $result = $this->query("SELECT purchased_video FROM premium_students WHERE student_id = :student_id", ['student_id' => $student_id]);
        if ($result) {
            $purchased_videos = explode(',', $result[0]->purchased_video);
            // Check if video is already purchased
            if (in_array($video_content_id, $purchased_videos)) {
                return 'already_purchased';
            } else {
                // If purchased video column is empty, insert the video_content_id
                if ($result[0]->purchased_video == '') {
                    $this->query("UPDATE premium_students SET purchased_video = :video_content_id WHERE student_id = :student_id", ['video_content_id' => $video_content_id, 'student_id' => $student_id]);
                } else {
                    // Append the video_content_id to the existing purchased videos
                    $purchased_videos[] = $video_content_id;
                    $purchased_videos = implode(',', $purchased_videos);
                    $this->query("UPDATE premium_students SET purchased_video = :purchased_videos WHERE student_id = :student_id", ['purchased_videos' => $purchased_videos, 'student_id' => $student_id]);
                }
                // Insert into purchased_videos table
                $this->query("INSERT INTO purchased_videos (student_id, video_content_id) VALUES (:student_id, :video_content_id)", ['student_id' => $student_id, 'video_content_id' => $video_content_id]);
                return true; // Return true if the purchase is successful
            }
        } else {
            return false; // Return false if query fails
        }
    }
    public function is_video_purchased($video_content_id)
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $result = $this->query("SELECT purchased_video FROM premium_students WHERE student_id = :student_id", ['student_id' => $student_id]);
        if ($result) {
            $purchased_videos = explode(',', $result[0]->purchased_video);
            if (in_array($video_content_id, $purchased_videos)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function purchase_model_paper($model_paper_content_id)
    {
        // Check if user is logged in
        if (!isset($_SESSION['USER_DATA']['student_id'])) {
            return false; // Return false if user is not logged in
        }
        $student_id = $_SESSION['USER_DATA']['student_id'];
        // Check whether the student has already purchased the model paper
        $result = $this->query("SELECT purchased_model_paper FROM premium_students WHERE student_id = :student_id", ['student_id' => $student_id]);
        if ($result) {
            $purchased_model_papers = explode(',', $result[0]->purchased_model_paper);
            // Check if model paper is already purchased
            if (in_array($model_paper_content_id, $purchased_model_papers)) {
                return 'already_purchased';
            } else {
                // If purchased model paper column is empty, insert the model_paper_content_id
                if ($result[0]->purchased_model_paper == '') {
                    $this->query("UPDATE premium_students SET purchased_model_paper = :model_paper_content_id WHERE student_id = :student_id", ['model_paper_content_id' => $model_paper_content_id, 'student_id' => $student_id]);
                } else {
                    // Append the model_paper_content_id to the existing purchased model papers
                    $purchased_model_papers[] = $model_paper_content_id;
                    $purchased_model_papers = implode(',', $purchased_model_papers);
                    $this->query("UPDATE premium_students SET purchased_model_paper = :purchased_model_papers WHERE student_id = :student_id", ['purchased_model_papers' => $purchased_model_papers, 'student_id' => $student_id]);
                }
                // Insert into purchased_model_papers table
                $this->query("INSERT INTO purchased_model_papers (student_id, model_paper_content_id) VALUES (:student_id, :model_paper_content_id)", ['student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id]);
                return true; // Return true if the purchase is successful
            }
        } else {
            return false; // Return false if query fails
        }
    }
    public function is_model_paper_purchased($model_paper_content_id)
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $result = $this->query("SELECT purchased_model_paper FROM premium_students WHERE student_id = :student_id", ['student_id' => $student_id]);
        if ($result) {
            $purchased_model_papers = explode(',', $result[0]->purchased_model_paper);
            if (in_array($model_paper_content_id, $purchased_model_papers)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_model_paper_mcqs($model_paper_content_id)
    {
        $questions = $this->query("SELECT * FROM mcqs_for_model_paper WHERE model_paper_content_id = :model_paper_content_id", ['model_paper_content_id' => $model_paper_content_id]);
        if ($questions) {
            return $questions;
        } else {
            return false;
        }
    }
    public function update_as_model_paper_started($model_paper_content_id)
    {
        $this->query("UPDATE purchased_model_papers SET started = 1 WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id", ['student_id' => $_SESSION['USER_DATA']['student_id'], 'model_paper_content_id' => $model_paper_content_id]);
        $result = $this->is_model_paper_started($model_paper_content_id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function is_model_paper_started($model_paper_content_id)
    {
        $result = $this->query("SELECT started FROM purchased_model_papers WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id", ['student_id' => $_SESSION['USER_DATA']['student_id'], 'model_paper_content_id' => $model_paper_content_id]);
        if ($result) {
            if ($result[0]->started == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function is_model_paper_completed($model_paper_content_id)
    {
        $result = $this->query("SELECT completed FROM purchased_model_papers WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id", ['student_id' => $_SESSION['USER_DATA']['student_id'], 'model_paper_content_id' => $model_paper_content_id]);
        if ($result) {
            if ($result[0]->completed == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function check_model_paper_answers($data)
    {
        $model_paper_content_id = $data['model_paper_content_id'];
        $questions = $this->get_model_paper_mcqs($model_paper_content_id);
        $correct_answers = 0;
        $total_questions = count($questions);
        foreach ($questions as $question) {
            if ($data[$question->mcq_id] == $question->correct) {
                $correct_answers++;
            }
        }
        return $correct_answers;
    }
    public function submit_model_paper_answers($data)
    {
        // Extract data from the input
        $model_paper_content_id = $data['model_paper_content_id'];
        $correct_answers = $this->check_model_paper_answers($data);
        $student_id = $_SESSION['USER_DATA']['student_id'];
        // Update purchased_model_papers table
        $this->query("
            UPDATE purchased_model_papers 
            SET score = :percentage, completed = 1, started = 0 
            WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id
        ", ['percentage' => $correct_answers, 'student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id]);
        // Check if the update was successful
        $result = $this->query("
            SELECT score, completed 
            FROM purchased_model_papers 
            WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id
        ", ['student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id]);
        if ($result && $result[0]->score == $correct_answers && $result[0]->completed == 1) {
            // Check whether the previous answers are already inserted
            $answers = $this->query("
                SELECT * 
                FROM student_answers_for_model_paper_mcq 
                WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id
            ", ['student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id]);
            if ($answers) {
                // Update the answers
                foreach ($data as $key => $value) {
                    if ($key != 'model_paper_content_id' && $key != 'submit') {
                        $this->query("
                            UPDATE student_answers_for_model_paper_mcq 
                            SET answer = :answer 
                            WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id AND mcq_id = :mcq_id
                        ", ['answer' => $value, 'student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id, 'mcq_id' => $key]);
                    }
                }
            } else {
                // Insert new answers
                foreach ($data as $key => $value) {
                    if ($key != 'model_paper_content_id' && $key != 'submit') {
                        $this->query("
                            INSERT INTO student_answers_for_model_paper_mcq (student_id, model_paper_content_id, mcq_id, answer) 
                            VALUES (:student_id, :model_paper_content_id, :mcq_id, :answer)
                        ", ['student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id, 'mcq_id' => $key, 'answer' => $value]);
                    }
                }
            }
            return $correct_answers; // Success
        } else {
            return false; // Failure
        }
    }
    public function get_model_paper_result($model_paper_content_id)
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        if ($this->is_model_paper_completed($model_paper_content_id)) {
            $result = $this->query("SELECT score FROM purchased_model_papers WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id", ['student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id]);
            if ($result) {
                return $result[0]->score;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_student_answers_for_model_paper_mcq($model_paper_content_id)
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $answers = $this->query("SELECT * FROM student_answers_for_model_paper_mcq WHERE student_id = :student_id AND model_paper_content_id = :model_paper_content_id", ['student_id' => $student_id, 'model_paper_content_id' => $model_paper_content_id]);
        if ($answers) {
            return $answers;
        } else {
            return false;
        }
    }
    public function get_video($video_content_id)
    {
        //get video overview
        $video = $this->get_video_overview($video_content_id);
        if ($video) {
            //get video url
            $video_url = $this->query("SELECT video FROM video_content WHERE video_content_id = :video_content_id", ['video_content_id' => $video_content_id]);
            if ($video_url) {
                $video->video = $video_url[0]->video;
                return $video;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_video_mcqs($video_content_id)
    {
        $questions = $this->query("SELECT * FROM mcq_for_video WHERE video_content_id = :video_content_id", ['video_content_id' => $video_content_id]);
        if ($questions) {
            return $questions;
        } else {
            return false;
        }
    }
    public function submit_video_answers($data)
    {
        // Extract data from the input
        $video_content_id = $data['video_content_id'];
        $correct_answers = $this->check_video_answers($data);
        $student_id = $_SESSION['USER_DATA']['student_id'];
        // Update purchased_videos table
        $this->query("
            UPDATE purchased_videos 
            SET score = :percentage, completed = 1
            WHERE student_id = :student_id AND video_content_id = :video_content_id
        ", ['percentage' => $correct_answers, 'student_id' => $student_id, 'video_content_id' => $video_content_id]);
        // Check if the update was successful
        $result = $this->query("
            SELECT score, completed 
            FROM purchased_videos 
            WHERE student_id = :student_id AND video_content_id = :video_content_id
        ", ['student_id' => $student_id, 'video_content_id' => $video_content_id]);
        if ($result && $result[0]->score == $correct_answers && $result[0]->completed == 1) {
            // Check whether the previous answers are already inserted
            $answers = $this->query("
                SELECT * 
                FROM student_answers_for_video_mcq 
                WHERE student_id = :student_id AND video_content_id = :video_content_id
            ", ['student_id' => $student_id, 'video_content_id' => $video_content_id]);
            if ($answers) {
                // Update the answers
                foreach ($data as $key => $value) {
                    if ($key != 'video_content_id' && $key != 'submit') {
                        $this->query("
                            UPDATE student_answers_for_video_mcq 
                            SET answer = :answer 
                            WHERE student_id = :student_id AND video_content_id = :video_content_id AND mcq_id = :mcq_id
                        ", ['answer' => $value, 'student_id' => $student_id, 'video_content_id' => $video_content_id, 'mcq_id' => $key]);
                    }
                }
            } else {
                // Insert new answers
                foreach ($data as $key => $value) {
                    if ($key != 'video_content_id' && $key != 'submit') {
                        $this->query("
                            INSERT INTO student_answers_for_video_mcq (student_id, video_content_id, mcq_id, answer)
                            VALUES (:student_id, :video_content_id, :mcq_id, :answer)
                        ", ['student_id' => $student_id, 'video_content_id' => $video_content_id, 'mcq_id' => $key, 'answer' => $value]);
                    }
                }
            }
            return $correct_answers; // Success
        } else {
            return false; // Failure
        }
    }
    public function check_video_answers($data)
    {
        $video_content_id = $data['video_content_id'];
        $questions = $this->get_video_mcqs($video_content_id);
        $correct_answers = 0;
        $total_questions = count($questions);
        foreach ($questions as $question) {
            if ($data[$question->mcq_id] == $question->correct) {
                $correct_answers++;
            }
        }
        return $correct_answers;
    }
    public function get_video_result($video_content_id)
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        if ($this->is_video_completed($video_content_id)) {
            $result = $this->query("SELECT score FROM purchased_videos WHERE student_id = :student_id AND video_content_id = :video_content_id", ['student_id' => $student_id, 'video_content_id' => $video_content_id]);
            if ($result) {
                return $result[0]->score;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function is_video_completed($video_content_id)
    {
        $result = $this->query("SELECT completed FROM purchased_videos WHERE student_id = :student_id AND video_content_id = :video_content_id", ['student_id' => $_SESSION['USER_DATA']['student_id'], 'video_content_id' => $video_content_id]);
        if ($result) {
            if ($result[0]->completed == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_student_answers_for_video_mcq($video_content_id)
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $answers = $this->query("SELECT * FROM student_answers_for_video_mcq WHERE student_id = :student_id AND video_content_id = :video_content_id", ['student_id' => $student_id, 'video_content_id' => $video_content_id]);
        if ($answers) {
            return $answers;
        } else {
            return false;
        }
    }
    public function get_not_completed_model_papers()
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $model_paper_ids = $this->query("SELECT model_paper_content_id FROM purchased_model_papers WHERE student_id = :student_id AND completed = 0", ['student_id' => $student_id]);
        if ($model_paper_ids) {
            $model_papers = [];
            foreach ($model_paper_ids as $model_paper_id) {
                $model_paper = $this->get_model_paper_overview($model_paper_id->model_paper_content_id);
                if ($model_paper) {
                    $model_paper->type = 'model_paper';
                    $model_papers[] = $model_paper;
                }
            }
            return $model_papers;
        } else {
            return false;
        }
    }
    public function get_not_completed_videos()
    {
        $student_id = $_SESSION['USER_DATA']['student_id'];
        $video_ids = $this->query("SELECT video_content_id FROM purchased_videos WHERE student_id = :student_id AND completed = 0", ['student_id' => $student_id]);
        if ($video_ids) {
            $videos = [];
            foreach ($video_ids as $video_id) {
                $video = $this->get_video_overview($video_id->video_content_id);
                if ($video) {
                    $video->type = 'video';
                    $videos[] = $video;
                }
            }
            return $videos;
        } else {
            return false;
        }
    }
    public function get_my_not_completed_study_materials()
    {
        $model_papers = $this->get_not_completed_model_papers();
        $videos = $this->get_not_completed_videos();
        if ($model_papers && $videos) {
            $study_materials = array_merge($model_papers, $videos);
            return $study_materials;
        } else if ($model_papers) {
            return $model_papers;
        } else if ($videos) {
            return $videos;
        } else {
            return false;
        }
    }

    public function is_subunit_available_and_belong_to_my_subjects($subunit_id)
    {
        $subunit = $this->query("SELECT * FROM chapters WHERE id = :subunit_id", ['subunit_id' => $subunit_id]);
        if ($subunit) {
            $my_subjects = $this->get_my_subject_names($_SESSION['USER_DATA']['student_id']);
            if (in_array($subunit[0]->subject, $my_subjects)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
