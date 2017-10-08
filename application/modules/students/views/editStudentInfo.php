<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit Student Information <small></small>
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

        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> Give Your Full Information Bellow
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <?php
                    foreach ($users as $row) {
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                    }
                    foreach ($studentInfo as $row1) {
                        $fatherName = $row1['farther_name'];
                        $motherName = $row1['mother_name'];
                        $birthDate = $row1['birth_date'];
                        $sex = $row1['sex'];
                        $present_address = $row1['present_address'];
                        $permanent_address = $row1['permanent_address'];
                        $father_occupation = $row1['father_occupation'];
                        $father_incom_range = $row1['father_incom_range'];
                        $mother_occupation = $row1['mother_occupation'];
                        $class = $row1['class'];
                        $section = $row1['section'];

                        $last_class_certificate = $row1['last_class_certificate'];
                        $t_c = $row1['t_c'];
                        $academic_transcription = $row1['academic_transcription'];
                        $national_birth_certificate = $row1['national_birth_certificate'];
                        $testimonial = $row1['testimonial'];
                        $documents_info = $row1['documents_info'];
                    }
                    $m = '';
                    $f = "";
                    $o = "";
                    if ($sex == 'Male') {
                        $m = 'checked';
                    } elseif ($sex == 'Female') {
                        $f = 'checked';
                    } elseif ($sex == 'Other') {
                        $o = 'checked';
                    }

                    $userId =$this->input->get('userId');
                    $studentInfoId =$this->input->get('sid');
                    $studentClass =$this->input->get('di');
                    $class =$this->input->get('class');
                    ?>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=students&view=editStudent&di=<?php echo $studentClass; ?>&sid=<?php echo $studentInfoId; ?>&userId=<?php echo $userId; ?>&class=<?php echo $class; ?>" method="POST">
                            <div class="form-body">
<?php
if (!empty($success)) {
    echo $success;
}
?>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">First Name <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $first_name ?>" name="first_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Name <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $last_name; ?>" name="last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone Number <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                                        <span class="help-block">01600-000000</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" value="<?php echo $email; ?>"name="email">
                                        <span class="help-block">abcd@gmail.com </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Father Name <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="father_name" value="<?php echo $fatherName; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mother Name <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mother_name" value="<?php echo $motherName; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Date Of Birth <span class="requiredStar"> * </span></label>
                                    <div class="col-md-4">
                                        <input class="form-control" name="birthdate" value="<?php echo $birthDate; ?>" type="text"/>
                                        <span class="help-block">
                                            Date Type  DD/MM/YYYY </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Sex <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6 marginLeftSex">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadios4" <?php echo $m; ?> value="Male">Male</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadios5" <?php echo $f; ?> value="Female"> Female </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" id="optionsRadios6" <?php echo $o; ?> value="Other"> Other </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Present Address <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="present_address" rows="3"><?php echo $present_address; ?> </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Permanent Address <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="permanent_address" rows="3"><?php echo $permanent_address; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Father's Occupation <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select name="father_occupation" class="form-control">
                                            <option><?php echo $father_occupation; ?></option>
                                            <option>Business</option>
                                            <option>Employer</option>
                                            <option>Banker</option>
                                            <option>Teachers</option>
                                            <option>Farmer</option>
                                            <option>Car Driver</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Father's Income Range <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="father_incom_range" class="form-control" value="<?php echo $father_incom_range; ?>">
                                        <span class="help-block">
                                            Range for every month 2200 $</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mother's Occupation</label>
                                    <div class="col-md-6">
                                        <select name="mother_occupation" class="form-control">
                                            <option><?php echo $mother_occupation; ?></option>
                                            <option>Housewife</option>
                                            <option>Business</option>
                                            <option>Employer</option>
                                            <option>Banker</option>
                                            <option>Teachers</option>
                                            <option>Farmer</option>
                                            <option>Car Driver</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                            <?php foreach ($classStudents as $row3) { ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class </label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="class">
                                                <option class="claasSelectBGColor"  value="<?php echo $class; ?>"><?php echo $class; ?></option>
    <?php foreach ($s_class as $row2) { ?>
                                                    <option value="<?php echo $row2['class_title']; ?>" ><?php echo $row2['class_title']; ?></option>
    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">session </label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="section">
                                                <option class="claasSelectBGColor" value="<?php echo $section; ?>"><?php echo $section; ?></option>
    <?php
    foreach ($section as $sect) {
        echo '<option value="' . $sect . '">' . $sect . '</option>';
    }
    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Student's ID </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" value="<?php echo $row3['student_id']; ?>" name="student_id" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Roll Number</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"  value="<?php echo $row3['roll_number']; ?>" name="roll_number" readonly>
                                        </div>
                                    </div>
<?php } ?>

                                <div class="alert alert-success">
                                    <strong>Note:</strong> Submitted All Document Informations.
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> </label>
                                    <div class="col-md-9">
                                        <div class="checkbox-list">
                                            <label>
                                                <input type="checkbox" name="previous_certificate" <?php
if (!empty($last_class_certificate)) {
    echo 'checked value="submited"';
}
?>> Previous  Class Certificate. </label>
                                            <label>
                                                <input type="checkbox" name="tc"  <?php
                                                       if (!empty($t_c)) {
                                                           echo 'checked value="submited"';
                                                       }
                                                       ?>> Transfer certificate. </label>
                                            <label>
                                                <input type="checkbox" name="at" <?php
                                                       if (!empty($academic_transcription)) {
                                                           echo 'checked value="submited"';
                                                       }
                                                       ?>> Academic Transcript. </label>
                                            <label>
                                                <input type="checkbox" name="nbc" <?php
                                                       if (!empty($national_birth_certificate)) {
                                                           echo 'checked value="submited"';
                                                       }
                                                       ?>> National Birth Certificate. </label>
                                            <label>
                                                <input type="checkbox" name="testmonial" <?php
                                                       if (!empty($testimonial)) {
                                                           echo 'checked value="submited"';
                                                       }
                                                       ?>> Testimonial  </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Submitted File Informations <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="submit_file_information" value="<?php echo $documents_info; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit" value="Submit">Submit</button>
                                    <button type="reset" onclick="javascript:history.back()" class="btn default">Back</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
