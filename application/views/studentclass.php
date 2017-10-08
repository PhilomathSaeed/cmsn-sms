<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Student's Information <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Student
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Student's Information 
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php echo $classTitle; ?> 
                    </li><li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <!--Start button bar-->
        <div class="row">
            <div class="col-md-12 admisionButonContent">
                <a class="btn green floatRight" href="index.php?module=users&view=admission">
                    <i class="fa fa-plus"></i> New Admission 
                </a>
            </div>
        </div>
        <!--End button bar-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green-haze">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo $classTitle; ?> Student Information <?php if (!empty($section)) {
                                echo $section;
                            } ?>    
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Student ID
                                    </th>
                                    <th>
                                        Roll No
                                    </th>
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Student Name
                                    </th>
                                    <th>
                                        Phone No
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($studentInfo as $row) {
                                    //get student information from "user" table.
                                    $class = $row['class_title'];
                                    $userId = $row['user_id'];
                                    $query = $this->db->get_where('users', array('id' => $userId));
                                    foreach ($query->result_array() as $row2) {
                                        $userdata = $row2;
                                    }
                                    $phoneNumber = $userdata['phone'];
                                    $email = $userdata['email'];

                                    //get student information from "student_info" table.
                                    $studentInfoId = $row['student_info_id'];
                                    $qusry2 = $this->db->get_where('student_info', array('id' => $studentInfoId));
                                    foreach ($qusry2->result_array() as $row3) {
                                        $studentInfo = $row3;
                                    }
                                    $photo = $studentInfo['student_photo'];
                                    $address = $studentInfo['present_address'];
                                    ?>

                                    <tr>
                                        <td>
    <?php echo $row['student_id']; ?>
                                        </td>
                                        <td>
    <?php echo $row['roll_number']; ?>
                                        </td>
                                        <td>
                                            <div class="tableImage">
                                                <img src="assets/uploads/studentPicture/<?php echo $photo; ?>" alt="">
                                            </div>
                                        </td>
                                        <td>
    <?php echo $row['student_title']; ?>
                                        </td>
                                        <td>
    <?php echo $phoneNumber; ?>
                                        </td>
                                        <td>
    <?php echo $address ?>
                                        </td>
                                        <td>
    <?php echo $email; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs green tableActionButtonMargin" href="index.php?module=students&view=students_details&di=<?php echo $row['id']; ?>&sid=<?php echo $studentInfoId; ?>&userId=<?php echo $userId; ?>&class=<?php echo $class; ?>"> <i class="fa fa-file-text-o"></i> Details </a>
    <?php if ($this->ion_auth->is_admin()) { ?>
                                                <a class="btn btn-xs default tableActionButtonMargin" href="index.php?module=students&view=editStudent&di=<?php echo $row['id']; ?>&sid=<?php echo $studentInfoId; ?>&userId=<?php echo $userId; ?>&class=<?php echo $class; ?>"> <i class="fa fa-pencil-square"></i> Edit </a>
                                                <a class="btn btn-xs red tableActionButtonMargin" href="index.php?module=students&view=studentDelete&di=<?php echo $row['id']; ?>&sid=<?php echo $studentInfoId; ?>&userId=<?php echo $userId; ?>" onClick='javascript:return confirm("Are you sure you want to delete this student?")'> <i class="fa fa-trash-o"></i> Delete </a>
    <?php } ?>
                                        </td>
                                    </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->


<!--Begin Page Level Script-->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<!--End Page Level Script-->
<script>
    jQuery(document).ready(function() {
    //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
