<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit Student's Info <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Teacher
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Teacher Information
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Edit Information
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
                    <?php $T_id =$this->input->get('id');
                    $u_Id =$this->input->get('uid');
                    ?>
                    <?php
                    foreach ($userInfo as $row) {
                        $first_name = $row['first_name'];
                        $lest_name = $row['last_name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                    }
                    foreach ($teacherInfo as $row1) {
                        $farther_name = $row1['farther_name'];
                        $mother_name = $row1['mother_name'];
                        $birth_date = $row1['birth_date'];
                        $sex = $row1['sex'];
                        $present_address = $row1['present_address'];
                        $permanent_address = $row1['permanent_address'];
                        $position = $row1['position'];
                        $working_hour = $row1['working_hour'];
                        if (!empty($row1['educational_qualification_1'])) {
                            $edu_1 = $row1['educational_qualification_1'];
                            $education_1 = array_map('trim', explode(",", $edu_1));
                        }
                        if (!empty($row1['educational_qualification_2'])) {
                            $edu_2 = $row1['educational_qualification_2'];
                            $education_2 = array_map('trim', explode(",", $edu_2));
                        }
                        if (!empty($row1['educational_qualification_3'])) {
                            $edu_3 = $row1['educational_qualification_3'];
                            $education_3 = array_map('trim', explode(",", $edu_3));
                        }
                        if (!empty($row1['educational_qualification_4'])) {
                            $edu_4 = $row1['educational_qualification_4'];
                            $education_4 = array_map('trim', explode(",", $edu_4));
                        }
                        if (!empty($row1['educational_qualification_5'])) {
                            $edu_5 = $row1['educational_qualification_5'];
                            $education_5 = array_map('trim', explode(",", $edu_5));
                        }
                        $cv = $row1['cv'];
                        $educational_certificat = $row1['educational_certificat'];
                        $exprieance_certificatte = $row1['exprieance_certificatte'];
                        $files_info = $row1['files_info'];
                    }
                    ?>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=teachers&view=edit_teacher&id=<?php echo $T_id; ?>&uid=<?php echo $u_Id; ?>" method="POST">
                            <div class="form-group atFormTop">
                                <label class="col-md-3 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Lest Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_name" value="<?php echo $lest_name; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Father's Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="father_name" class="form-control" value="<?php echo $farther_name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mother's Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="mother_name" class="form-control" value="<?php echo $mother_name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Date Of Birth <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input class="form-control" name="birthdate" value="<?php echo $birth_date; ?>" id="mask_date2" type="text"/>
                                    <span class="help-block">
                                        Date Type  DD/MM/YYYY </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sex <span class="requiredStar"> * </span></label>
                                <div class="col-md-6 marginLeftSex">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="Male" id="optionsRadios4" <?php if ($sex == 'Male') {
                        echo 'checked';
                    }
                    ?>>Male</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="Female" id="optionsRadios5"  <?php if ($sex == 'Female') {
                        echo 'checked';
                    }
                    ?>> Female </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="Other" id="optionsRadios6"  <?php if ($sex == 'Other') {
                        echo 'checked';
                    }
                    ?>> Other </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Present Address</label>
                                <div class="col-md-6">
                                    <textarea rows="3" name="present_address" class="form-control"><?php echo $present_address; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Permanent Address</label>
                                <div class="col-md-6">
                                    <textarea rows="3" name="permanent_address" class="form-control"><?php echo $permanent_address; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">E-mail</label>
                                <div class="col-md-6">
                                    <div class="input-group col-md-12">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone</label>
                                <div class="col-md-6">
                                    <div class="input-group col-md-12">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Post / Position <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="position" value="<?php echo $position; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Working hour <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select name="workingHoure" class="form-control">
                                        <option value="<?php echo $working_hour; ?>"><?php echo $working_hour; ?></option>
                                        <option value="Part time">Part time</option>
                                        <option value="Full time">Full time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Educational Qualification<span class="requiredStar"> * </span></label>
                                <div class="col-md-2">
                                    <H4 class="eduFormTitle">Degree/Diploma</H4>
                                    <input class="form-control eduForm" name="dd_1" type="text" value="<?php if (!empty($education_1['0'])) {
                        echo $education_1['0'];
                    }
                    ?>">
                                    <input class="form-control eduForm" name="dd_2" type="text" value="<?php if (!empty($education_2['0'])) {
                                               echo $education_2['0'];
                                           }
                    ?>">
                                    <input class="form-control eduForm" name="dd_3" type="text" value="<?php if (!empty($education_3['0'])) {
                                               echo $education_3['0'];
                                           }
                    ?>">
                                    <input class="form-control eduForm" name="dd_4" type="text" value="<?php if (!empty($education_4['0'])) {
                                               echo $education_4['0'];
                                           }
                    ?>">
                                    <input class="form-control eduForm" name="dd_5" type="text" value="<?php if (!empty($education_5['0'])) {
                                               echo $education_5['0'];
                                           }
                    ?>">
                                </div>
                                <div class="col-md-3">
                                    <H4 class="eduFormTitle">School/College/University</H4>
                                    <input class="form-control eduForm" name="scu_1" type="text" value="<?php if (!empty($education_1['1'])) {
                                               echo $education_1['1'];
                                           }
                    ?>">
                                    <input class="form-control eduForm" name="scu_2" type="text" value="<?php if (!empty($education_2['1'])) {
                                               echo $education_2['1'];
                                           }
                    ?>">
                                    <input class="form-control eduForm" name="scu_3" type="text" value="<?php if (!empty($education_3['1'])) {
                                               echo $education_3['1'];
                                           }
                    ?>">
                                    <input class="form-control eduForm" name="scu_4" type="text" value="<?php if (!empty($education_4['1'])) {
                                               echo $education_4['1'];
                                           }
                    ?>">
                                    <input class="form-control eduForm" name="scu_5" type="text" value="<?php if (!empty($education_5['1'])) {
                                               echo $education_5['1'];
                                           }
                    ?>">
                                </div>
                                <div class="col-md-2">
                                    <H4 class="eduFormTitle">Result</H4>
                                    <input class="form-control eduForm" name="result_1" type="text" value="<?php if (!empty($education_1['2'])) {
                                        echo $education_1['2'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="result_2" type="text" value="<?php if (!empty($education_2['2'])) {
                                        echo $education_2['2'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="result_3" type="text" value="<?php if (!empty($education_3['2'])) {
                                        echo $education_3['2'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="result_4" type="text" value="<?php if (!empty($education_4['2'])) {
                                        echo $education_4['2'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="result_5" type="text" value="<?php if (!empty($education_5['2'])) {
                                        echo $education_5['2'];
                                    }
                    ?>">
                                </div>
                                <div class="col-md-2">
                                    <H4 class="eduFormTitle">Passing year</H4>
                                    <input class="form-control eduForm" name="paYear_1" type="text" value="<?php if (!empty($education_1['3'])) {
                                        echo $education_1['3'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="paYear_2" type="text" value="<?php
                                    if (!empty($education_2['3'])) {
                                        echo $education_2['3'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="paYear_3" type="text" value="<?php
                                    if (!empty($education_3['3'])) {
                                        echo $education_3['3'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="paYear_4" type="text" value="<?php
                                    if (!empty($education_4['3'])) {
                                        echo $education_4['3'];
                                    }
                    ?>">
                                    <input class="form-control eduForm" name="paYear_5" type="text" value="<?php
                                    if (!empty($education_5['3'])) {
                                        echo $education_5['3'];
                                    }
                    ?>">
                                </div>
                            </div>
                            <div class="alert alert-success">
                                <strong>Note:</strong> Submitted All Document Informations.
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-9">
                                    <div class="checkbox-list">
                                        <label>
                                            <input name="cv" value="submited" type="checkbox"> CV Personal Curriculum Vita</label>
                                        <label>
                                            <input name="educational_certificat" value="submited" type="checkbox"> Education's certificate </label>
                                        <label>
                                            <input name="exc" value="submited" type="checkbox"> Experiences Certificates</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit" value="Update">Update</button>
                                    <button type="reset" onclick="javascript:history.back()" class="btn default">Go Back</button>
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
