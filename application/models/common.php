<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Common extends CI_Model
    {

    function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->dbforge();
        }

    //Total students will returan this function
    public function totalStudent()
        {
        $data = array();
        $query = $this->db->get('student_info');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
        }

    //Total teachers will returan this function
    public function totalTeacher()
        {
        $data = array();
        $query = $this->db->get('teachers_info');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
        }

    //Total parents will returan this function
    public function totalParents()
        {
        $data = array();
        $query = $this->db->get('parents-info');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
        }

    //Today total Attend student will returan this function
    public function totalAttendStudent()
        {
        $day = date("m/d/y");
        $date = strtotime($day);
        $data = array();
        $query = $this->db->get_where('daily_attendance', array('date' => $date, 'present_or_absent' => 'P'));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
        }

    //This function will return time and date as a string
    public function iceTime()
        {
        // $data = array();
        // $query = $this->db->get('configuration');
        // foreach ($query->result_array() as $row) {
        //     $data = $row['time_zone'];
        // } $data;
        // $datestring = "<i class=\"fa fa-clock-o\"></i> %h:%i %a  <i class=\"fa fa-calendar\"></i>  %d %M, %Y ";
        // $now = time();
        // $timezone = $data;

		$timestamp = 1140153693;
		$timezone  = 'UM8';
		$daylight_saving = TRUE;
		//echo gmt_to_local($timestamp, $timezone, FALSE);
        $time = gmt_to_local($timestamp, $timezone, FALSE);
       // echo mdate($datestring, $time);
        return $time;
        }

    //class's short information will give this function 
    public function classInfo()
        {
        $data = array();
        $query = $this->db->get('clas_info');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    function usersId()
        {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `users`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
        }

    function studentInfoId()
        {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `student_info`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid;
        }

    public function getAllData($a)
        {
        $data = array();
        $query = $this->db->get($a);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    public function getWhere($a, $b, $c)
        {
        $data = array();
        $query = $this->db->get_where($a, array($b => $c));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    public function getWhere22($a, $b, $c, $d, $e)
        {
        $data = array();
        $query = $this->db->get_where($a, array($b => $c, $d => $e));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //THis function is take class title and make unic Roll nomber that class.
    //And return that roll number.
    public function rollNumber($a)
        {
        $query2 = $this->db->get_where('class_students', array('class_title' => $a));
        $qq = array();
        foreach ($query2->result_array() as $aa) {
            $qq[] = $aa;
        }
        $a = $qq;
        //return $a;
        $b = array();
        foreach ($a as $row) {
            $b[] = $row['roll_number'];
        }$c = $b;
        //return max($c);
        if (empty($a)) {
            $d = 1;
            return $d;
        } else {
            $c;
            $e = max($c);
            $e++;
            return $e;
        }
        }

    //This function will return total student amount in a class
    public function classStudentAmount($a)
        {
        $data = array();
        $query = $this->db->get_where('clas_info', array('class_title' => $a));
        foreach ($query->result_array() as $row) {
            $data = $row;
        }
        $b = $data['student_amount'];
        $c = $b + 1;
        return $c;
        }

    //This function is using for the get all and Teacher's notice by SQL where query.
    public function getTeacherNotice()
        {
        $data = array();
        $query = $this->db->query("SELECT * FROM notice_board WHERE receiver='teacher' OR receiver='all'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //This function is using for the get all and student's notice by SQL where query.
    public function getStudentNotice()
        {
        $data = array();
        $query = $this->db->query("SELECT * FROM notice_board WHERE receiver='student' OR receiver='all'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //This function is using for the get all Employe's and Accountends's notice by SQL where query.
    public function getEANotice()
        {
        $data = array();
        $query = $this->db->query("SELECT * FROM notice_board WHERE receiver='all'");
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //This function return school name
    public function schoolName()
        {
        $data = array();
        $query = $this->db->get('configuration');
        foreach ($query->result_array() as $row) {
            $data = $row['school_name'];
        }return $data;
        }

    //This function return currency class name
    public function currencyClass()
        {
        $data = array();
        $query = $this->db->get('configuration');
        foreach ($query->result_array() as $row) {
            $data = $row['currenct'];
        }return $data;
        }

    }
