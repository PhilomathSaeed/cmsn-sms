<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Classmodel extends CI_Model
    {

    /**
     * This model is using into the sclass controller
     * Load : $this->load->model('classmodel');
     */
    function __construct()
        {
        parent::__construct();
        $this->load->dbforge();
        }

    //This function return next class id.
    public function nextClassId()
        {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `class`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
        }

    //This function sent an array to sclass controller's "addClassRoutin" function.
    public function classSubject($a)
        {
        $data = array();
        $query = $this->db->get_where('class', array('class_title' => $a));
        foreach ($query->result_array() as $row) {
            $data = $row;
        }return $data;
        }

    //This functionn is for get data from database with two condition.
    public function getWhere($a, $b, $c, $d, $e)
        {
        $data = array();
        $query = $this->db->get_where($a, array($b => $c, $d => $e));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return $data;
        }

    //This function return total student amount in a class
    public function totalClassStudent($classTitle)
        {
        $data = array();
        $query = $this->db->get_where('class_students', array('class_title' => $classTitle));
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }return count($data);
        }

    //This function return section amount in a class
    public function totalClassSection($classTitle)
        {
        $data = array();
        $query = $this->db->get_where('class', array('class_title' => $classTitle));
        foreach ($query->result_array() as $row) {
            $data = $row['section'];
        }
        if (!empty($data)) {
            $section = explode(',', $data);
            return count($section);
        } else {
            return 'No Section';
        }
        }
    }
