<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends CI_Controller
    {

    /**
     * This controller is using for add new users (New Student,Teacher and Parents) in this system 
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=users
     * 	- or -  
     * 		http://example.com/index.php?module=users&view=<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database();
        $this->lang->load('auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    //This function is using for add new student
    function admission()
        {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('module=auth', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
        $this->form_validation->set_rules('father_name', 'Father\'s Name', 'required|xss_clean');
        $this->form_validation->set_rules('mother_name', 'Mother\'s Name', 'required|xss_clean');
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'required|xss_clean');
        $this->form_validation->set_rules('sex', 'Sex', 'required|xss_clean');
        $this->form_validation->set_rules('present_address', 'Present Address', 'required|xss_clean');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required|xss_clean');
        $this->form_validation->set_rules('father_occupation', 'Father\'s Occupation', 'required|xss_clean');
        $this->form_validation->set_rules('father_incom_range', 'Father_incom_range', 'required|xss_clean');
        $this->form_validation->set_rules('mother_occupation', 'Mother_occupation', 'required|xss_clean');

        $this->form_validation->set_rules('class', 'Class', 'required');


        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email = strtolower($this->input->post('email',TRUE));
            $password = $this->input->post('password',TRUE);


            //Here is uploading the student's photo.
            $config['upload_path'] = './assets/uploads/studentPicture/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';

            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();

            //This array information's are sending to "user" table as a core information as a user this system
            $additional_data = array(
                'first_name' => $this->db->escape_like_str($this->input->post('first_name',TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name',TRUE)),
                'phone' => $this->db->escape_like_str($this->input->post('phone',TRUE)),
                'profile_image' => $uploadFileInfo['file_name']
            );

            $group_ids = array(
                'group_id' => 3
            );

            //This array information's are sending to "student_info" table.
            $studentsInfo = array(
                'user_id' => $this->db->escape_like_str($this->common->usersId()),
                'student_id' => $this->db->escape_like_str($this->input->post('student_id',TRUE)),
                'roll_number' => $this->db->escape_like_str($this->input->post('roll_number',TRUE)),
                'student_nam' => $this->db->escape_like_str($username),
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
                'student_photo' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                'last_class_certificate' => $this->db->escape_like_str($this->input->post('previous_certificate',TRUE)),
                't_c' => $this->db->escape_like_str($this->input->post('tc',TRUE)),
                'academic_transcription' => $this->db->escape_like_str($this->input->post('at',TRUE)),
                'national_birth_certificate' => $this->db->escape_like_str($this->input->post('nbc',TRUE)),
                'testimonial' => $this->db->escape_like_str($this->input->post('testmonial',TRUE)),
                'documents_info' => $this->db->escape_like_str($this->input->post('submit_file_information',TRUE)),
                'date' => $this->db->escape_like_str(date('dd ([ \t.-])* m ([ \t.-])* y'))
            );
            $this->db->insert('student_info', $studentsInfo);


            $additionalData3 = array(
                'roll_number' => $this->db->escape_like_str($this->input->post('roll_number',TRUE)),
                'class_title' => $this->db->escape_like_str($this->input->post('class',TRUE)),
                'student_id' => $this->db->escape_like_str($this->input->post('student_id',TRUE)),
                'student_title' => $this->db->escape_like_str($username),
                'user_id' => $this->db->escape_like_str($this->common->usersId()),
                'student_info_id' => $this->db->escape_like_str($this->common->studentInfoId()),
                'section' => $this->db->escape_like_str($this->input->post('section',TRUE))
            );

            $this->db->insert('class_students', $additionalData3);
            $classTitle = $this->db->escape_like_str($this->input->post('class',TRUE));
            $studentAmount = $this->common->classStudentAmount($classTitle);
            $clas_info = array(
                'student_amount' => $this->db->escape_like_str($studentAmount)
            );

            $this->db->where('class_title', $classTitle);
            $this->db->update('clas_info', $clas_info);
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $group_ids)) {
            //check to see if we are creating the user.
            //redirect them back to the admission page.
            // View the success message for administator.
            $data['success'] = '<div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                    <strong>Success!</strong> The student admitted successfully.
                                            </div>';

            //Load the admission form again for new student. 
            $data['s_class'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('add_new_student', $data);
            $this->load->view('temp/footer');
        } else {
            $data['s_class'] = $this->common->getAllData('class');

            //display the create user form
            $this->load->view('temp/header');
            $this->load->view('add_new_student', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function add teacher in this function
    function addTeacher()
        {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('module=auth', 'refresh');
        }
        $this->load->database();

        $tables = $this->config->item('tables', 'ion_auth');
        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        $this->form_validation->set_rules('father_name', 'Father\'s Name', 'required|xss_clean');
        $this->form_validation->set_rules('mother_name', 'Mother\'s Name', 'required|xss_clean');
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'required|xss_clean');
        $this->form_validation->set_rules('sex', 'Sex', 'required|xss_clean');
        $this->form_validation->set_rules('present_address', 'Present Address', 'required|xss_clean');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required|xss_clean');


        $this->form_validation->set_rules('position', 'Post position', 'required|xss_clean');
        $this->form_validation->set_rules('workingHoure', 'Working Houre', 'required|xss_clean');
        $edu_1 = '';
        $edu_2 = '';
        $edu_3 = '';
        $edu_4 = '';
        $edu_5 = '';
        $dd_1 = $this->input->post('dd_1',TRUE);
        if (!empty($dd_1)) {
            $this->form_validation->set_rules('scu_1', 'School/College/University 1st fild', 'required');
            $this->form_validation->set_rules('result_1', 'Result  1st fild', 'required');
            $this->form_validation->set_rules('paYear_1', 'Passing year 1st fild', 'required');
            $edu_1 = $this->input->post('dd_1',TRUE) . ',' . $this->input->post('scu_1',TRUE) . ',' . $this->input->post('result_1',TRUE) . ',' . $this->input->post('paYear_1',TRUE);
        }

        $dd_2 = $this->input->post('dd_2',TRUE);
        if (!empty($dd_2)) {
            $this->form_validation->set_rules('scu_2', 'School/College/University 2st fild', 'required');
            $this->form_validation->set_rules('result_2', 'Result  2st fild', 'required');
            $this->form_validation->set_rules('paYear_2', 'Passing year 2st fild', 'required');
            $edu_2 = $this->input->post('dd_2',TRUE) . ',' . $this->input->post('scu_2',TRUE) . ',' . $this->input->post('result_2',TRUE) . ',' . $this->input->post('paYear_2',TRUE);
        }

        $dd_3 = $this->input->post('dd_3',TRUE);
        if (!empty($dd_3)) {
            $this->form_validation->set_rules('scu_3', 'School/College/University 3st fild', 'required');
            $this->form_validation->set_rules('result_3', 'Result  3st fild', 'required');
            $this->form_validation->set_rules('paYear_3', 'Passing year 3st fild', 'required');
            $edu_3 = $this->input->post('dd_3',TRUE) . ',' . $this->input->post('scu_3',TRUE) . ',' . $this->input->post('result_3',TRUE) . ',' . $this->input->post('paYear_3',TRUE);
        }

        $dd_4 = $this->input->post('dd_4',TRUE);
        if (!empty($dd_4)) {
            $this->form_validation->set_rules('scu_4', 'School/College/University 4st fild', 'required');
            $this->form_validation->set_rules('result_4', 'Result  4st fild', 'required');
            $this->form_validation->set_rules('paYear_4', 'Passing year 4st fild', 'required');
            $edu_4 = $this->input->post('dd_4',TRUE) . ',' . $this->input->post('scu_4',TRUE) . ',' . $this->input->post('result_4',TRUE) . ',' . $this->input->post('paYear_4',TRUE);
        }

        $dd_5 = $this->input->post('dd_5',TRUE);
        if (!empty($dd_5)) {
            $this->form_validation->set_rules('scu_5', 'School/College/University 5st fild', 'required');
            $this->form_validation->set_rules('result_5', 'Result  5st fild', 'required');
            $this->form_validation->set_rules('paYear_5', 'Passing year 5st fild', 'required');
            $edu_5 = $this->input->post('dd_5',TRUE) . ',' . $this->input->post('scu_5',TRUE) . ',' . $this->input->post('result_5',TRUE) . ',' . $this->input->post('paYear_5',TRUE);
        }

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name',TRUE)) . ' ' . strtolower($this->input->post('last_name',TRUE));
            $email = strtolower($this->input->post('email',TRUE));
            $password = $this->input->post('password',TRUE);

            //here is upload the teacher's photo.
            $config['upload_path'] = './assets/uploads/teachersPicture/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';

            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();

            //This array information's are sending to "user" table as a core information as a user this system.
            $additional_data = array(
                'first_name' => $this->db->escape_like_str($this->input->post('first_name',TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('last_name',TRUE)),
                'phone' => $this->db->escape_like_str($this->input->post('phone',TRUE)),
                'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
            );

            $group_ids = array(
                'group_id' => $this->db->escape_like_str(4)
            );

            //This array information's are sending to "teachers_info" table.
            $teachersInfo = array(
                'user_id' => $this->db->escape_like_str($this->common->usersId()),
                'fullname' => $this->db->escape_like_str($username),
                'farther_name' => $this->db->escape_like_str($this->input->post('father_name',TRUE)),
                'mother_name' => $this->db->escape_like_str($this->input->post('mother_name',TRUE)),
                'birth_date' => $this->db->escape_like_str($this->input->post('birthdate',TRUE)),
                'sex' => $this->db->escape_like_str($this->input->post('sex',TRUE)),
                'present_address' => $this->db->escape_like_str($this->input->post('present_address',TRUE)),
                'permanent_address' => $this->db->escape_like_str($this->input->post('permanent_address',TRUE)),
                'position' => $this->db->escape_like_str($this->input->post('position',TRUE)),
                'working_hour' => $this->db->escape_like_str($this->input->post('workingHoure',TRUE)),
                'educational_qualification_1' => $this->db->escape_like_str($edu_1),
                'educational_qualification_2' => $this->db->escape_like_str($edu_2),
                'educational_qualification_3' => $this->db->escape_like_str($edu_3),
                'educational_qualification_4' => $this->db->escape_like_str($edu_4),
                'educational_qualification_5' => $this->db->escape_like_str($edu_5),
                'teachers_photo' => $this->db->escape_like_str($uploadFileInfo['file_name']),
                'cv' => $this->db->escape_like_str($this->input->post('cv',TRUE)),
                'educational_certificat' => $this->db->escape_like_str($this->input->post('educational_certificat',TRUE)),
                'exprieance_certificatte' => $this->db->escape_like_str($this->input->post('exc',TRUE)),
                'files_info' => $this->db->escape_like_str($this->input->post('submited_info',TRUE))
            );
            $this->db->insert('teachers_info', $teachersInfo);
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $group_ids)) {

            //Load the Teachers Information's page after Add New Teacher.
            redirect('module=teachers&view=allTeachers', 'refresh');
        } else {
            //display the create user form
            $this->load->view('temp/header');
            $this->load->view('add_new_teacher');
            $this->load->view('temp/footer');
        }
        }

    //This function is returning student id and roll number by class title , runing year
    public function student_info()
        {
        $Class_title = $this->input->get('q',TRUE);
        $query = $this->common->getWhere('class', 'class_title', $Class_title);
        foreach ($query as $row) {
            $data = $row;
        }
        $Class_id = $data['classCode'];

        //making here Class Section fild.
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);

            echo '<div class="form-group">
                        <label class="col-md-3 control-label">session <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="section" class="form-control">
                                <option value="">Select one</option>';
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

        //making here StudentID Unick number.
        if (strlen($Class_id) == 1) {
            $classId = '0' . $Class_id;
        } elseif (strlen($Class_id) == 2) {
            $classId = $Class_id;
        }
        $roll = $this->common->rollNumber($Class_title);
        if (strlen($roll) == 1) {
            $rollNumber = '00' . $roll;
        } elseif (strlen($roll) == 2) {
            $rollNumber = '0' . $roll;
        } elseif (strlen($roll) == 3) {
            $rollNumber = $roll;
        }
        $finalStudentId = date("Y") . $classId . $rollNumber;

        echo '<div class="form-group">
                    <label class="col-md-3 control-label">Student\'s ID <span class="requiredStar"> * </span></label>
                    <div class="col-md-6">
                        <input type="text" name="student_id" class="form-control" value="' . $finalStudentId . '" readonly>
                    </div>
                </div>';


        //making here Class Roll Number fild.
        echo '<div class="form-group">
                    <label class="col-md-3 control-label">Roll Number <span class="requiredStar"> * </span></label>
                    <div class="col-md-6">
                        <input type="text" name="roll_number" class="form-control" value="' . $rollNumber . '" readonly>
                    </div>
                </div>';
        }

    //This function is using for add new parents
    function addParents()
        {
        
        if ($this->input->post('submit',TRUE)) {
            //validate form input
            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
            $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
            $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required|xss_clean');

            if ($this->form_validation->run() == true) {
                $username = strtolower($this->input->post('first_name',TRUE)) . ' ' . strtolower($this->input->post('last_name',TRUE));
                $email = strtolower($this->input->post('email',TRUE));
                $password = $this->input->post('password',TRUE);


                //Here is uploading the student's photo.
                $config['upload_path'] = './assets/uploads/gurdiant/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['max_width'] = '10240';
                $config['max_height'] = '7680';

                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $uploadFileInfo = $this->upload->data();
                $this->upload->display_errors('<p>', '</p>');


                $additional_data = array(
                    'first_name' => $this->db->escape_like_str($this->input->post('first_name',TRUE)),
                    'last_name' => $this->db->escape_like_str($this->input->post('last_name',TRUE)),
                    'phone' => $this->db->escape_like_str($this->input->post('phone',TRUE)),
                    'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
                );


                $student_id = $this->input->post('studentID',TRUE);
                $classTitle = $this->input->post('class_title',TRUE);
                $relation = $this->input->post('guardianRelation',TRUE);


                $additionalData1 = array(
                    'user_id' => $this->db->escape_like_str($this->common->usersId()),
                    'student_id' => $this->db->escape_like_str($student_id),
                    'student_class' => $this->db->escape_like_str($classTitle),
                    'parents_name' => $this->db->escape_like_str($username),
                    'relation' => $this->db->escape_like_str($relation),
                    'email' => $this->db->escape_like_str($this->input->post('email',TRUE)),
                    'phone' => $this->db->escape_like_str($this->input->post('phone',TRUE))
                );

                $group_ids = array(
                    'group_id' => $this->db->escape_like_str(5)
                );

                $this->db->insert('parents-info', $additionalData1);
            }
            if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $group_ids)) {
                //check to see if we are creating the user
                //redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("module=parents&view=parentsInformation", 'refresh');
            }
        } else {
            $data['s_class'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('makeProfile', $data);
            $this->load->view('temp/footer');
        }
        }

    //Whene give the student id from the frontend input file.
    //Then this function return student information
    public function ajaxStudentInfo()
        {
        $classTitle = $this->input->get('q',TRUE);
        $query = $this->common->getWhere('student_info', 'class', $classTitle);
        foreach ($query as $row) {
            $data[] = $row;
        }
        if (!empty($data)) {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <select name="studentID" class="form-control">
                                <option value="all">Select Student ID</option>';
            foreach ($data as $sec) {
                echo '<option value="' . $sec['student_id'] . '">' . $sec['student_nam'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ID - <span>' . $sec['student_id'] . '</span></option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            echo '<div class="form-group">
                    <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Info:</strong> This Class has no student.
                    </div></div></div>';
        }
        }

    }
