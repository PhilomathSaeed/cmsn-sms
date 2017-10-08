<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Sclass extends MX_Controller
    {

    /**
     * This controller is use for add class and maintain class
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=Sclass
     * 	- or -  
     * 		http://example.com/index.php?module=Sclass&view=<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->model('classmodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('module=auth&view=login');
        }
        }

    //This function is useing for add a new class and section.
    public function addClass()
        {
        if ($this->input->post('submit',TRUE)) {
            $classTitle = $this->input->post('class_title',TRUE);
            $group = $this->input->post('group',TRUE);

            if ($this->input->post('group_2',TRUE)) {
                $group = $this->input->post('group',TRUE) . ',' . $this->input->post('group_2',TRUE);
            }
            if ($this->input->post('group_3',TRUE)) {
                $group = $this->input->post('group',TRUE) . ',' . $this->input->post('group_2',TRUE) . ',' . $this->input->post('group_3',TRUE);
            }

            $section = $this->input->post('section',TRUE);

            if ($this->input->post('section_2',TRUE)) {
                $section = $this->input->post('section',TRUE) . ',' . $this->input->post('section_2',TRUE);
            }
            if ($this->input->post('section_3',TRUE)) {
                $section = $this->input->post('section',TRUE) . ',' . $this->input->post('section_2',TRUE) . ',' . $this->input->post('section_3',TRUE);
            }
            if ($this->input->post('section_4',TRUE)) {
                $section = $this->input->post('section',TRUE) . ',' . $this->input->post('section_2',TRUE) . ',' . $this->input->post('section_3',TRUE) . ',' . $this->input->post('section_4',TRUE);
            }
            if ($this->input->post('section_5',TRUE)) {
                $section = $this->input->post('section',TRUE) . ',' . $this->input->post('section_2',TRUE) . ',' . $this->input->post('section_3',TRUE) . ',' . $this->input->post('section_4',TRUE) . ',' . $this->input->post('section_5',TRUE);
            }
            
            $capicity = $this->input->post('capicity',TRUE);
            $tableData = array(
                'class_title' => $this->db->escape_like_str($classTitle),
                'class_group' => $this->db->escape_like_str($group),
                'section' => $this->db->escape_like_str($section),
                'section_student_capacity' => $this->db->escape_like_str($capicity),
            );
            $classId = $this->classmodel->nextClassId();

            $additonalData = array(
                'class_id' => $this->db->escape_like_str($classId),
                'class_title' => $this->db->escape_like_str($classTitle)
            );

            if ($this->db->insert('class', $tableData) && $this->db->insert('clas_info', $additonalData)) {
                $data['success'] = '<div class="alert alert-info alert-dismissable admisionSucceassMessageFont">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                            <strong>Success!</strong> Add Class "' . $classTitle . '" successfully.
                                    </div>';
                $data['classInfo'] = $this->common->getAllData('clas_info');
                $this->load->view('temp/header');
                $this->load->view('allClass', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['teacher'] = $this->common->getAllData('teachers_info');

            $this->load->view('temp/header');
            $this->load->view('addClassSection', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function is useing for geting all class short information
    public function allClass()
        {
        $data['classInfo'] = $this->common->getAllData('clas_info');
        $this->load->view('temp/header');
        $this->load->view('allClass', $data);
        $this->load->view('temp/footer');
        }

    //This function is useing for a class's full informtion
    public function classDetails()
        {
        $classTitle = $this->input->get('class');
        $data['class'] = $this->common->getWhere('class', 'class_title', $classTitle);
        $data['classInfo'] = $this->common->getWhere('clas_info', 'class_title', $classTitle);
        $data['classTile'] = $classTitle;
        $data['day'] = $this->common->getAllData('config_week_day');
        $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
        $data['teacher'] = $this->common->getAllData('teachers_info');
        $data['totalStudent'] = $this->classmodel->totalClassStudent($classTitle);
        $data['classSection'] = $this->classmodel->totalClassSection($classTitle);
        $this->load->view('temp/header');
        $this->load->view('classDetails', $data);
        $this->load->view('temp/footer');
        }

    //This function lode the view for select which class routine add or make
    public function selectClassRoutin()
        {
        $data['classTile'] = $this->common->getAllData('class');
        $data['day'] = $this->common->getAllData('config_week_day');
        $this->load->view('temp/header');
        $this->load->view('selectClassRoutine', $data);
        $this->load->view('temp/footer');
        }

    //This function is useing for add new class routine
    public function addClassRoutin()
        {
        $classTitle = $this->input->post('class',TRUE);
        //if admin set section for any class then bellow [if(){ condition]  will execute ***(Start)***
        if ($this->input->post('section',TRUE)) {
            $section = $this->input->post('section',TRUE);
            //if admin set "all" section for any class then bellow [if(){ condition]  will execute ***(Start)***
            if ($section == 'all') {
                if ($this->input->post('submit2',TRUE)) {
                    $day = $this->input->post('day',TRUE);
                    $subject = $this->input->post('subject',TRUE);
                    $teacher = $this->input->post('teacher',TRUE);
                    $startTime = $this->input->post('startTime',TRUE);
                    $endTime = $this->input->post('endTime',TRUE);
                    $roomNumber = $this->input->post('roomNumber',TRUE);
                    $tableData = array(
                        'class_title' => $this->db->escape_like_str($classTitle),
                        'day_title' => $this->db->escape_like_str($day),
                        'section' => $this->db->escape_like_str($section),
                        'subject' => $this->db->escape_like_str($subject),
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                        'start_time' => $this->db->escape_like_str($startTime),
                        'end_time' => $this->db->escape_like_str($endTime),
                        'room_number' => $this->db->escape_like_str($roomNumber)
                    );
                    $tableData2 = array(
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                    );

                    //$this->db->where(array('class_title' => $classTitle , 'subject_title' =>$subject ));
                    if ($this->db->insert('class_routine', $tableData) && $this->db->update('class_subject', $tableData2, array('class_title' => $classTitle, 'subject_title' => $subject))) {
                        $data['classTile'] = $classTitle;
                        $data['day'] = $this->common->getAllData('config_week_day');
                        $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                        $data['teacher'] = $this->common->getAllData('teachers_info');
                        $this->load->view('temp/header');
                        $this->load->view('addClassRoutin', $data);
                        $this->load->view('temp/footer');
                    }
                } else {
                    $data['classTile'] = $classTitle;
                    $data['day'] = $this->common->getAllData('config_week_day');
                    $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                    $data['teacher'] = $this->common->getAllData('teachers_info');
                    $this->load->view('temp/header');
                    $this->load->view('addClassRoutin', $data);
                    $this->load->view('temp/footer');
                }
            }
            //if admin set "Section A or any specific section" for any class then bellow [ealse{ condition]  will execute ***(Start)***
            else {
                if ($this->input->post('submit2', TRUE)) {
                    $day = $this->input->post('day',TRUE);
                    $subject = $this->input->post('subject',TRUE);
                    $teacher = $this->input->post('teacher',TRUE);
                    $startTime = $this->input->post('startTime',TRUE);
                    $endTime = $this->input->post('endTime',TRUE);
                    $roomNumber = $this->input->post('roomNumber',TRUE);
                    $tableData = array(
                        'class_title' => $this->db->escape_like_str($classTitle),
                        'day_title' => $this->db->escape_like_str($day),
                        'section' => $this->db->escape_like_str($section),
                        'subject' => $this->db->escape_like_str($subject),
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                        'start_time' => $this->db->escape_like_str($startTime),
                        'end_time' => $this->db->escape_like_str($endTime),
                        'room_number' => $this->db->escape_like_str($roomNumber)
                    );
                    $tableData2 = array(
                        'subject_teacher' => $this->db->escape_like_str($teacher),
                    );

                    // $this->db->where(array('class_title' => $classTitle , 'subject_title' =>$subject ));
                    if ($this->db->insert('class_routine', $tableData) && $this->db->update('class_subject', $tableData2, array('class_title' => $classTitle, 'subject_title' => $subject))) {
                        $data['classTile'] = $classTitle;
                        $data['day'] = $this->common->getAllData('config_week_day');
                        $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                        $data['teacher'] = $this->common->getAllData('teachers_info');
                        $this->load->view('temp/header');
                        $this->load->view('addClassRoutin', $data);
                        $this->load->view('temp/footer');
                    }
                } else {
                    $data['classTile'] = $classTitle;
                    $data['day'] = $this->common->getAllData('config_week_day');
                    $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                    $data['teacher'] = $this->common->getAllData('teachers_info');
                    $this->load->view('temp/header');
                    $this->load->view('addClassRoutin', $data);
                    $this->load->view('temp/footer');
                }
            }
        }
        //if admin do not set section for any class then bellow [else{ condition]  will execute ***(Start)***
        else {
            if ($this->input->post('submit2',TRUE)) {
                $day = $this->input->post('day',TRUE);
                $subject = $this->input->post('subject',TRUE);
                $teacher = $this->input->post('teacher',TRUE);
                $startTime = $this->input->post('startTime',TRUE);
                $endTime = $this->input->post('endTime',TRUE);
                $roomNumber = $this->input->post('roomNumber',TRUE);
                $tableData = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'day_title' => $this->db->escape_like_str($day),
                    'subject' => $this->db->escape_like_str($subject),
                    'subject_teacher' => $this->db->escape_like_str($teacher),
                    'start_time' => $this->db->escape_like_str($startTime),
                    'end_time' => $this->db->escape_like_str($endTime),
                    'room_number' => $this->db->escape_like_str($roomNumber)
                );
                $tableData2 = array(
                    'subject_teacher' => $this->db->escape_like_str($teacher),
                );

                //$this->db->where(array('class_title' => $classTitle,'subject_title' =>$subject));
                if ($this->db->insert('class_routine', $tableData) && $this->db->update('class_subject', $tableData2, array('class_title' => $classTitle, 'subject_title' => $subject))) {
                    $data['classTile'] = $classTitle;
                    $data['day'] = $this->common->getAllData('config_week_day');
                    $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                    $data['teacher'] = $this->common->getAllData('teachers_info');
                    $this->load->view('temp/header');
                    $this->load->view('addClassRoutin', $data);
                    $this->load->view('temp/footer');
                }
            } else {
                $data['classTile'] = $classTitle;
                $data['day'] = $this->common->getAllData('config_week_day');
                $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                $data['teacher'] = $this->common->getAllData('teachers_info');
                $this->load->view('temp/header');
                $this->load->view('addClassRoutin', $data);
                $this->load->view('temp/footer');
            }
        }
        }

    //This function gives us class section and class info.
    public function ajaxClassInfo()
        {
        $classTitle = $this->input->get('q');
        $query = $this->common->getWhere('class', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data = $row;
        }
        echo '<input type="hidden" name="class" value="' . $classTitle . '">';
        if (!empty($data['section'])) {
            $section = $data['section'];
            $sectionArray = explode(",", $section);
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Section <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
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

    //This function gives a view for serlect class routine
    public function selectAllRoutine()
        {
        $data['classTile'] = $this->common->getAllData('class');
        $data['day'] = $this->common->getAllData('config_week_day');
        $this->load->view('temp/header');
        $this->load->view('selectAllRoutine', $data);
        $this->load->view('temp/footer');
        }

    //This function gives a class routine after selecting a class
    public function allClassRoutine()
        {
        if ($this->input->post('submit',TRUE)) {
            $classTitle = $this->input->post('class',TRUE);
            $data['classTile'] = $classTitle;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('viewRoutine', $data);
            $this->load->view('temp/footer');
        } else {
            
        }
        }

    //By this function edit routine previous information 
    public function editRoutine()
        {
        $routinClassId = $this->input->get('id',TRUE);
        $classTitle = $this->input->get('class',TRUE);
        if ($this->input->post('update', TRUE)) {
            $day = $this->input->post('day',TRUE);
            $subject = $this->input->post('subject',TRUE);
            $teacher = $this->input->post('teacher',TRUE);
            $startTime = $this->input->post('startTime',TRUE);
            $endTime = $this->input->post('endTime',TRUE);
            $roomNumber = $this->input->post('roomNumber',TRUE);
            $tableData = array(
                'day_title' => $this->db->escape_like_str($day),
                'subject' => $this->db->escape_like_str($subject),
                'subject_teacher' => $this->db->escape_like_str($teacher),
                'start_time' => $this->db->escape_like_str($startTime),
                'end_time' => $this->db->escape_like_str($endTime),
                'room_number' => $this->db->escape_like_str($roomNumber)
            );
            $this->db->where('id', $routinClassId);
            if ($this->db->update('class_routine', $tableData)) {
                $data['classTile'] = $classTitle;
                $data['day'] = $this->common->getAllData('config_week_day');
                $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                $data['teacher'] = $this->common->getAllData('teachers_info');
                $this->load->view('temp/header');
                $this->load->view('viewRoutine', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['classTile'] = $classTitle;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
            $data['previousRoutin'] = $this->common->getWhere('class_routine', 'id', $routinClassId);
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $this->load->view('temp/header');
            $this->load->view('editRoutine', $data);
            $this->load->view('temp/footer');
        }
        }

    //By this function we can delet a class routine
    public function deleteRoutine()
        {
        $routinClassId = $this->input->get('id');
        $classTitle = $this->input->get('class');
        if ($this->db->delete('class_routine', array('id' => $routinClassId))) {
            $data['classTile'] = $classTitle;
            $data['day'] = $this->common->getAllData('config_week_day');
            $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
            $data['teacher'] = $this->common->getAllData('teachers_info');
            $data['message'] = '<div class="alert alert-warning alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
								<strong>Warning!</strong> Something went wrong. Please check.
							</div>';
            $this->load->view('temp/header');
            $this->load->view('viewRoutine', $data);
            $this->load->view('temp/footer');
        }
        }

    }
