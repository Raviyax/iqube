<?php
class progress_tracker extends Model{
    function calculateUnitOverallProgress($subunits_data) {
        $chapter_level_1_data = [];
        // Iterate through each subject
        foreach ($subunits_data as $subject_data) {
            // Iterate through each subunit
            foreach ($subject_data as $subunit) {
                $chapter_level_1 = $subunit->chapter_level_1;
                // Check if chapter_level_1 data already exists
                if (!isset($chapter_level_1_data[$chapter_level_1])) {
                    // Initialize chapter_level_1 data if not exists
                    $chapter_level_1_data[$chapter_level_1] = [
                        'chapter_level_1_name' => $chapter_level_1,
                        'total_weight' => 0,
                        'total_score' => 0,
                        'subject' => $subunit->subject
                    ];
                }
                // Increment total weight and total score
                $chapter_level_1_data[$chapter_level_1]['total_weight'] += $subunit->Weight;
                $chapter_level_1_data[$chapter_level_1]['total_score'] += $subunit->score;
            }
        }
        // Calculate overall progress percentage for each chapter_level_1
        foreach ($chapter_level_1_data as &$chapter_level_1) {
            // Check if total weight is zero to avoid division by zero error
            if ($chapter_level_1['total_weight'] != 0) {
                $chapter_level_1['overall_progress_percentage'] = ($chapter_level_1['total_score'] / $chapter_level_1['total_weight']) * 100;
            } else {
                $chapter_level_1['overall_progress_percentage'] = 0; // Set progress to 0 if total weight is zero
            }
            unset($chapter_level_1['total_weight']);
            unset($chapter_level_1['total_score']);
        }
        return array_values($chapter_level_1_data);
    }
    function calculateSubjectOverallProgress($subunits_data) {
        $subject_progress = [];
        // Iterate through each subject
        foreach ($subunits_data as $subject_data) {
            $subject_name = $subject_data[0]->subject;
            $total_weight = 0;
            $total_score = 0;
            // Iterate through each subunit
            foreach ($subject_data as $subunit) {
                $total_weight += $subunit->Weight;
                $total_score += $subunit->score;
            }
            // Calculate overall progress percentage for the subject
            if ($total_weight != 0) {
                $overall_progress_percentage = ($total_score / $total_weight) * 100;
            } else {
                $overall_progress_percentage = 0; // Set progress to 0 if total weight is zero
            }
            // Create object for subject progress
            $subject_progress[] = [
                'subject' => $subject_name,
                'overall_progress_percentage' => $overall_progress_percentage
            ];
        }
        return $subject_progress;
    }
}