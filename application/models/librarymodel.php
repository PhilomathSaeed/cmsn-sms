<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class LibraryModel extends CI_Model
    {

    /**
     * This model is using into the Library controller
     * Load : $this->load->model('studentmodel');
     */
    function __construct()
        {
        parent::__construct();
        $this->load->dbforge();
        }

    //This function will return books amount
    public function booksAmount()
        {
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(books_amount) AS `maxid` FROM `books`')->row();
        if ($row) {
            $maxid = $row->maxid;
        }return $maxid + 1;
        }

    }
