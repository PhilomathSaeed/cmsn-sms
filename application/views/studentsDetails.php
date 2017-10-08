
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Students Details <small> Information</small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Students
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Students Information
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Details
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->

        <div class="row">
            <div class="col-md-3">

                <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="detailsPicture">
                        <img alt="" class="img-responsive" src="assets/uploads/studentPicture/<?php echo $photo; ?>">
                    </li>
                    <?php if ($this->ion_auth->is_admin()) { ?>
                        <li>
                            <?php
                            $studentClassId =$this->input->get('di');
                            $studentInfoId =$this->input->get('sid');
                            $userId =$this->input->get('userId');
                            $class =$this->input->get('class');
                            ?>
                            <a href="index.php?module=students&view=editStudent&di=<?php echo $studentClassId; ?>&sid=<?php echo $studentInfoId; ?>&userId=<?php echo $userId; ?>&class=<?php echo $class; ?>">
                                <i class="fa fa-cog"></i> Edit info </a>
                            <span class="after">
                            </span>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="javascript:history.back()">
                            <i class="fa fa-mail-reply-all"></i> Go Back </a>

                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-8 profile-info">
                        <?php
                        foreach ($studentInfo as $row) {
                            $userId = $row['user_id'];
                            $studentInfoId = $row['student_info_id'];
                            $studentPercentise = $row['attendance_percentices_daily'];
                            $query = $this->db->get_where('users', array('id' => $userId));
                            foreach ($query->result_array() as $row1) {
                                $data = $row1;
                            }
                            $first_name = $data['first_name'];
                            $last_name = $data['last_name'];
                            $email = $data['email'];
                            $phone = $data['phone'];

                            $query2 = $this->db->get_where('student_info', array('id' => $studentInfoId));
                            foreach ($query2->result_array() as $row2) {
                                $data2 = $row2;
                            }
                            $sex = $data2['sex'];
                            $dateOfBireth = $data2['birth_date'];
                            $fartherName = $data2['farther_name'];
                            $motherName = $data2['mother_name'];
                            $presentAddress = $data2['present_address'];
                            $permanentAddress = $data2['permanent_address'];
                            $fatherOccupation = $data2['father_occupation'];
                            $fatherIncomRange = $data2['father_incom_range'];
                            $motherOccupation = $data2['mother_occupation'];
                            $documentsInfo = $data2['documents_info'];
                            ?>
                            <h1 class="teacherTitleFont"><?php echo $first_name . ' ' . $last_name; ?></h1>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    <span>: </span>
                                    Class
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $row['class_title']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Roll Number
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $row['roll_number']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Student ID
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $row['student_id']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Section
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $row['section']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Email
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $email; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Phone Number
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $phone; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Date of Birth
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $dateOfBireth; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Sex
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $sex; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Father Name
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $fartherName; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Mother Name
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $motherName; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Present Address
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $presentAddress; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Permanent Address
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $permanentAddress; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Father Occupation
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $fatherOccupation; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Father Income Range
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $fatherIncomRange; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Mother Occupation
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $motherOccupation; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-6 detailsEvent">
                                    Documents Info
                                    <span>: </span>
                                </div>
                                <div class="col-sm-6 col-xs-6 detailsEvent">
    <?php echo $documentsInfo; ?>
                                </div>
                            </div>
<?php } ?>
                    </div>
                    <!--end col-md-8-->
                    <div class="col-md-4">
                        <div class="portlet sale-summary">
                            <div class="portlet-title">
                                <div class="caption">
                                    Information Summary
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="reload">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <span class="sale-info">
                                            Attendance % <i class="fa fa-img-up"></i>
                                        </span>
                                        <span class="sale-num">
<?php echo $studentPercentise; ?> % </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end col-md-4-->
                </div>
                <!--end row-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->]

<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
