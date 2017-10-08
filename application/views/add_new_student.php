<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Add New Student <small></small>
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
                        Add New Student
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
                    <div class="portlet-body form">


                        <!--<form class="form-horizontal" role="form" action="index.php?module=users&view=admission" method="post">-->
                        <?php $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                        echo form_open_multipart('module=users&view=admission', $form_attributs);
                        ?>
                        <div class="form-body">
                            <?php
                            if (!empty($success)) {
                                echo $success;
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Father Name <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="father_name" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mother Name <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mother_name" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Date Of Birth <span class="requiredStar"> * </span></label>
                                <div class="col-md-4">
                                    <input class="form-control" name="birthdate" id="mask_date2" type="text" required>
                                    <span class="help-block">
                                        Date Type  DD/MM/YYYY </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sex <span class="requiredStar"> * </span></label>
                                <div class="col-md-6 marginLeftSex">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="optionsRadios4" value="Male">Male</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="optionsRadios5" value="Female"> Female </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="optionsRadios6" value="Other"> Other </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Present Address <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="present_address" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Permanent Address <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="permanent_address" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone Number <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="" required>
                                    <span class="help-block">01600-000000</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="" name="email" required>
                                    <span class="help-block">abcd@gmail.com </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Password </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm Password </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirm" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Father's Occupation <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select name="father_occupation" class="form-control" required>
                                        <option>Select one</option>
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
                                    <input type="text" name="father_incom_range" class="form-control" placeholder="" required>
                                    <span class="help-block">
                                        Range for every month 2200 $</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mother's Occupation</label>
                                <div class="col-md-6">
                                    <select name="mother_occupation" class="form-control" required>
                                        <option>Select one</option>
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
                            <div class="form-group">
                                <label class="col-md-3 control-label">Class <span class="requiredStar"> * </span></label>
                                <div class="col-md-6">
                                    <select name="class" onchange="classInfo(this.value)" class="form-control" required>
                                        <option value="">Select Class...</option>
<?php foreach ($s_class as $row) { ?>
                                            <option value="<?php echo $row['class_title']; ?>"><?php echo $row['class_title']; ?></option>
<?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div id="txtHint">

                            </div>

                            <div class="form-group last">
                                <label class="control-label col-md-3">Student's Photo <span class="requiredStar"> * </span></label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail uploadImagePreview">
                                        </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists">
                                                    Change </span>
                                                <input type="file" name="userfile">
                                            </span>
                                            <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                    </div>
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
                                            <input type="checkbox" name="previous_certificate" value="submited"> Previous  Class Certificate. </label>
                                        <label>
                                            <input type="checkbox" name="tc" value="submited"> Transfer certificate. </label>
                                        <label>
                                            <input type="checkbox" name="at" value="submited"> Academic Transcript. </label>
                                        <label>
                                            <input type="checkbox" name="nbc" value="submited"> National Birth Certificate. </label>
                                        <label>
                                            <input type="checkbox" name="testmonial" value="submited"> Testimonial  </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Submitted File Informations <span class="requiredStar">  </span></label>
                                <div class="col-md-6">
                                    <input type="text" name="submit_file_information" class="form-control" placeholder="File NO S-13-005 or any other information.">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn green">Submit</button>
                                <button type="reset" class="btn default">Cancel</button>
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


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>

<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->


<script src="assets/admin/pages/scripts/components-form-tools.js"></script>

<script>
                                        jQuery(document).ready(function() {
                                            ComponentsFormTools.init();
                                        });
</script>
<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
    var RecaptchaOptions = {
        theme: 'custom',
        custom_theme_widget: 'recaptcha_widget'
    };
</script>
<script>
    function classInfo(str) {
        var xmlhttp;
        if (str.length === 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?module=users&view=student_info&q=" + str, true);
        xmlhttp.send();
    }
</script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
