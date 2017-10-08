<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller
    {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=home
     * 	- or -  
     * 		http://example.com/index.php?module=home&view=index
     */
    function __construct()
        {
        parent::__construct();
        $this->load->model('common');
        $this->load->helper('file');
        $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    public function index()
        {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data['massage'] = $this->common->getWhere('massage', 'receiver_id', $id);
        $data['totalStudent'] = $this->common->totalStudent();
        $data['totalTeacher'] = $this->common->totalTeacher();
        $data['totalParents'] = $this->common->totalParents();
        $data['totalAttendStudent'] = $this->common->totalAttendStudent();

        if ($this->ion_auth->is_admin()) {
            $data['notice'] = $this->common->getAllData('notice_board');
            $data['classAttendance'] = $this->common->getAllData('clas_info');
            $data['classInfo'] = $this->common->classInfo();
        } elseif ($this->ion_auth->is_teacher()) {
            //If this user have teacher's previlize, he can view only that notice whice notice is created for only teacher.
            $data['notice'] = $this->common->getTeacherNotice();
        } elseif ($this->ion_auth->is_student()) {
            //Whice notice is created for student these notice can see both students and parents.
            $data['notice'] = $this->common->getStudentNotice();
            $query = $this->common->getWhere('student_info', 'user_id', $id);
            foreach ($query as $row) {
                $classTitle = $row['class'];
            }
            $data['classTile'] = $classTitle;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
            $data['teacher'] = $this->common->getAllData('teachers_info');
        } elseif ($this->ion_auth->is_parents()) {
            //Whice notice is created for student these notice can see both students and parents.
            $data['notice'] = $this->common->getStudentNotice();
        }
        $this->load->view('temp/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('temp/footer');
        }

    public function profileView()
        {
        $user = $this->ion_auth->user()->row();
        $data['userprofile'] = $this->common->getWhere('users', 'id', $user->id);

        if ($this->input->post('submit',TRUE)) {
            $data_up = array(
                'first_name' => $this->db->escape_like_str($this->input->post('firstName',TRUE)),
                'last_name' => $this->db->escape_like_str($this->input->post('lastName',TRUE)),
                'username' => $this->db->escape_like_str($this->input->post('userName',TRUE)),
                'phone' => $this->db->escape_like_str($this->input->post('mobileNumber',TRUE)),
                'email' => $this->db->escape_like_str($this->input->post('email',TRUE)),
                'short_description' => $this->db->escape_like_str($this->input->post('description',TRUE))
            );

            $this->db->where('id', $user->id);
            
            if ($this->db->update('users', $data_up)) {
                redirect('module=home&view=profileView', 'refresh');
            }
            
        } else {
            $this->load->view('temp/header');
            $this->load->view('profileView', $data);
            $this->load->view('temp/footer');
        }
        }

    public function profileImage()
        {
        $user = $this->ion_auth->user()->row();
        $path = 'assets/uploads/profilePicture/' . $user->profile_image;

        //$userprofile = $this->common->getWhere('users', 'id',$user->id);
        if (unlink($path)) {
            //Here is uploading the student's photo.
            $config['upload_path'] = './assets/uploads/profilePicture/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';

            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $uploadFileInfo = $this->upload->data();
            $data_update = array(
                'profile_image' => $this->db->escape_like_str($uploadFileInfo['file_name'])
            );
            $this->db->where('id', $user->id);
            if ($this->db->update('users', $data_update)) {
                redirect('module=home&view=profileView', 'refresh');
            }
        } else {
            echo 'File is not Deleted then Try again';
        }
        }

    public function calender()
        {
        $this->load->view('temp/header');
        $this->load->view('calender');
        $this->load->view('temp/footer');
        }

    public function iceTime()
        {
        $time = $this->common->iceTime();
        }
    }
