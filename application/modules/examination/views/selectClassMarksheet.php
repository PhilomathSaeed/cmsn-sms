<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    All Student <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Examination
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Students Mark's Sheet
                    </li>                        
                    <li id="result" class="pull-right topClock"></li>
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
                                    Select Class And Section
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
                                <form class="form-horizontal" action="index.php?module=examination&view=selectClassMarksheet" method="POST">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Class</label>
                                            <div class="col-md-4">
                                                <select onchange="classSection(this.value)"  class="form-control" name="class" required>
                                                    <option value="">Select...</option>
                                                    <?php foreach ($class as $row) { ?>
                                                        <option value="<?php echo $row['class_title']; ?>"><?php echo $row['class_title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block">
                                                    At first select any class then see the student information.   </span>
                                            </div>
                                        </div>
                                        <div id="ajaxResult">
                                        </div>
                                    </div>
                                    <div class="form-actions bottom fluid ">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn green" name="submit" type="submit" value="Submit">Submit</button>
                                            <button class="btn default" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                </form>
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
    function classSection(str) {
        var xmlhttp;
        if (str.length === 0) {
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
        };
        xmlhttp.open("GET", "index.php?module=examination&view=ajaxClassMarkshit&q=" + str, true);
        xmlhttp.send();
    }
</script>
<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 5000));
    });
</script>