<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Students extends MX_Controller
    {

    /**
     * This controller is using for controlling to students
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=users
     * 	- or -  
     * 		http://example.com/index.php?module=users&view=<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->model('studentmodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('module=auth&view=login');
        }
        }

    //This function is used for get all students in this system.
    public function allStudent()
        {
        if ($this->input->post('submit',TRUE)) {
            $data['classTitle'] = $this->input->post('class',TRUE);
            //If "class" and "section" fild is not empty the run this condition
            if ($this->input->post('class',TRUE) && $this->input->post('section',TRUE)) {
                //Search student by class,section.
                $class = $this->input->post('class',TRUE);
                $section = $this->input->post('section',TRUE);
                $data['section'] = $section;
                if ($section == 'all') {
                    $data['studentInfo'] = $this->studentmodel->getStudentByClassSection($class, $section);
                    if (!empty($data)) {
                        //If the class have student then run here.
                        $this->load->view('temp/header');
                        $this->load->view('studentclass', $data);
                        $this->load->view('temp/footer');
                    } else {
                        //If the class have no any student then print the massage in the view.
                        $data['message'] = 'This class is no student.';

                        $this->load->view('temp/header');
                        $this->load->view('studentclass', $data);
                        $this->load->view('temp/footer');
                    }
                } else {
                    $data['studentInfo'] = $this->studentmodel->getStudentByClassSection($class, $section);
                    if (!empty($data)) {
                        //If the class have student then run here.
                        $this->load->view('temp/header');
                        $this->load->view('studentclass', $data);
                        $this->load->view('temp/footer');
                    } else {
                        //If the class have no any student then print the massage in the view.
                        $data['message'] = 'This class is no student.';

                        $this->load->view('temp/header');
                        $this->load->view('studentclass', $data);
                        $this->load->view('temp/footer');
                    }
                }
            } elseif ($this->input->post('class',TRUE)) {
                //onley search student by class or all student the class.
                $class = $this->input->post('class',TRUE);
                $data['studentInfo'] = $this->studentmodel->getAllStudent($class);
                if (!empty($data)) {
                    //If the class have student then run here.
                    $this->load->view('temp/header');
                    $this->load->view('studentclass', $data);
                    $this->load->view('temp/footer');
                } else {
                    //If the class have no any student then print the massage in the view.
                    $data['message'] = 'This class is no student.';

                    $this->load->view('temp/header');
                    $this->load->view('studentclass', $data);
                    $this->load->view('temp/footer');
                }
            }
        } else {
            //First of all this method run here and load class selecting view.
            $data['s_class'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('slectStudent', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function is used for filtering to get students information
    //Whene class and section gave in the frontend, if the class have section he cane select the section and get student information in the viwe.
    public function ajaxClassSection()
        {
        $classTitle =$this->input->get('q');
        $query = $this->common->getWhere('class', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class" value="' . $classTitle . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                            <select name="section" class="form-control">
                                <option value="all">All Section</option>';
            foreach ($sectionArray as $sec) {
                echo '<option value="' . $sec . '">' . $sec . '</option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            $section = 'This class has no section.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        }

    //This function is giving a student's the full information. 
    public function students_details()
        {
        $id =$this->input->get('di');
        $studentInfoId =$this->input->get('sid');
        $data['studentInfo'] = $this->studentmodel->studentDetails($id);
        $data['photo'] = $this->studentmodel->studentPhoto($studentInfoId);

        $this->load->view('temp/header');
        $this->load->view('studentsDetails', $data);
        $this->load->view('temp/footer');
        }

    //This function is use for edit student's informations.
    public function editStudent()
        {
        $userId =$this->input->get('userId');
        $studentInfoId =$this->input->get('sid');
        $studentClass =$this->input->get('di');
        $class =$this->input->get('class');

        if ($this->input->post('submit',TRUE)) {
            $username = $this->input->post('first_name',TRUE) . ' ' . $this->input->post('last_name',TRUE);
            $additional_data = array(
                'first_name' => $this->db->escape_like_str($this->input->post('first_name',TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name',TRUE)),
                'username' => $this->db->escape_like_str($username),
                'phone' => $this->db->escape_like_str($this->input->post('phone',TRUE)),
                'email' => $this->db->escape_like_str($this->input->post('email',TRUE))
            );

            $this->db->where('id', $userId);
            $this->db->update('users', $additional_data);

            $studentsInfo = array(
                'student_id' => $this->db->escape_like_str($this->input->post('student_id',TRUE)),
                'roll_number' => $this->db->escape_like_str($this->input->post('roll_number',TRUE)),
                'class' => $this->db->escape_like_str($this->input->post('class',TRUE)),
                'section' => $this->db->escape_like_str($this->input->post('section',TRUE)),
                'farther_name' => $this->db->escape_like_str($this->input->post('father_name',TRUE)),
                'mother_name' => $this->db->escape_like_str($this->input->post('mother_name',TRUE)),
                'birth_date' => $this->db->escape_like_str($this->input->post('birthdate',TRUE)),
                'sex' => $this->db->escape_like_str($this->input->post('sex',TRUE)),
                'present_address' => $this->db->escape_like_str($this->input->post('present_address',TRUE)),
                'permanent_address' => $this->db->escape_like_str($this->input->post('permanent_address',TRUE)),
                'father_occupation' => $this->db->escape_like_str($this->input->post('father_occupation',TRUE)),
                'father_incom_range' => $this->db->escape_like_str($this->input->post('father_incom_range',TRUE)),
                'mother_occupation' => $this->db->escape_like_str($this->input->post('mother_occupation',TRUE)),
                'last_class_certificate' => $this->db->escape_like_str($this->input->post('previous_certificate',TRUE)),
                't_c' => $this->db->escape_like_str($this->input->post('tc',TRUE)),
                'academic_transcription' => $this->db->escape_like_str($this->input->post('at',TRUE)),
                'national_birth_certificate' => $this->db->escape_like_str($this->input->post('nbc',TRUE)),
                'testimonial' => $this->db->escape_like_str($this->input->post('testmonial',TRUE)),
                'documents_info' => $this->db->escape_like_str($this->input->post('submit_file_information',TRUE)),
                'date' => $this->db->escape_like_str(date("d/m/Y"))
            );


            $this->db->where('id', $studentInfoId);
            $this->db->update('student_info', $studentsInfo);

            $additionalData3 = array(
                'class_title' => $this->db->escape_like_str($this->input->post('class')),
                'student_title' => $this->db->escape_like_str($username),
                'section' => $this->db->escape_like_str($this->input->post('section'))
            );


            $this->db->where('id', $studentClass);
            $this->db->update('class_students', $additionalData3);

            $data['success'] = '<div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                    <strong>Success!</strong> The student admitted successfully.
                                            </div>';
            $data['classStudents'] = $this->common->getWhere('class_students', 'id', $studentClass);
            $data['studentInfo'] = $this->common->getWhere('student_info', 'id', $studentInfoId);
            $data['users'] = $this->common->getWhere('users', 'id', $userId);
            $data['s_class'] = $this->common->getAllData('class');
            $data['section'] = $this->studentmodel->section($class);

            $this->load->view('temp/header');
            $this->load->view('editStudentInfo', $data);
            $this->load->view('temp/footer');
        } else {
            //first here load the edit student view with student's previous value.
            $data['classStudents'] = $this->common->getWhere('class_students', 'id', $studentClass);
            $data['studentInfo'] = $this->common->getWhere('student_info', 'id', $studentInfoId);
            $data['users'] = $this->common->getWhere('users', 'id', $userId);
            $data['s_class'] = $this->common->getAllData('class');
            $data['section'] = $this->studentmodel->section($class);

            $this->load->view('temp/header');
            $this->load->view('editStudentInfo', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function is use for delete a student.
    public function studentDelete()
        {
        $id =$this->input->get('di');
        $studentInfoId =$this->input->get('sid');
        $userId =$this->input->get('userId');

        $this->db->delete('class_students', array('id' => $id));
        $this->db->delete('student_info', array('id' => $studentInfoId));
        $this->db->delete('users', array('id' => $userId));
        }

    public function test()
        {
        $this->load->view('temp/header');
        $this->load->view('editStudentInfo');
        $this->load->view('temp/footer');
        }

    }
