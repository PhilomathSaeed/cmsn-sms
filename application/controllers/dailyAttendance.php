<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class DailyAttendance extends MX_Controller
    {

    private $input;

    /**
     * This is DailyAttendance Controller in Class Module.
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=dailyAttendance
     * 	- or -  
     * 		http://example.com/index.php?module=dailyAttendance&view=index
     */
    function __construct()
        {
        parent::__construct();
        $this->load->model('attendancemodule');
        if (!$this->ion_auth->logged_in()) {
            redirect('module=auth&view=login');
        }
        }

    public function selectClassAttendance()
        {
        $data['s_class'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('selectClassAttendance', $data);
        $this->load->view('temp/footer');
        }

    //This function is used for take attendence to class students
    public function attendance()
        {

        if ($this->input->post('submit',TRUE)) {
            //Whene submit the attendence information after takeing the attendence
            $i = $this->input->post('in_velu',TRUE);
            $day = date("m/d/y");
            $date = strtotime($day);
            $classTitle = $this->input->post('classTitle',TRUE);
            for ($x = 1; $x <= $i; $x++) {
                $roll = $this->input->post("roll_$x",TRUE);
                $name = $this->input->post("atudentName_$x",TRUE);
                $present = "";
                if ($this->input->post("action_$x",TRUE)) {
                    if ($this->input->post("action_$x",TRUE) === 'P') {
                        $present = "P";
                    } else {
                        $present = "A";
                    }
                }
                $userId = $this->input->post("userId_$x",TRUE);
                $studentInfoId = $this->input->post("studentInfoId_$x",TRUE);
                $section = $this->input->post("section_$x",TRUE);

                $data = array(
                    'date' => $this->db->escape_like_str($date),
                    'user_id' => $this->db->escape_like_str($userId),
                    'student_id' => $this->db->escape_like_str($studentInfoId),
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'present_or_absent' => $this->db->escape_like_str($present),
                    'section' => $this->db->escape_like_str($section),
                    'roll_no' => $this->db->escape_like_str($roll),
                    'student_title' => $this->db->escape_like_str($name),
                );

                //insert the $data information into "daily_attendance" database.
                $this->db->insert('daily_attendance', $data);

                //Take class and attend amount monthly and make the attendence percintise monthly 
                $classAmountMonthly = $this->attendancemodule->classAmountMonthly($studentInfoId);

                if ($this->input->post("action_$x",TRUE) === 'P') {
                    $attendAmountMonthly = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                } else {
                    $previousAttendAmountM = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                    $todayAttendAmountM = 1;
                    $attendAmountMonthly = $previousAttendAmountM - $todayAttendAmountM;
                }
                $attendencePercenticeMonthly = $this->attendancemodule->attendPercentiseMonthly($attendAmountMonthly, $classAmountMonthly);

                //Take class and attend amount yearly and make the attendence percintise yearly 
                $classAmountYearly = $this->attendancemodule->classAmountYearly($studentInfoId);

                if ($this->input->post("action_$x",TRUE) === 'P'){
                    $attendAmountYearly = $this->attendancemodule->attendAmountYearly($studentInfoId);
                } else {
                    $previousAttendAmountY = $this->attendancemodule->attendAmountYearly($studentInfoId);
                    $todayAttendAmountY = 1;
                    $attendAmountYearly = $previousAttendAmountY - $todayAttendAmountY;
                }
                $attendencePercenticeYearly = $this->attendancemodule->attendPercentiseYearly($attendAmountYearly, $classAmountYearly);

                $data_1 = array(
                    'class_amount_monthly' => $this->db->escape_like_str($classAmountMonthly),
                    'class_amount_yearly' => $this->db->escape_like_str($classAmountYearly),
                    'attend_amount_monthly' => $this->db->escape_like_str($attendAmountMonthly),
                    'attend_amount_yearly' => $this->db->escape_like_str($attendAmountYearly),
                    'percentise_month' => $this->db->escape_like_str($attendencePercenticeMonthly),
                    'percentise_year' => $this->db->escape_like_str($attendencePercenticeYearly),
                );

                $this->db->update('daily_attendance', $data_1, array('student_id' => $studentInfoId, 'date' => $date));

                $data_4 = array(
                    'attendance_percentices_daily' => $this->db->escape_like_str($attendencePercenticeMonthly)
                );
                $this->db->update('class_students', $data_4, array('student_info_id' => $studentInfoId, 'class_title' => $classTitle));
            }

            $dailyClassAttendencePercentise = $this->attendancemodule->allStudentsDailyAttendence($date, $classTitle);
            $yearClassAttendencePercentise = $this->attendancemodule->allStudentsYearlyAttendence($date, $classTitle);

            $data_3 = array(
                'attendance_percentices_daily' => $this->db->escape_like_str($dailyClassAttendencePercentise),
                'attend_percentise_yearly' => $this->db->escape_like_str($yearClassAttendencePercentise)
            );
            //$this->db->update('clas_info', $data_3, array('class_title' => $classTitle));
            $this->db->where('class_title', $classTitle);
            $this->db->update('clas_info', $data_3);

            redirect('module=dailyAttendance&view=attendanceCompleteMessage', 'refresh');
        } else {
            //Load attendence view before takeing attendence with class,All section and specific class section
            $classTitle = $this->input->post('class_title',TRUE);
            if ($this->input->post('section',TRUE)) {
                $Section = $this->input->post('section',TRUE);
                if ($Section == 'all') {

                    //if want any class's specific section's students attendence sheet,then work this erea.
                    $queryData = array();
                    $query = $this->db->get_where('class_students', array('class_title' => $classTitle));
                    foreach ($query->result_array() as $row) {
                        $queryData[] = $row;
                    }$data['students'] = $queryData;
                    if (!empty($data['students'])) {
                        $this->load->view('temp/header');
                        $this->load->view('attendance', $data);
                        $this->load->view('temp/footer');
                    } else {
                        echo $classTitle . ' and all section are no any student.';
                    }
                } elseif ($Section != 'all') {

                    //if want All section's students attendence sheet,then work this erea.
                    $queryData = array();
                    $query = $this->db->get_where('class_students', array('class_title' => $classTitle, 'section' => $Section));
                    foreach ($query->result_array() as $row) {
                        $queryData[] = $row;
                    }$data['students'] = $queryData;
                    if (!empty($data['students'])) {
                        $this->load->view('temp/header');
                        $this->load->view('attendance', $data);
                        $this->load->view('temp/footer');
                    } else {
                        echo $classTitle . ' and ' . $Section . ' section are no any student.';
                    }
                }
            } else {
                //whene want any class students attendence sheet only,then work this erea.
                $queryData = array();
                $query = $this->db->get_where('class_students', array('class_title' => $classTitle));
                foreach ($query->result_array() as $row) {
                    $queryData[] = $row;
                }
                $data['students'] = $queryData;
                if (!empty($data['students'])) {
                    $this->load->view('temp/header');
                    $this->load->view('attendance', $data);
                    $this->load->view('temp/footer');
                } else {
                    echo $classTitle . ' are no any student.';
                }
            }
        }
        }

    //THis function send a message that Attendance Was completed.
    //Amd gives two link for re-check and can edit the attendance.
    public function attendanceCompleteMessage()
        {
        $this->load->view('temp/header');
        $this->load->view('attendenceCompleateMessage');
        $this->load->view('temp/footer');
        }

    //This function is used for filtering to get students information(which class and which section if the section in that class)
    public function ajaxClassAttendanceSection()
        {
        $classTitle = $this->input->get('q',TRUE);
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

    public function selectAttendancePreview()
        {
        $data['s_class'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('selectAttendencePreview', $data);
        $this->load->view('temp/footer');
        }

    public function attendencePreview()
        {
        //Load attendence view before takeing attendence with class,All section and specific class section
        $classTitle = $this->input->post('class_title',TRUE);
        $date = $this->input->post('date',TRUE);
        $intDate = strtotime($date);

        if ($this->input->post('section',TRUE)) {
            $Section = $this->input->post('section',TRUE);
            if ($Section == 'all') {

                //if want any class's specific section's students attendence sheet,then work this erea.
                $queryData = array();
                $query = $this->db->get_where('daily_attendance', array('class_title' => $classTitle, 'date' => $intDate));
                foreach ($query->result_array() as $row) {
                    $queryData[] = $row;
                }$data['students'] = $queryData;
                if (!empty($data['students'])) {
                    $this->load->view('temp/header');
                    $this->load->view('attendencePreview', $data);
                    $this->load->view('temp/footer');
                } else {
                    echo $classTitle . ' and all section are no any student.';
                }
            } elseif ($Section != 'all') {

                //if want All section's students attendence sheet,then work this erea.
                //if want any class's specific section's students attendence sheet,then work this erea.
                $queryData = array();
                $query = $this->db->get_where('daily_attendance', array('class_title' => $classTitle, 'date' => $intDate, 'section' => $Section));
                foreach ($query->result_array() as $row) {
                    $queryData[] = $row;
                }
                $data['students'] = $queryData;
                if (!empty($data['students'])) {
                    $this->load->view('temp/header');
                    $this->load->view('attendencePreview', $data);
                    $this->load->view('temp/footer');
                } else {
                    echo $classTitle . ' and ' . $Section . ' section are no any student.';
                }
            }
        } else {
            //whene want any class students attendence sheet only,then work this erea.
            $queryData = array();
            $query = $this->db->get_where('daily_attendance', array('class_title' => $classTitle, 'date' => $intDate));
            foreach ($query->result_array() as $row) {
                $queryData[] = $row;
            }
            $data['students'] = $queryData;

            if (!empty($data['students'])) {
                $this->load->view('temp/header');
                $this->load->view('attendencePreview', $data);
                $this->load->view('temp/footer');
            } else {
                echo $classTitle . ' are no any student.';
            }
        }
        }

    //This function send class section to view by ajax. 
    public function ajaxAttendencePreview()
        {
        $classTitle = $this->input->get('q',TRUE);
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

    //This function can edit and update the related table's info.
    public function editAttendance()
        {
        $id = $this->input->get('ghtnidjdfjkid',TRUE);
        $day = date("m/d/y");
        $date = strtotime($day);
        if ($this->input->post('submit',TRUE)) {
            $studentInfoId = $this->input->post('studentInfoId',TRUE);
            $classTitle = $this->input->post('classTitle',TRUE);

            $present = "";
            if ($this->input->post("action",TRUE)) {
                if ($this->input->post("action",TRUE) == 'P') {
                    $present = "P";
                } else {
                    $present = "A";
                }
            }
            //Take class and attend amount monthly and make the attendence percintise monthly 
            $classAmountMonthly = $this->attendancemodule->classAmountMonthly($studentInfoId);

            if ($this->input->post("action",TRUE) == 'P') {
                $previousAttendAmountM = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                $todayAttendAmountM = 2;
                $attendAmountMonthly = $previousAttendAmountM + $todayAttendAmountM;
            } else {
                $previousAttendAmountM = $this->attendancemodule->attendAmountMonthly($studentInfoId);
                $todayAttendAmountM = 2;
                $attendAmountMonthly = $previousAttendAmountM - $todayAttendAmountM;
            }
            $attendencePercenticeMonthly = $this->attendancemodule->attendPercentiseMonthly($attendAmountMonthly, $classAmountMonthly);

            //Take class and attend amount yearly and make the attendence percintise yearly 
            $classAmountYearly = $this->attendancemodule->classAmountYearly($studentInfoId);

            if ($this->input->post("action",TRUE) == 'P') {
                $previousAttendAmountY = $this->attendancemodule->attendAmountYearly($studentInfoId);
                $todayAttendAmountY = 2;
                $attendAmountYearly = $previousAttendAmountY + $todayAttendAmountY;
            } else {
                $previousAttendAmountY = $this->attendancemodule->attendAmountYearly($studentInfoId);
                $todayAttendAmountY = 2;
                $attendAmountYearly = $previousAttendAmountY - $todayAttendAmountY;
            }
            $attendencePercenticeYearly = $this->attendancemodule->attendPercentiseYearly($attendAmountYearly, $classAmountYearly);

            $tableData = array(
                'present_or_absent' => $this->db->escape_like_str($present),
                'class_amount_monthly' => $this->db->escape_like_str($classAmountMonthly),
                'class_amount_yearly' => $this->db->escape_like_str($classAmountYearly),
                'attend_amount_monthly' => $this->db->escape_like_str($attendAmountMonthly),
                'attend_amount_yearly' => $this->db->escape_like_str($attendAmountYearly),
                'percentise_month' => $this->db->escape_like_str($attendencePercenticeMonthly),
                'percentise_year' => $this->db->escape_like_str($attendencePercenticeYearly),
            );

            $this->db->update('daily_attendance', $tableData, array('student_id' => $studentInfoId, 'date' => $date));
            $tableData_1 = array(
                'attendance_percentices_daily' => $this->db->escape_like_str($attendencePercenticeMonthly)
            );
            $this->db->update('class_students', $tableData_1, array('student_info_id' => $studentInfoId, 'class_title' => $classTitle));
            redirect('module=dailyAttendance&view=attendanceEditCompleteMessage', 'refresh');
        } else {
            $data['editInfo'] = $this->common->getWhere('daily_attendance', 'id', $id);
            //load the attendance edit view with information.
            $this->load->view('temp/header');
            $this->load->view('editAttendance', $data);
            $this->load->view('temp/footer');
        }
        }

    public function attendanceEditCompleteMessage()
        {
        $this->load->view('temp/header');
        $this->load->view('attendanceEditCompleteMessage');
        $this->load->view('temp/footer');
        }

    public function test()
        {
        echo strtotime('12/20/2014') . '<br>';
        echo date("Y-m-d", 1419030000);
        }

    }
