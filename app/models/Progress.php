<?php

class Progress extends Model{
    public function fetchProgress($userId) {
        $data = ['user_id' => $userId];
        $orderby = 'progress_id'; // Change this to your desired order column
        $progressData = $this->first($data, 'progress', $orderby);

        $jsonResponse = json_encode($progressData);

        // Return the JSON response
        return $jsonResponse;
    }
}