<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AccountModel extends CI_Model
    {

    /**
     * This model is using into the students controller
     * Load : $this->load->model('account');
     */
    function __construct()
        {
        parent::__construct();
        $this->load->dbforge();
        }

    //This function will reaturn only maximam income
    function maxSlip()
        {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(slip_number) AS `maxid` FROM `income`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
        }

    //This function will reaturn only maximam income
    function maxIncome()
        {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(totalIncom) AS `maxid` FROM `income`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid;
        }

    //This function will return Total amount in a transuctio slip
    public function totalAmount($slipNo)
        {
        $data = array();
        $query = $this->db->get_where('income', array('slip_number' => $slipNo));
        foreach ($query->result_array() as $row) {
            $data[] = $row['totalAmount'];
        }
        $ans = array_sum($data);
        return $ans;
        }

    }
