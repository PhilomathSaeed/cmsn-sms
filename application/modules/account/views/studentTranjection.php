
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Transection for students.<small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Account
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Student Transection
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
                            Give the information for transection.
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=account&view=studentTranjection" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Student ID <span class="requiredStar"> </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="studentId" onkeydown="studentID(this.value)" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Student Name <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" name="studentName" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Date <span class="requiredStar"> * </span></label>
                                    <div class="col-md-5">
                                        <div class="input-group input-medium date date-picker" data-date="" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                            <input type="text" class="form-control" name="date" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                        <span class="help-block">
                                            If it is monthly fees, select first which month's fees.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Class <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="class">
                                            <option valu="">Select Class</option>
                                            <?php foreach ($classTile as $row) { ?>
                                                <option value="<?php echo $row['class_title']; ?>"> <?php echo $row['class_title']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet box green-haze actionSlipBorder">

                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            SL.
                                                        </th>
                                                        <th>
                                                            Descriptions
                                                        </th>
                                                        <th>
                                                            <i class="<?php echo $currency; ?>"></i> &nbsp; Amount 
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            01
                                                        </td>
                                                        <td>
                                                            Admission
                                                <spen class="col-sm-6 floatRight">
                                                    <select class="form-control" name="admitionType">
                                                        <option value="o"> </option>
                                                        <option value="Admission Fee">Admission Fee</option>
                                                        <option value="Re-Admission Fee">Re-Admission Fee</option>
                                                        <option value="T/C Fee">T/C Fee</option>
                                                    </select>
                                                </spen>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control" type="text" name="admitionFeeAmount" placeholder="   - - - - -">
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        02
                                                    </td>
                                                    <td>
                                                        Tuition Fee for the month os
                                                <spen class="col-sm-6 floatRight">
                                                    <input class="col-xs-2 form-control"type="text" name="tutionFeeRange" placeholder="Example: January - March">
                                                </spen>
                                                </td>
                                                <td>
                                                    <input class="col-xs-2 form-control"type="text" name="tutionFeeAmount" placeholder="   - - - - -">
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        03
                                                    </td>
                                                    <td>
                                                        Admission form fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="admissinFromFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        04
                                                    </td>
                                                    <td>
                                                        Registration Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="registrationFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        05
                                                    </td>
                                                    <td>
                                                        Library/Lab Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="libraryLabFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        06
                                                    </td>
                                                    <td>
                                                        Internship Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="internshipFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        07
                                                    </td>
                                                    <td>
                                                        Certificate/Transcript Issue Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="CerTransIssueFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        08
                                                    </td>
                                                    <td>
                                                        Exam/Center Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="ExamCenterFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        09
                                                    </td>
                                                    <td>
                                                        ID Card Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="IDCardFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        10
                                                    </td>
                                                    <td>
                                                        Workshop Registration Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="WorkShopRegisFeeAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        11
                                                    </td>
                                                    <td>
                                                        Delay Fee
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="DelayFee" placeholder="   - - - - -">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        Others
                                                    </td>
                                                    <td>
                                                        <input class="col-xs-2 form-control"type="text" name="OthersAmount" placeholder="   - - - - -">
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit">Submit</button>
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
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->



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
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
