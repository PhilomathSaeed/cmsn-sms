<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account extends MX_Controller
    {

    /**
     * This controller is using for controlling account and tranjection
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=account
     * 	- or -  
     * 		http://example.com/index.php?module=account&view=<method_name>
     */
    function __construct()
        {
        parent::__construct();
        $this->load->model('accountmodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    //This function is adding now account title
    public function addAccountTitle()
        {
        if ($this->input->post('submit',TRUE)) {
            $accuntInfo = array(
                'account_title' => $this->db->escape_like_str($this->input->post('accountTitle',TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('type',TRUE)),
                'description' => $this->db->escape_like_str($this->input->post('description',TRUE))
            );
            
            if ($this->db->insert('account_title', $accuntInfo)) {
                redirect('module=account&view=allAccount', 'refresh');
            }
        } else {
            $this->load->view('temp/header');
            $this->load->view('addAccountTitle');
            $this->load->view('temp/footer');
        }
        }

    //This function is using for show all account title view
    public function allAccount()
        {
        $data['allAccount'] = $this->common->getAllData('account_title');
        $this->load->view('temp/header');
        $this->load->view('allAccount', $data);
        $this->load->view('temp/footer');
        }

    //This function will edit Account title information here.
    public function editAccountInfo()
        {
        $id = $this->input->get('id',TRUE);
        if ($this->input->post('submit',TRUE)) {
            $accuntInfo = array(
                'account_title' => $this->db->escape_like_str($this->input->post('accountTitle',TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('type',TRUE)),
                'description' => $this->db->escape_like_str($this->input->post('description',TRUE))
            );
            $this->db->where('id', $id);
            if ($this->db->update('account_title', $accuntInfo)) {
                redirect('module=account&view=allAccount', 'refresh');
            }
        } else {
            $data['accountInfo'] = $this->common->getWhere('account_title', 'id', $id);

            $this->load->view('temp/header');
            $this->load->view('editAccount', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will delete Account Title.
    public function deleteAccount()
        {
        $id = $this->input->get('id',TRUE);
        $this->db->delete('account_title', array('id' => $id));

        //After deleteing the account lode all Account info.
        redirect('module=account&view=allAccount', 'refresh');
        }

    //THis function make student tranjection and slip.
    public function studentTranjection()
        {
        if ($this->input->post('submit',TRUE)) {
            $studentId = $this->input->post('studentId',TRUE);
            $studentName = $this->input->post('studentName',TRUE);
            $date = $this->input->post('date',TRUE);
            $dateInte = strtotime($date);
            $classTitle = $this->input->post('class',TRUE);
            $slipNumber = $this->accountmodel->maxSlip();
            $totalAmount1 = '';
            $totalAmount2 = '';
            $totalAmount3 = '';
            $totalAmount4 = '';
            $totalAmount5 = '';
            $totalAmount6 = '';
            $totalAmount7 = '';
            $totalAmount8 = '';
            $totalAmount9 = '';
            $totalAmount10 = '';
            $totalAmount11 = '';
            $totalAmount12 = '';

            //Here is chacking that is it admission's inforamtions ?
            if ($this->input->post('admitionType',TRUE) != 'o' && $this->input->post('admitionFeeAmount',TRUE)) {
                $accountTitle = $this->input->post('admitionType',TRUE);
                $totalAmount1 = $this->input->post('admitionFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount1 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str($accountTitle),
                    'totalAmount' => $this->db->escape_like_str($totalAmount1),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it tution Fee's inforamtions ?
            if ($this->input->post('tutionFeeAmount',TRUE)) {
                $totalAmount2 = $this->input->post('tutionFeeAmount',TRUE);
                $feeRange = $this->input->post('tutionFeeRange',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount2 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'account_life_time' => $this->db->escape_like_str($feeRange),
                    'title' => $this->db->escape_like_str('Tution Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount2),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it admissin from fee's inforamtions ?
            if ($this->input->post('admissinFromFeeAmount',TRUE)) {
                $totalAmount3 = $this->input->post('admissinFromFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount3 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Admissin From Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount3),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it registration fee's inforamtions ?
            if ($this->input->post('registrationFeeAmount',TRUE)) {
                $totalAmount4 = $this->input->post('registrationFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount4 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Registration Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount4),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it Library or Lab fee's inforamtions ?
            if ($this->input->post('libraryLabFeeAmount',TRUE)) {
                $totalAmount5 = $this->input->post('libraryLabFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount5 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Library/Lab Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount5),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it internship fee's inforamtions ?
            if ($this->input->post('internshipFeeAmount',TRUE)) {
                $totalAmount6 = $this->input->post('internshipFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount6 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Internship Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount6),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it Certificate/Transcript Issue fee's inforamtions ?
            if ($this->input->post('CerTransIssueFeeAmount',TRUE)) {
                $totalAmount7 = $this->input->post('CerTransIssueFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount7 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Certificate/Transcript Issue'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount7),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it Exam Center fee's inforamtions ?
            if ($this->input->post('ExamCenterFeeAmount',TRUE)) {
                $totalAmount8 = $this->input->post('ExamCenterFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount8 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Exam Center Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount8),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it ID Card fee's inforamtions ?
            if ($this->input->post('IDCardFeeAmount',TRUE)) {
                $totalAmount9 = $this->input->post('IDCardFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount9 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('ID Card Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount9),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it WorkShop Registation fee's inforamtions ?
            if ($this->input->post('WorkShopRegisFeeAmount',TRUE)) {
                $totalAmount10 = $this->input->post('WorkShopRegisFeeAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount10 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('WorkShop Registation Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount10),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it Delay fee's inforamtions ?
            if ($this->input->post('DelayFee',TRUE)) {
                $totalAmount11 = $this->input->post('DelayFee',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount11 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Delay Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount11),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            //Here is chacking that is it  Others fee's inforamtions ?
            if ($this->input->post('OthersAmount',TRUE)) {
                $totalAmount12 = $this->input->post('OthersAmount',TRUE);
                $MaxIncom = $this->accountmodel->maxIncome();
                $totalIncom = $totalAmount12 + $MaxIncom;

                $incomeInfo = array(
                    'class_title' => $this->db->escape_like_str($classTitle),
                    'student_Id' => $this->db->escape_like_str($studentId),
                    'student_name' => $this->db->escape_like_str($studentName),
                    'date' => $this->db->escape_like_str($dateInte),
                    'dr_cr' => $this->db->escape_like_str('DR'),
                    'title' => $this->db->escape_like_str('Others Fee'),
                    'totalAmount' => $this->db->escape_like_str($totalAmount12),
                    'totalIncom' => $this->db->escape_like_str($totalIncom),
                    'slip_number' => $this->db->escape_like_str($slipNumber)
                );

                $this->db->insert('income', $incomeInfo);
            }

            $slipInfo = array(
                'date' => $this->db->escape_like_str($dateInte),
                'class_title' => $this->db->escape_like_str($classTitle),
                'student_id' => $this->db->escape_like_str($studentId),
                'student_name' => $this->db->escape_like_str($studentName),
                'slip_number' => $this->db->escape_like_str($slipNumber)
            );

            if ($this->db->insert('student_fee_slip', $slipInfo)) {
                redirect('module=account&view=allSlips', 'refresh');
            }
        } else {
            $data['classTile'] = $this->common->getAllData('class');
            $data['currency'] = $this->common->currencyClass();
            $this->load->view('temp/header');
            $this->load->view('studentTranjection', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function will load all students trangections slips
    public function allSlips()
        {
        $data['slips'] = $this->common->getAllData('student_fee_slip');
        $this->load->view('temp/header');
        $this->load->view('allSlips', $data);
        $this->load->view('temp/footer');
        }

    //Show invioce or students tranjection slips details
    public function slipDetails()
        {
        $slipId = $this->input->get('slipId',TRUE);
        $data['slips'] = $this->common->getAllData('student_fee_slip');
        $data['slips'] = $this->common->getWhere('student_fee_slip', 'slip_number', $slipId);
        $data['slipTrangaction'] = $this->common->getWhere('income', 'slip_number', $slipId);
        $data['totalAmount'] = $this->accountmodel->totalAmount($slipId);
        $data['schoolName'] = $this->common->schoolName();
        $data['currency'] = $this->common->currencyClass();
        $this->load->view('temp/header');
        $this->load->view('slipDetails', $data);
        $this->load->view('temp/footer');
        }

    //This function make slip action.
    public function slipAction()
        {
        $slipId = $this->input->get('slipId',TRUE);
        $data['slips'] = $this->common->getWhere('student_fee_slip', 'slip_number', $slipId);
        $data['slipTrangaction'] = $this->common->getWhere('income', 'slip_number', $slipId);
        $data['totalAmount'] = $this->accountmodel->totalAmount($slipId);
        $this->load->view('temp/header');
        $this->load->view('actionSlip', $data);
        $this->load->view('temp/footer');
        }

    //This function can edeit slip information.
    public function editSlip()
        {
        $id = $this->input->get('id',TRUE);
        if ($this->input->post('submit',TRUE)) {
            $editAmount = $this->input->post('editAmount',TRUE);
            $totalAmount = $this->input->post('totalAmount',TRUE);
            $totalIncome = $this->input->post('totalIncpme',TRUE);

            if ($totalAmount < $editAmount) {
                $value = $editAmount - $totalAmount;
                $updateData = array(
                    'totalAmount' => $this->db->escape_like_str($totalAmount + $value),
                    'totalIncom' => $this->db->escape_like_str($totalIncome + $value)
                );
                $this->db->where('id', $id);
                $this->db->update('income', $updateData);
            } elseif ($totalAmount > $editAmount) {
                $value = $totalAmount - $editAmount;
                $updateData = array(
                    'totalAmount' => $this->db->escape_like_str($totalAmount - $value),
                    'totalIncom' => $this->db->escape_like_str($totalIncome - $value)
                );
                $this->db->where('id', $id);
                $this->db->update('income', $updateData);
            } else {
                $updateData = array(
                    'totalAmount' => $this->db->escape_like_str($totalAmount),
                    'totalIncom' => $this->db->escape_like_str($totalIncome)
                );
                $this->db->where('id', $id);
                $this->db->update('income', $updateData);
            }
            redirect('module=account&view=allSlips', 'refresh');
        } else {
            //$data['slips'] = $this->common->getAllData('student_fee_slip');
            $data['slipTrangaction'] = $this->common->getWhere('income', 'id', $id);
            //$data['totalAmount'] = $this->accountmodel->totalAmount($slipId);
            $this->load->view('temp/header');
            $this->load->view('editslip', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function can delete a slip full.
    public function deletSlip()
        {
        $id = $this->input->get('id',TRUE);
        $slipNumber = $this->input->get('slipnumber',TRUE);
        if ($this->db->delete('student_fee_slip', array('id' => $id))) {
            $this->db->delete('income', array('slip_number' => $slipNumber));
            $data['slips'] = $this->common->getAllData('student_fee_slip');
            $this->load->view('temp/header');
            $this->load->view('allSlips', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function can delete item in an slip.
    public function deletSlipItem()
        {
        $id = $this->input->get('id',TRUE);
        $slipId = $this->input->get('slipId',TRUE);
        if ($this->db->delete('income', array('id' => $id))) {
            $data['slips'] = $this->common->getAllData('student_fee_slip');
            $data['slipTrangaction'] = $this->common->getWhere('income', 'slip_number', $slipId);
            $data['totalAmount'] = $this->accountmodel->totalAmount($slipId);
            $this->load->view('temp/header');
            $this->load->view('actionSlip', $data);
            $this->load->view('temp/footer');
        }
        }
    }
