<?php
class Subjects extends Model {
    public function get_subjects() {
        return $this->query("SELECT * FROM subjects");
    }
}