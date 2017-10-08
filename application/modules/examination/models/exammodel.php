<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ExamModel extends CI_Model
    {

    /**
     * This model is using into the Examination controller
     * Load : $this->load->model('exammodel');
     */
    function __construct()
        {
        parent::__construct();
        $this->load->dbforge();
        }

    //This function is checking that have any exam in that date.
    public function checkExam($a, $b)
        {
        $data = array();
        $query = $this->db->get_where('exam_routine', array('exam_id' => $a, 'exam_date' => $b));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        $data = array_filter($data);

        if (!empty($data)) {
            return 'Have An Exam';
        } else {
            return 'No Any Exam';
        }
        }

    //This function is returan Exam Title by ExamId.
    public function examTitle($a)
        {
        $data = array();
        $query = $this->db->get_where('add_exam', array('id' => $a,));
        foreach ($query->result_array() as $row) {
            return $row['exam_title'];
        }
        }

    //This function will return exam subject by exam id and date
    public function examSubject($a, $b)
        {
        $data = array();
        $query = $this->db->get_where('exam_routine', array('exam_id' => $a, 'exam_date' => $b));
        foreach ($query->result_array() as $row) {
            return $row['exam_subject'];
        }
        }

    //This function return previous attendance view
    public function previewAttendance($a, $b, $c)
        {
        $data = array();
        $query = $this->db->get_where('exam_attendanc', array('class' => $a, 'exam_title' => $b, 'exam_subject' => $c));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //This function gives tyeachers view.
    public function teacherInfo($userId)
        {
        $data = array();
        $query = $this->db->get_where('teachers_info', array('user_id' => $userId));
        foreach ($query->result_array() as $row) {
            $data = $row;
        }return $data;
        }

    //This function return result sheet
    public function checkResultShit($classTitle, $examTitle, $subject)
        {
        $data = array();
        $query = $this->db->get_where('result_shit', array('class_title' => $classTitle, 'exam_title' => $examTitle, 'exam_subject' => $subject));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    public function approuveSubjectAmount($classTitle, $examTitle)
        {
        $query = $this->db->get_where('result_submition_info', array('class' => $classTitle, 'exam_title' => $examTitle, 'submited' => '1'));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        $subjectAmount = count($data);
        return $subjectAmount;
        }

    //This function return class subject amount
    public function classSubjectAmount($classTitle)
        {
        $query = $this->db->get_where('class_subject', array('class_title' => $classTitle));
        foreach ($query->result_array() as $row) {
            $subject[] = $row;
        }
        $subjectAmount = count($subject);
        return $subjectAmount;
        }

    //This function return absent amountby any student id
    public function absent($studentId)
        {
        $data = array();
        $query = $this->db->get_where('result_shit', array('student_id' => $studentId, 'result' => 'Absent'));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        if (!empty($data)) {
            $failAmount = count($data);
        } else {
            $failAmount = 0;
        }
        return $failAmount;
        }

    //This function return fail amount by any student Id.
    public function fail($studentId)
        {
        $data = array();
        $query = $this->db->get_where('result_shit', array('student_id' => $studentId, 'result' => 'Fail'));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        if (!empty($data)) {
            $failAmount = count($data);
        } else {
            $failAmount = 0;
        }
        return $failAmount;
        }

    //This function return a exam title in a class.
    public function examTitleForMarkshit($classTitle)
        {
        $data = array();
        $query = $this->db->get_where('add_exam', array('class_title' => $classTitle, 'publish' => 'Publish'));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //THis function count the total point avarage that point.
    public function pointAverage($studentId, $classSubject)
        {
        $data = array();
        $query = $this->db->get_where('result_shit', array('student_id' => $studentId));
        foreach ($query->result_array() as $row) {
            $data[] = $row['point'];
        }
        $totalPoint = array_sum($data);
        $result = $totalPoint / $classSubject;
        return round($result, 2);
        }

    //This function select the grade by the average point.
    public function averageGrade($point)
        {
        if ($point < 1) {
            $garde = 'F';
        } elseif ($point >= 1 & $point <= 1.99) {
            $garde = 'D';
        } elseif ($point >= 2 & $point <= 2.99) {
            $garde = 'C';
        } elseif ($point >= 3 & $point <= 3.49) {
            $garde = 'B';
        } elseif ($point >= 3.5 & $point <= 3.99) {
            $garde = 'A-';
        } elseif ($point >= 4 & $point <= 4.99) {
            $garde = 'A';
        } elseif ($point >= 5) {
            $garde = 'A+';
        }
        return $garde;
        }

    //This function count the total mark for student's examination.
    public function totalMark($studentId)
        {
        $data = array();
        $query = $this->db->get_where('result_shit', array('student_id' => $studentId));
        foreach ($query->result_array() as $row) {
            $data[] = $row['mark'];
        }
        $totalPoint = array_sum($data);
        return $totalPoint;
        }

    //This function return the data for final reslt.
    public function finalResultShow($classTitle, $examTitle)
        {
        $data = array();
        $query = $this->db->get_where('final_result', array('class' => $classTitle, 'exam_title' => $examTitle));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
        }

    //This function help to publish the result.
    public function publish($a, $b)
        {
        $data = array();
        $query = $this->db->get_where('result_action', array('status' => $a, 'publish' => $b));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //This function return markshit by examtitle,class title and student id.
    public function markshit($examTitle, $classTitle, $studentId)
        {
        $data = array();
        $query = $this->db->get_where('result_shit', array('exam_title' => $examTitle, 'class_title' => $classTitle, 'student_id' => $studentId));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    }
