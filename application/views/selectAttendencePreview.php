<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Select Class For Attendance <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.php?module=welcome&view=allStudent">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="index.php?module=welcome&view=allStudent">Attendance</a>
                    </li>

                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->


        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="tab_0" class="tab-pane active">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    Select Class And Section For Attendance.
                                </div>
                                <div class="tools">
                                    <a class="collapse" href="javascript:;">
                                    </a>
                                    <a class="reload" href="javascript:;">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form class="form-horizontal" action="index.php?module=dailyAttendance&view=attendencePreview" method="POST">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date</label>
                                            <div class="col-md-3">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="date" value=""/>
                                                <span class="help-block">
                                                    Select date </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Class</label>
                                            <div class="col-md-4">
                                                <select name="class_title" onchange="attendanceClassSection(this.value)" class="form-control">
                                                    <option value=""> Select Class .... </option>
                                                    <?php foreach ($s_class as $row): ?> 
                                                        <option value="<?php echo $row['class_title']; ?>"><?php echo $row['class_title']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block">
                                                    At first select any class then see the student information.   </span>
                                            </div>
                                        </div>

                                        <div id="ajaxResult">
                                        </div>

                                        <div class="form-actions bottom fluid ">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button class="btn green" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                            </div>
                                        </div>
                                </form>
                                <!--                                       
                                                                
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->




<script>
    jQuery(document).ready(function() {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    });
</script>
<!-- Retrieve Class Name from Database with Ajax  --> 
<script>
    function attendanceClassSection(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("ajaxResult").innerHTML = "";
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
                document.getElementById("ajaxResult").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "index.php?module=dailyAttendance&view=ajaxAttendencePreview&q=" + str, true);
        xmlhttp.send();
    }
</script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>