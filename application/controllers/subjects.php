<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Subjects extends MX_Controller
    {

    function __construct()
        {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    //THis function add new subject in a class
    public function addSubject()
        {
        if ($this->input->post('submit',TRUE)) {

            $classTitle = $this->input->post('class_title',TRUE);
            $subject_1_a = $this->input->post('subject_title_1',TRUE);
            $edition = $this->input->post('edition',TRUE);
            $writer_name = $this->input->post('writer_name',TRUE);

            $tableData = array(
                'class_title' => $this->db->escape_like_str($classTitle),
                'subject_title' => $this->db->escape_like_str($subject_1_a),
                'edition' => $this->db->escape_like_str($edition),
                'writer_name' => $this->db->escape_like_str($writer_name)
            );

            if ($this->db->insert('class_subject', $tableData)) {
                $data['success'] = '<div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                            <strong>Success!</strong> Add Class "' . $subject_1_a . '" successfully.
                                    </div>';
                $data['class'] = $this->common->getAllData('class');
                $data['teacher'] = $this->common->getAllData('teachers_info');
                $this->load->view('temp/header');
                $this->load->view('addSubject', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['class'] = $this->common->getAllData('class');
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('addSubject', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function load all subject with class
    public function allSubject()
        {
        $data['SubjectInfo'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('subjectInformation', $data);
        $this->load->view('temp/footer');
        }

    //This function view subject deatils by class title
    public function classSubjectDetails()
        {
        $classTitle =$this->input->get('class');
        $data['SubjectInfo'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
        $this->load->view('temp/header');
        $this->load->view('classSubjectDetails', $data);
        $this->load->view('temp/footer');
        }

    }
