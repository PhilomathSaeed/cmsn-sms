<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Message extends MX_Controller
    {

    /**
     * This controller is using for controlling message 
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=message
     * 	- or -  
     * 		http://example.com/index.php?module=message&view=<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->lang->load('auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    //This function can send message.
    public function sendMessage()
        {
        if ($this->input->post('submit',TRUE)) {
            $receiver = $this->input->post('receiver',TRUE);
            $group = $this->input->post('receiverGroup',TRUE);
            $day = date("m/d/y h:i:s A");
            $date = strtotime($day);
            if ($group == 'Student') {
                //if this message's receipent will students then work here
                if ($receiver == 'AllStudent') {
                    $query = $this->common->getAllData('student_info');
                    foreach ($query as $row) {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId',TRUE)),
                            'receiver_id' => $this->db->escape_like_str($row['user_id']),
                            'subject' => $this->db->escape_like_str($this->input->post('subject',TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message',TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date)
                        );
                        if ($this->db->insert('massage', $message)) {
                            $data['message'] = 'The massage sent successfully.';
                            $this->load->view('temp/header');
                            $this->load->view('success', $data);
                            $this->load->view('temp/footer');
                        }
                    }
                } else {
                    $message = array(
                        'sender_id' => $this->db->escape_like_str($this->input->post('senderId',TRUE)),
                        'receiver_id' => $this->db->escape_like_str($receiver),
                        'subject' => $this->db->escape_like_str($this->input->post('subject',TRUE)),
                        'message' => $this->db->escape_like_str($this->input->post('message',TRUE)),
                        'read_unread' => $this->db->escape_like_str('0'),
                        'date' => $this->db->escape_like_str($date)
                    );
                    if ($this->db->insert('massage', $message)) {
                        $data['message'] = 'The massage sent successfully.';
                        $this->load->view('temp/header');
                        $this->load->view('success', $data);
                        $this->load->view('temp/footer');
                    }
                }
            } elseif ($group == 'Teacher') {
                //if this message's receipent will Teacher then work here
                if ($receiver == 'AllTeacher') {
                    $query = $this->common->getAllData('student_info');
                    foreach ($query as $row) {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId',TRUE)),
                            'receiver_id' => $this->db->escape_like_str($row['user_id']),
                            'subject' => $this->db->escape_like_str($this->input->post('subject',TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message',TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date)
                        );
                        if ($this->db->insert('massage', $message)) {
                            $data['message'] = 'The massage sent successfully.';
                            $this->load->view('temp/header');
                            $this->load->view('success', $data);
                            $this->load->view('temp/footer');
                        }
                    }
                } else {
                    $message = array(
                        'sender_id' => $this->db->escape_like_str($this->input->post('senderId',TRUE)),
                        'receiver_id' => $this->db->escape_like_str($receiver),
                        'subject' => $this->db->escape_like_str($this->input->post('subject',TRUE)),
                        'message' => $this->db->escape_like_str($this->input->post('message',TRUE)),
                        'read_unread' => $this->db->escape_like_str('0'),
                        'date' => $this->db->escape_like_str($date)
                    );
                    if ($this->db->insert('massage', $message)) {
                        $data['message'] = 'The massage sent successfully.';
                        $this->load->view('temp/header');
                        $this->load->view('success', $data);
                        $this->load->view('temp/footer');
                    }
                }
            } elseif ($group == 'Parents') {
                //if this message's receipent will Parents then work here
                if ($receiver == 'AllParents') {
                    $query = $this->common->getAllData('parents-info');
                    foreach ($query as $row) {
                        $message = array(
                            'sender_id' => $this->db->escape_like_str($this->input->post('senderId',TRUE)),
                            'receiver_id' => $this->db->escape_like_str($row['user_id']),
                            'subject' => $this->db->escape_like_str($this->input->post('subject',TRUE)),
                            'message' => $this->db->escape_like_str($this->input->post('message',TRUE)),
                            'read_unread' => $this->db->escape_like_str('0'),
                            'date' => $this->db->escape_like_str($date)
                        );
                        if ($this->db->insert('massage', $message)) {
                            $data['message'] = 'The massage sent successfully.';
                            $this->load->view('temp/header');
                            $this->load->view('success', $data);
                            $this->load->view('temp/footer');
                        }
                    }
                } else {
                    $message = array(
                        'sender_id' => $this->db->escape_like_str($this->input->post('senderId',TRUE)),
                        'receiver_id' => $this->db->escape_like_str($receiver),
                        'subject' => $this->db->escape_like_str($this->input->post('subject',TRUE)),
                        'message' => $this->db->escape_like_str($this->input->post('message',TRUE)),
                        'read_unread' => $this->db->escape_like_str('0'),
                        'date' => $this->db->escape_like_str($date)
                    );
                    if ($this->db->insert('massage', $message)) {
                        $data['message'] = 'The massage sent successfully.';
                        $this->load->view('temp/header');
                        $this->load->view('success', $data);
                        $this->load->view('temp/footer');
                    }
                }
            }
        } else {
            //If the massage is not set oe not submit it will load at first view for sending massage
            $this->load->view('temp/header');
            $this->load->view('message');
            $this->load->view('temp/footer');
        }
        }

    //This function will return all receiver whene give/select any user group.
    public function ajaxSelectReciver()
        {
        $group = $this->input->get('q');
        if ($group == 'Student') {
            //If the student's groun was selected thene work here
            $query = $this->common->getAllData('student_info');
            echo '<option value="AllStudent">All Student</option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['user_id'] . '">' . $row['student_nam'] . ' [ ' . $row['class'] . ' ] - StudentID : ' . $row['student_id'] . ' </option>';
            }
        } elseif ($group == 'Teacher') {
            //If the teacher's groun was selected thene work here
            $query = $this->common->getAllData('teachers_info');
            echo '<option value="AllTeacher">All Teacher</option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['user_id'] . '">' . $row['fullname'] . '</option>';
            }
        } elseif ($group == 'Parents') {
            //If the parent's groun was selected thene work here
            $query = $this->common->getAllData('parents-info');
            echo '<option value="AllParents">All Parent</option>';
            foreach ($query as $row) {
                echo '<option value="' . $row['user_id'] . '">' . $row['parents_name'] . '</option>';
            }
        }
        }

    //This function will return all inbox read and unread massage
    public function inbox()
        {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data['massage'] = $this->common->getWhere('massage', 'receiver_id', $id);

        $this->load->view('temp/header');
        $this->load->view('inbox', $data);
        $this->load->view('temp/footer');
        }

    //This function can return unread massage in the inbox. 
    public function unreadMassage()
        {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;
        $data['unreadMassage'] = $this->messagemodel->unReadMassage($id);
        }

    //user can read the message by this function
    public function readMassage()
        {
        $id = $this->input->get('id');
        $data['massage'] = $this->common->getWhere('massage', 'id', $id);
        $update = array(
            'read_unread' => $this->db->escape_like_str(1)
        );
        if ($this->db->update('massage', $update, array('id' => $this->db->escape_like_str($id)))) {
            $this->load->view('temp/header');
            $this->load->view('readmassage', $data);
            $this->load->view('temp/footer');
        }
        }

    public function deleteMassage()
        {
        $id = $this->input->get('id');
        if ($this->db->delete('massage', array('id' => $id))) {
            redirect('module=message&view=inbox', 'refresh');
        }
        }

    }
