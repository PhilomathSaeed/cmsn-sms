<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Examination extends MX_Controller
    {

    /**
     * This controller is using for 
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=examination
     * 	- or -  
     * 		http://example.com/index.php?module=examination&view=<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->lang->load('auth');
        $this->load->model('exammodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    //This function load all exam grade and point
    public function examGread()
        {
        $data['grade'] = $this->common->getAllData('exam_grade');
        $this->load->view('temp/header');
        $this->load->view('examGread', $data);
        $this->load->view('temp/footer');
        }

    //THis function add new exam grade
    public function addExamGread()
        {
        if ($this->input->post('submit',TRUE)) {
            $gradeName = $this->input->post('gradeName',TRUE);
            $gradePoint = $this->input->post('gradePoint',TRUE);
            $numberFrom = $this->input->post('numberFrom',TRUE);
            $nameTo = $this->input->post('nameTo',TRUE);

            $data = array(
                'grade_name' => $this->db->escape_like_str($gradeName),
                'point' => $this->db->escape_like_str($gradePoint),
                'number_form' => $this->db->escape_like_str($numberFrom),
                'number_to' => $this->db->escape_like_str($nameTo)
            );
            $this->db->insert('exam_grade', $data);

            redirect('module=examination&view=examGread', 'refresh');
        } else {
            $this->load->view('temp/header');
            $this->load->view('addExamGrade');
            $this->load->view('temp/footer');
        }
        }

    //This function will edit exam grade and point
    public function editGrade()
        {
        $id = $this->input->get('id');
        if ($this->input->post('submit',TRUE)) {
            $gradeName = $this->input->post('gradeName',TRUE);
            $gradePoint = $this->input->post('gradePoint',TRUE);
            $numberFrom = $this->input->post('numberFrom',TRUE);
            $nameTo = $this->input->post('nameTo',TRUE);

            $editData = array(
                'grade_name' => $this->db->escape_like_str($gradeName),
                'point' => $this->db->escape_like_str($gradePoint),
                'number_form' => $this->db->escape_like_str($numberFrom),
                'number_to' => $this->db->escape_like_str($nameTo)
            );

            $this->db->where('id', $id);
            if ($this->db->update('exam_grade', $editData)) {
                redirect('module=examination&view=examGread', 'refresh');
            }
        } else {
            $data['gradInfo'] = $this->common->getWhere('exam_grade', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editGrade', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function can delete exam grade in this system
    public function deleteGrade()
        {
        $id = $this->input->get('id');
        if ($this->db->delete('exam_grade', array('id' => $id))) {
            redirect('module=examination&view=examGread', 'refresh');
        }
        }

    //This function is using for decleration new examination for nay class.
    public function addExam()
        {
        $data['s_class'] = $this->common->getAllData('class');
        if ($this->input->post('submit',TRUE)) {
            $examTitle = $this->input->post('examTitle',TRUE);
            $startDate = $this->input->post('startDate',TRUE);
            $classTitle = $this->input->post('class',TRUE);
            $totleTime = $this->input->post('totleTime',TRUE);
            $examInfo = array(
                'exam_title' => $this->db->escape_like_str($examTitle),
                'start_date' => $this->db->escape_like_str($startDate),
                'class_title' => $this->db->escape_like_str($classTitle),
                'total_time' => $this->db->escape_like_str($totleTime),
                'publish' => $this->db->escape_like_str('Not Publish')
            );

            //Here is adding an exam information into database
            if ($this->db->insert('add_exam', $examInfo)) {
                $data['successMessage'] = '<div class="alert alert-success">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                <strong>Success!</strong> The exam " ' . $examTitle . ' " for class "' . $classTitle . '" has been added. Now you can add exam routine for this examination.
                                        </div>';
                $data['examInfo'] = $this->common->getAllData('add_exam');
                $data['subject'] = $this->common->getWhere('class_subject', 'class_title', $classTitle);
                $data['weeklyDay'] = $this->common->getAllData('config_week_day');
                $this->load->view('temp/header');
                $this->load->view('addRutinSubject', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('addExamRutine', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will complete an exam routine after decletration that exam.
    public function completExamRoutin()
        {
        if ($this->input->post('submit',TRUE)) {
            $examId = $this->input->post('examId',TRUE);

            //this is the 1st subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild',TRUE)) {
                $examDate = $this->input->post('examDate',TRUE);
                $subject = $this->input->post('subject',TRUE);
                $subjectCode = $this->input->post('subjectCode',TRUE);
                $romeNo = $this->input->post('romeNo',TRUE);
                $starTima = $this->input->post('starTima',TRUE);
                $endTima = $this->input->post('endTima',TRUE);
                $examShift = $this->input->post('examShift',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 2nd subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_2',TRUE)) {
                $examDate = $this->input->post('examDate_2',TRUE);
                $subject = $this->input->post('subject_2',TRUE);
                $subjectCode = $this->input->post('subjectCode_2',TRUE);
                $romeNo = $this->input->post('romeNo_2',TRUE);
                $starTima = $this->input->post('starTima_2',TRUE);
                $endTima = $this->input->post('endTima_2',TRUE);
                $examShift = $this->input->post('examShift_2',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 3rd subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_3',TRUE)) {
                $examDate = $this->input->post('examDate_3',TRUE);
                $subject = $this->input->post('subject_3',TRUE);
                $subjectCode = $this->input->post('subjectCode_3',TRUE);
                $romeNo = $this->input->post('romeNo_3',TRUE);
                $starTima = $this->input->post('starTima_3',TRUE);
                $endTima = $this->input->post('endTima_3',TRUE);
                $examShift = $this->input->post('examShift_3',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 4th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_4',TRUE)) {
                $examDate = $this->input->post('examDate_4',TRUE);
                $subject = $this->input->post('subject_4',TRUE);
                $subjectCode = $this->input->post('subjectCode_4',TRUE);
                $romeNo = $this->input->post('romeNo_4',TRUE);
                $starTima = $this->input->post('starTima_4',TRUE);
                $endTima = $this->input->post('endTima_4',TRUE);
                $examShift = $this->input->post('examShift_4',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 5th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_5',TRUE)) {
                $examDate = $this->input->post('examDate_5',TRUE);
                $subject = $this->input->post('subject_5',TRUE);
                $subjectCode = $this->input->post('subjectCode_5',TRUE);
                $romeNo = $this->input->post('romeNo_5',TRUE);
                $starTima = $this->input->post('starTima_5',TRUE);
                $endTima = $this->input->post('endTima_5',TRUE);
                $examShift = $this->input->post('examShift_5',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 6th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_6',TRUE)) {
                $examDate = $this->input->post('examDate_6',TRUE);
                $subject = $this->input->post('subject_6',TRUE);
                $subjectCode = $this->input->post('subjectCode_6',TRUE);
                $romeNo = $this->input->post('romeNo_6',TRUE);
                $starTima = $this->input->post('starTima_6',TRUE);
                $endTima = $this->input->post('endTima_6',TRUE);
                $examShift = $this->input->post('examShift_6',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 7th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_7',TRUE)) {
                $examDate = $this->input->post('examDate_7',TRUE);
                $subject = $this->input->post('subject_7',TRUE);
                $subjectCode = $this->input->post('subjectCode_7',TRUE);
                $romeNo = $this->input->post('romeNo_7',TRUE);
                $starTima = $this->input->post('starTima_7',TRUE);
                $endTima = $this->input->post('endTima_7',TRUE);
                $examShift = $this->input->post('examShift_7',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 8th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_8',TRUE)) {
                $examDate = $this->input->post('examDate_8',TRUE);
                $subject = $this->input->post('subject_8',TRUE);
                $subjectCode = $this->input->post('subjectCode_8',TRUE);
                $romeNo = $this->input->post('romeNo_8',TRUE);
                $starTima = $this->input->post('starTima_8',TRUE);
                $endTima = $this->input->post('endTima_8',TRUE);
                $examShift = $this->input->post('examShift_8',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 9th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_9',TRUE)) {
                $examDate = $this->input->post('examDate_9',TRUE);
                $subject = $this->input->post('subject_9',TRUE);
                $subjectCode = $this->input->post('subjectCode_9',TRUE);
                $romeNo = $this->input->post('romeNo_9',TRUE);
                $starTima = $this->input->post('starTima_9',TRUE);
                $endTima = $this->input->post('endTima_9',TRUE);
                $examShift = $this->input->post('examShift_9',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 10th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_10',TRUE)) {
                $examDate = $this->input->post('examDate_10',TRUE);
                $subject = $this->input->post('subject_10',TRUE);
                $subjectCode = $this->input->post('subjectCode_10',TRUE);
                $romeNo = $this->input->post('romeNo_10',TRUE);
                $starTima = $this->input->post('starTima_10',TRUE);
                $endTima = $this->input->post('endTima_10',TRUE);
                $examShift = $this->input->post('examShift_10',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 11th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_11',TRUE)) {
                $examDate = $this->input->post('examDate_11',TRUE);
                $subject = $this->input->post('subject_11',TRUE);
                $subjectCode = $this->input->post('subjectCode_11',TRUE);
                $romeNo = $this->input->post('romeNo_11',TRUE);
                $starTima = $this->input->post('starTima_11',TRUE);
                $endTima = $this->input->post('endTima_11',TRUE);
                $examShift = $this->input->post('examShift_11',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 12th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_12',TRUE)) {
                $examDate = $this->input->post('examDate_12',TRUE);
                $subject = $this->input->post('subject_12',TRUE);
                $subjectCode = $this->input->post('subjectCode_12',TRUE);
                $romeNo = $this->input->post('romeNo_12',TRUE);
                $starTima = $this->input->post('starTima_12',TRUE);
                $endTima = $this->input->post('endTima_12',TRUE);
                $examShift = $this->input->post('examShift_12',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 13th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_13',TRUE)) {
                $examDate = $this->input->post('examDate_13',TRUE);
                $subject = $this->input->post('subject_13',TRUE);
                $subjectCode = $this->input->post('subjectCode_13',TRUE);
                $romeNo = $this->input->post('romeNo_13',TRUE);
                $starTima = $this->input->post('starTima_13',TRUE);
                $endTima = $this->input->post('endTima_13',TRUE);
                $examShift = $this->input->post('examShift_13',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 14th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_14',TRUE)) {
                $examDate = $this->input->post('examDate_14',TRUE);
                $subject = $this->input->post('subject_14',TRUE);
                $subjectCode = $this->input->post('subjectCode_14',TRUE);
                $romeNo = $this->input->post('romeNo_14',TRUE);
                $starTima = $this->input->post('starTima_14',TRUE);
                $endTima = $this->input->post('endTima_14',TRUE);
                $examShift = $this->input->post('examShift_14',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            //this is the 15th subject's informations for this exam rutine
            if ($this->input->post('examSunjectFild_15',TRUE)) {
                $examDate = $this->input->post('examDate_15',TRUE);
                $subject = $this->input->post('subject_15',TRUE);
                $subjectCode = $this->input->post('subjectCode_15',TRUE);
                $romeNo = $this->input->post('romeNo_15',TRUE);
                $starTima = $this->input->post('starTima_15',TRUE);
                $endTima = $this->input->post('endTima_15',TRUE);
                $examShift = $this->input->post('examShift_15',TRUE);

                $routine = array(
                    'exam_id' => $this->db->escape_like_str($examId),
                    'exam_date' => $this->db->escape_like_str($examDate),
                    'exam_subject' => $this->db->escape_like_str($subject),
                    'subject_code' => $this->db->escape_like_str($subjectCode),
                    'rome_number' => $this->db->escape_like_str($romeNo),
                    'start_time' => $this->db->escape_like_str($starTima),
                    'end_time' => $this->db->escape_like_str($endTima),
                    'exam_shift' => $this->db->escape_like_str($examShift)
                );

                //insert this subject information into the database.
                $this->db->insert('exam_routine', $routine);
            }

            $data['rutineInfo'] = $this->common->getWhere('exam_routine', 'exam_id', $examId);
            $data['examInfo'] = $this->common->getWhere('add_exam', 'id', $examId);
            $this->load->view('temp/header');
            $this->load->view('rutineSuccess', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will select that which exam routine 
    public function allExamRutine()
        {
        $data['s_class'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('selectAllRoutine', $data);
        $this->load->view('temp/footer');
        }

    //This function load class's exam title which is declard previously by class title.
    public function ajaxClassExam()
        {
        $classTitle = $this->input->get('q');
        $query = $this->common->getWhere('add_exam', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data[] = $row;
        }
        if (!empty($data)) {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Exam Title <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="examId" class="form-control">';
            foreach ($data as $sec) {
                echo '<option value="' . $sec['id'] . '">' . $sec['exam_title'] . '</option>';
            }
            echo '</select></div>
                    </div>';
        } else {
            $section = 'This class has no any exam added.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        }

    //This function show a success message when an Exam added and made this exam routine fully, with full rutine.
    public function routinView()
        {
        if ($this->input->post('submit',TRUE) && $this->input->post('examId',TRUE)) {
            $examId = $this->input->post('examId',TRUE);
            $data['rutineInfo'] = $this->common->getWhere('exam_routine', 'exam_id', $examId);
            $data['examInfo'] = $this->common->getWhere('add_exam', 'id', $examId);
            $data['schoolName'] = $this->common->schoolName();
            $this->load->view('temp/header');
            $this->load->view('rutineSuccess', $data);
            $this->load->view('temp/footer');
        } else {
            echo 'Please select class and examination firest. Try again.';
        }
        }

    //This function is using for select class and students for exam attendance.
    public function selectExamAttendance()
        {
        $data['s_class'] = $this->common->getAllData('class');
        $this->load->view('temp/header');
        $this->load->view('selectExamAttendance', $data);
        $this->load->view('temp/footer');
        }

    //This function is using for taking students by class title for exam attendence
    public function examAttendance()
        {
        $date = date("d/m/Y");
        //$date = '15/04/2015';
        if ($this->input->post('submit',TRUE)) {
            $examId = $this->input->get('id');
            $examTitle = $this->exammodel->examTitle($examId);
            $examSubject = $this->exammodel->examSubject($examId, $date);
            //Whene submit the attendence information after takeing the attendence
            $i = $this->input->post('in_velu',TRUE);
            $classTitle = $this->input->post('classTitle',TRUE);
            for ($x = 1; $x <= $i; $x++) {
                $roll = $this->input->post("roll_$x",TRUE);
                $name = $this->input->post("studentName_$x",TRUE);
                $present = $this->input->post("action_$x",TRUE);
                $userId = $this->input->post("userId_$x",TRUE);
                $studentInfoId = $this->input->post("studentInfoId_$x",TRUE);
                $section = $this->input->post("section_$x",TRUE);

                $data = array(
                    'date' => $this->db->escape_like_str($date),
                    'exam_title' => $this->db->escape_like_str($examTitle),
                    'exam_subject' => $this->db->escape_like_str($examSubject),
                    'user_id' => $this->db->escape_like_str($userId),
                    'student_id' => $this->db->escape_like_str($studentInfoId),
                    'roll_no' => $this->db->escape_like_str($roll),
                    'class' => $this->db->escape_like_str($classTitle),
                    'section' => $this->db->escape_like_str($section),
                    'attendance' => $this->db->escape_like_str($present),
                    'student_title' => $this->db->escape_like_str($name),
                );

                //insert the $data information into "daily_attendance" database.
                $this->db->insert('exam_attendanc', $data);
            }

            //Whene Exam Attendance was full compleate then lode this page
            $data['previerAttendance'] = $this->exammodel->previewAttendance($classTitle, $examTitle);
            $this->load->view('temp/header');
            $this->load->view('viewExamAttendance', $data);
            $this->load->view('temp/footer');
        } else {
            $examId = $this->input->post('examId',TRUE);
            $examTitle = $this->exammodel->examTitle($examId);
            $classTitle = $this->input->post('class',TRUE);
            $check = $this->exammodel->checkExam($examId, $date);
            if ($check == 'Have An Exam') {
                //Here is loding student for exam attendance.
                //Get here students and informations by class title.
                $queryData = array();
                $query = $this->db->get_where('class_students', array('class_title' => $classTitle));
                foreach ($query->result_array() as $row) {
                    $queryData[] = $row;
                }$data['students'] = $queryData;
                $data['examId'] = $examId;
                $data['examTitle'] = $examTitle;
                $data['examSubject'] = $this->exammodel->examSubject($examId, $date);
                $data['classTitle'] = $classTitle;
                if (!empty($data['students'])) {
                    $this->load->view('temp/header');
                    $this->load->view('examAttendance', $data);
                    $this->load->view('temp/footer');
                } else {
                    echo $classTitle . 'has no any student.';
                }
            } elseif ($check == 'No Any Exam') {
                $info['classTitle'] = $classTitle;
                $this->load->view('temp/header');
                $this->load->view('attendanceFaild', $info);
                $this->load->view('temp/footer');
            }
        }
        }

    //This function load's exam attendance view
    public function viewExamAttendance()
        {
        if ($this->input->post('submit',TRUE)) {
            $classTitle = $this->input->post('class',TRUE);
            $examTitle = $this->input->post('examTitle',TRUE);
            $subjectTitle = $this->input->post('subjectTitle',TRUE);

            $data['classTitle'] = $classTitle;
            $data['previerAttendance'] = $this->exammodel->previewAttendance($classTitle, $examTitle, $subjectTitle);
            $this->load->view('temp/header');
            $this->load->view('viewExamAttendance', $data);
            $this->load->view('temp/footer');
        } else {
            $data['s_class'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('allExamAttendanceView', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function is called by ajax from view
    public function ajaxAttendanceView()
        {
        $classTitle = $this->input->get('q');
        $query = $this->common->getWhere('add_exam', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data[] = $row;
        }

        if (!empty($data)) {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Exam Title <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="examTitle" class="form-control">';
            foreach ($data as $sec) {
                echo '<option value="' . $sec['exam_title'] . '">' . $sec['exam_title'] . '</option>';
            }
            echo '</select></div>
                        </div>';
        } else {
            $section = 'This class has no any exam added.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        $subject = $this->common->getWhere('class_subject', 'class_title', $classTitle);
        if (!empty($subject)) {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Subject Title <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="subjectTitle" class="form-control">';
            foreach ($subject as $sub) {
                echo '<option value="' . $sub['subject_title'] . '">' . $sub['subject_title'] . '</option>';
            }
            echo '</select></div>
                        </div>';
        } else {
            $section = 'This class has no any subject.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        }

    //The exam attendance can edit by this function.
    public function editExamAttendance()
        {
        $id = $this->input->get('id');

        if ($this->input->post('submit',TRUE)) {
            $updateInfo = array(
                'attendance' => $this->db->escape_like_str($this->input->post('action',TRUE))
            );
            $this->db->where('id', $id);
            if ($this->db->update('exam_attendanc', $updateInfo)) {
                redirect('module=examination&view=viewExamAttendance', 'refresh');
            }
        }
        $data['examAttendanceInf'] = $this->common->getWhere('exam_attendanc', 'id', $id);
        $this->load->view('temp/header');
        $this->load->view('editExamAttendance', $data);
        $this->load->view('temp/footer');
        }

    //Here is first time select class for result.
    public function makingResult()
        {
        $data['s_class'] = $this->common->getAllData('class');
        if ($this->input->post('submit',TRUE)) {
            $data['class'] = $this->input->post('class',TRUE);
            $data['examTitle'] = $this->input->post('examTitle',TRUE);
            $data['subjectTitle'] = $this->input->post('subjectTitle',TRUE);
            $data['teacherInfo'] = $this->exammodel->teacherInfo($this->input->post('teacherUserId',TRUE));

            $queryData = array();
            $query = $this->db->get_where('class_students', array('class_title' => $this->input->post('class',TRUE)));
            foreach ($query->result_array() as $row) {
                $queryData[] = $row;
            }
            $data['students'] = $queryData;
            $data['gread'] = $this->common->getAllData('exam_grade');

            $this->load->view('temp/header');
            $this->load->view('makingResult', $data);
            $this->load->view('temp/footer');
        } else {
            $this->load->view('temp/header');
            $this->load->view('selectClassResult', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will submit result from teacher.
    public function submitResult()
        {
        $i = $this->input->post('ivalue',TRUE);
        $examTitle = $this->input->post('examTitle',TRUE);
        $examSubject = $this->input->post('subjectName',TRUE);
        $classTitle = $this->input->post('class',TRUE);
        $teacherName = $this->input->post('teacherName',TRUE);
        $teacherId = $this->input->post('teacherId',TRUE);
        $date = date('m/d/Y');
        for ($a = 1; $a <= $i; $a++) {
            $rollNumber = $this->input->post("rollNumber_$a",TRUE);
            $result = $this->input->post("result_$a",TRUE);
            $greadInfo = $this->input->post("gread_$a",TRUE);
            $grade = explode(",", $greadInfo);

            $resultInfo = array(
                'exam_title' => $this->db->escape_like_str($examTitle),
                'class_title' => $this->db->escape_like_str($classTitle),
                'student_name' => $this->db->escape_like_str($this->input->post("studentTitle_$a",TRUE)),
                'student_id' => $this->db->escape_like_str($this->input->post("studentId_$a",TRUE)),
                'roll_number' => $this->db->escape_like_str($this->input->post("rollNumber_$a",TRUE)),
                'exam_subject' => $this->db->escape_like_str($examSubject),
                'result' => $this->db->escape_like_str($this->input->post("result_$a",TRUE)),
                'mark' => $this->db->escape_like_str($this->input->post("totalMark_$a",TRUE)),
                'grade' => $this->db->escape_like_str($grade[0]),
                'point' => $this->db->escape_like_str($grade[1]),
            );

            $this->db->insert('result_shit', $resultInfo);
        }

        $submitInfo = array(
            'class' => $this->db->escape_like_str($classTitle),
            'exam_title' => $this->db->escape_like_str($examTitle),
            'date' => $this->db->escape_like_str($date),
            'subject' => $this->db->escape_like_str($examSubject),
            'submited' => $this->db->escape_like_str(0),
            'teacher' => $this->db->escape_like_str($teacherName),
        );

        if ($this->db->insert('result_submition_info', $submitInfo)) {

            $data['examTitle'] = $examTitle;
            $data['examSubject'] = $examSubject;
            $data['teacherName'] = $teacherName;
            $data['classTitle'] = $classTitle;
            $this->load->view('temp/header');
            $this->load->view('submitMessage', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will take class and give the class exam title and subject
    public function ajaxClassResult()
        {
        $classTitle = $this->input->get('q');
        $query = $this->common->getWhere('add_exam', 'class_title', $classTitle);
        foreach ($query as $row) {
            $data[] = $row;
        }

        if (!empty($data)) {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Exam Title <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="examTitle" class="form-control">';
            foreach ($data as $sec) {
                echo '<option value="' . $sec['exam_title'] . '">' . $sec['exam_title'] . '</option>';
            }
            echo '</select></div>
                        </div>';
        } else {
            $section = 'This class has no any exam added.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        $subject = $this->common->getWhere('class_subject', 'class_title', $classTitle);
        if (!empty($subject)) {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Subject Title <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="subjectTitle" class="form-control">';
            foreach ($subject as $sub) {
                echo '<option value="' . $sub['subject_title'] . '">' . $sub['subject_title'] . '</option>';
            }
            echo '</select></div>
                        </div>';
        } else {
            $section = 'This class has no any subject.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        }

    //This function work only for admin.
    //He can view how many result shit was submited for aprove by admin.
    public function aproveShitView()
        {
        $data['shitList'] = $this->common->getWhere('result_submition_info', 'submited', 0);
        $data['classAction'] = $this->common->getWhere('result_action', 'status', 'Not Complete');
        $this->load->view('temp/header');
        $this->load->view('aproveShitView', $data);
        $this->load->view('temp/footer');
        }

    //This function can exes only admin and he can edit and Approve exam rtesult shit
    public function checkResultShit()
        {
        $id = $this->input->get('id');
        $query = $this->common->getWhere('result_submition_info', 'id', $id);
        $examTitle = $query[0]['exam_title'];
        $classTitle = $query[0]['class'];
        $subject = $query[0]['subject'];
        $data['examTitle'] = $query[0]['exam_title'];
        $data['class'] = $query[0]['class'];
        $data['teacher'] = $query[0]['teacher'];
        $data['subject'] = $query[0]['subject'];
        $data['resultShit'] = $this->exammodel->checkResultShit($classTitle, $examTitle, $subject);
        $this->load->view('temp/header');
        $this->load->view('checkResultShit', $data);
        $this->load->view('temp/footer');
        }

    //This function will edit student's result,number and grade,point
    public function editResult()
        {
        $id = $this->input->get('id');
        if ($this->input->post('submit',TRUE)) {
            $updateData = array(
                'result' => $this->db->escape_like_str($this->input->post('result',TRUE)),
                'mark' => $this->db->escape_like_str($this->input->post('mark',TRUE)),
                'point' => $this->db->escape_like_str($this->input->post('point',TRUE)),
                'grade' => $this->db->escape_like_str($this->input->post('gread',TRUE))
            );
            $this->db->where('id', $id);
            if ($this->db->update('result_shit', $updateData)) {
                redirect('module=examination&view=aproveShitView', 'refresh');
            }
        } else {
            $data['gread'] = $this->common->getAllData('exam_grade');
            $data['previousResult'] = $this->common->getWhere('result_shit', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editResult', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will approuve result shit which is sent from teacher.
    public function approuveResultShit()
        {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $data = array(
            'submited' => $this->db->escape_like_str(1)
        );
        if ($this->db->update('result_submition_info', $data)) {
            $query = $this->common->getWhere('result_submition_info', 'id', $id);
            foreach ($query as $row) {
                $rowInfo = $row;
            }
            $classTitle = $rowInfo['class'];
            $examTitle = $rowInfo['exam_title'];
            $subject = $rowInfo['subject'];


            $approuveSubject = $this->exammodel->approuveSubjectAmount($classTitle, $examTitle);
            $classSubject = $this->exammodel->classSubjectAmount($classTitle);
            if ($approuveSubject == $classSubject) {
                $actionArrayt = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'exam_title' => $this->db->escape_like_str($examTitle),
                    'status' => $this->db->escape_like_str('Not Complete')
                );
                if ($this->db->insert('result_action', $actionArrayt)) {
                    redirect('module=examination&view=aproveShitView', 'refresh');
                }
            } else {
                redirect('module=examination&view=aproveShitView', 'refresh');
            }
        }
        }

    //This function will make finalresult for class students
    public function finalResult()
        {
        $examActionId = $this->input->get('id');
        $classTitle = $this->input->get('class');
        $examTitle = $this->input->get('exam');
        $studentQuery = $this->common->getWhere('class_students', 'class_title', $classTitle);

        foreach ($studentQuery as $row) {
        $studentId = $row['student_id'];
            $absent = $this->exammodel->absent($studentId);
            if ($absent == 0) {
                $fail = $this->exammodel->fail($studentId);
                if ($fail == 0) {
                    $classSubject = $this->exammodel->classSubjectAmount($classTitle);
                    $pointAverage = $this->exammodel->pointAverage($studentId, $classSubject);
                    $gradeAverage = $this->exammodel->averageGrade($pointAverage);
                    $totalMark = $this->exammodel->totalMark($studentId);
                    $finalResultArray = array(
                        'class' => $this->db->escape_like_str($classTitle),
                        'exam_title' => $this->db->escape_like_str($examTitle),
                        'student_id' => $this->db->escape_like_str($studentId),
                        'student_name' => $this->db->escape_like_str($row['student_title']),
                        'final_grade' => $this->db->escape_like_str($gradeAverage),
                        'point' => $this->db->escape_like_str($pointAverage),
                        'total_mark' => $this->db->escape_like_str($totalMark),
                        'status' => $this->db->escape_like_str('Pass'),
                    );
                    $this->db->insert('final_result', $finalResultArray);
                } else {
                    $classSubject = $this->exammodel->classSubjectAmount($classTitle);
                    $pointAverage = $this->exammodel->pointAverage($studentId, $classSubject);
                    $gradeAverage = $this->exammodel->averageGrade($pointAverage);
                    $totalMark = $this->exammodel->totalMark($studentId);
                    $finalResultArray = array(
                        'class' => $this->db->escape_like_str($classTitle),
                        'exam_title' => $this->db->escape_like_str($examTitle),
                        'student_id' => $this->db->escape_like_str($studentId),
                        'student_name' => $this->db->escape_like_str($row['student_title']),
                        'final_grade' => $this->db->escape_like_str($gradeAverage),
                        'point' => $this->db->escape_like_str($pointAverage),
                        'total_mark' => $this->db->escape_like_str($totalMark),
                        'status' => $this->db->escape_like_str('Fail'),
                        'fail_amount' => $this->db->escape_like_str($fail)
                    );
                    $this->db->insert('final_result', $finalResultArray);
                }
            } else {
                $finalResultArray = array(
                    'class' => $this->db->escape_like_str($classTitle),
                    'exam_title' => $this->db->escape_like_str($examTitle),
                    'student_id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($row['student_title']),
                    'final_grade' => $this->db->escape_like_str('--'),
                    'point' => $this->db->escape_like_str('--'),
                    'total_mark' => $this->db->escape_like_str('--'),
                    'status' => $this->db->escape_like_str('Absent'),
                    'fail_amount' => $this->db->escape_like_str('--')
                );
                $this->db->insert('final_result', $finalResultArray);
            }
        }

        $examActionArray = array(
            'status' => $this->db->escape_like_str('Complete'),
            'publish' => $this->db->escape_like_str('Not Publish')
        );
        $this->db->where('id', $examActionId);
        if ($this->db->update('result_action', $examActionArray)) {
            $data['massage'] = '<div class="alert alert-success">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                                <strong>Success!</strong> The " ' . $examTitle . ' " for "' . $classTitle . '"was completed. Now, If you want, you can publish the result any day.<br>
                                                <strong>Note: </strong> Without complete all class\'s result P_lease do not press the "Publish Result" button. After completing all class\'s result you will publish the result in your school.   
                                        </div>';
            $data['shitList'] = $this->common->getWhere('result_submition_info', 'submited', 0);
            $data['classAction'] = $this->common->getWhere('result_action', 'status', 'Not Complete');
            $this->load->view('temp/header');
            $this->load->view('aproveShitView', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function select class for results 
    public function selectResult()
        {
        $data['result'] = $this->exammodel->publish('Complete', 'Publish');
        $this->load->view('temp/header');
        $this->load->view('selectResult', $data);
        $this->load->view('temp/footer');
        }

    //This function will show details result in a class 
    public function fullResult()
        {
        $classTitle = $this->input->get('class');
        $examTitle = $this->input->get('exam');
        $data['result'] = $this->exammodel->finalResultShow($classTitle, $examTitle);
        $this->load->view('temp/header');
        $this->load->view('fullResult', $data);
        $this->load->view('temp/footer');
        }

    //By this function admin can publish exam result in day.
    public function publishResult()
        {
        $query = $this->exammodel->publish('Complete', 'Not Publish');
        foreach ($query as $row) {
            $id = $row['id'];
            $examTitle = $row['exam_title'];
            $classTitle = $row['class_title'];
            $array = array(
                'publish' => $this->db->escape_like_str('Publish')
            );
            $this->db->where('id', $id);
            if ($this->db->update('result_action', $array)) {
                if ($this->db->update('add_exam', $array, array('exam_title' => $this->db->escape_like_str($examTitle),'class_title' => $this->db->escape_like_str($classTitle)))){
                    redirect('module=examination&view=selectResult', 'refresh');
                }
            }
        }
        }

    //This function will select studentfor know mark shit
    public function selectClassMarksheet()
        {
        if ($this->input->post('submit',TRUE)) {
            $classTitle = $this->input->post('class',TRUE);
        if ($this->input->post('examTitle',TRUE) & $this->input->post('studentId',TRUE)) {
                $examTitle = $this->input->post('examTitle',TRUE);
                $studentId = $this->input->post('studentId',TRUE);
                $data['markshit'] = $this->exammodel->markshit($examTitle, $classTitle, $studentId);
                $data['examTitle'] = $examTitle;
                $data['studentId'] = $studentId;
                $data['studentName'] = $this->input->post('studentTitle',TRUE);
                $this->load->view('temp/header');
                $this->load->view('marksheet', $data);
                $this->load->view('temp/footer');
            } else {
                echo 'At first select class title, exam title and student then submit.<br>If exam selecting ber is not come, select class and wait 1 or 2 second.<br>Thank you.';
            }
        } else {
            $data['class'] = $this->common->getAllData('class');
            $this->load->view('temp/header');
            $this->load->view('selectClassMarksheet', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will called by ajax from view for load class markshit
    public function ajaxClassMarkshit()
        {
        $classTitle = $this->input->get('q');
        $query = $this->exammodel->examTitleForMarkshit($classTitle);
        foreach ($query as $row) {
            $data[] = $row;
        }

        if (!empty($data)) {
            echo '<div class="form-group">
                        <label class="col-md-3 control-label">Exam Title <span class="requiredStar"> * </span></label>
                        <div class="col-md-6">
                            <select name="examTitle" class="form-control">';
            foreach ($data as $sec) {
                echo '<option value="' . $sec['exam_title'] . '">' . $sec['exam_title'] . '</option>';
            }
            echo '</select></div>
                        </div>';


            $student = $this->common->getWhere('class_students', 'class_title', $classTitle);
            if (!empty($student)) {
                echo '<div class="form-group">
                            <label class="col-md-3 control-label">Student Title <span class="requiredStar"> * </span></label>
                            <div class="col-md-6">
                                <select name="studentId" class="form-control">';
                foreach ($student as $stu) {
                    echo '<option value="' . $stu['student_id'] . '">' . $stu['student_title'] . '</option>';
                }
                echo '</select></div>
                    <input type="hidden" name="studentTitle" value="' . $stu['student_title'] . '">
                            </div>';
            } else {
                $section = 'This class has no any subject.';
                echo '<div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                            <div class="alert alert-warning">
                                    <strong>Info!</strong> ' . $section . '
                            </div></div></div>';
            }
        } else {
            $section = 'This class any exam Result was not published.';
            echo '<div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <div class="alert alert-warning">
                                <strong>Info!</strong> ' . $section . '
                        </div></div></div>';
        }
        }

    }
