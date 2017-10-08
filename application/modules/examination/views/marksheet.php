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
                    Students Mark's Sheet  <small></small>
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
            <div class="col-md-12" id="print">
                <div class="col-md-12 btn-group floatRight">
                    <button class="btn green-meadow prin-link" onclick="jQuery('#print').print()" type="button"><i class="fa fa-print"></i> Print</button>
                </div>       
                <!--BEGIN EXAMPLE TABLE PORTLET-->
                <div class="col-md-12 markshitMotherDive">
                    <h1> <?php echo $examTitle; ?> <small class="markshitMotherDiveSmol">Mark Sheet</small></h1>
                    Student Name : &nbsp;&nbsp;<?php echo $studentName; ?><br>
                    Student Id : &nbsp;&nbsp;<?php echo $studentId; ?><br>
                </div>
                <div class="portlet box green-haze">
                    <div class="portlet-title">
                        <div class="caption">
                            Exam Mark Sheet. 
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Mark
                                    </th>
                                    <th>
                                        Grade
                                    </th>
                                    <th>
                                        Point
                                    </th>
                                    <th>
                                        Result
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($markshit as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['exam_subject']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['mark']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['grade']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['point']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $row['result']; ?> 
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


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script type="text/javascript" src="assets/admin/layout/scripts/jQuery.print.js"></script>
<script>
    jQuery(document).ready(function() {
    //here is auto reload after 1 second for time and date in the top

        $("#print").find('.print-link').on('click', function() {
            //Print print with default options
            $.print("#print");
        });
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 5000));
    });
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

