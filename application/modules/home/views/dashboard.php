<!-- Begin PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
<!-- End PAGE STYLES -->
<!-- Begin CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Dashboard <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <!-- BEGIN DASHBOARD-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-group"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $totalStudent; ?>
                        </div>
                        <div class="desc">
                            Total Students
                        </div>
                    </div>
                    <div class="more dasTotalStudentTest">
                        In This System
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <span class="icon-users totalTeacherSpan" aria-hidden="true"></span>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $totalTeacher; ?>
                        </div>
                        <div class="desc">
                            Total Teachers
                        </div>
                    </div>
                    <div class="more dbilcss3">
                        In This System
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-haze">
                    <div class="visual">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $totalParents; ?>
                        </div>
                        <div class="desc">
                            Total Parents
                        </div>
                    </div>
                    <div class="more dbilcss3"> 
                        In This System
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $totalAttendStudent; ?>
                        </div>
                        <div class="desc">
                            Attend Students
                        </div>
                    </div>
                    <div class="more dbilcss3">
                        Today attend students amount
                    </div>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
        <?php if ($this->ion_auth->is_admin()) { ?>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet solid grey-cararra bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bullhorn"></i>Class Average Attendance Percentile
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="site_activities_loading">
                                <img src="assets/admin/layout/img/loading.gif" alt="loading"/>
                            </div>
                            <div id="site_activities_content" class="display-none">
                                <div id="site_activities" class="dbilcss4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
            <div class="clearfix">
            </div>
        <?php } ?>
        <?php if ($this->ion_auth->is_student()) { ?>
            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet box green ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bars"></i><?php
                                $classTile;
                                echo $classTile;
                                ?> Full Routine.
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="alert alert-warning">
                                <div class="portlet-body">
                                    <?php
                                    foreach ($day as $row3) {
                                        $dayTitle = $row3['day_name'];
                                        $dayStatus = $row3['status'];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 dbilcss5">
                                                <div class="col-sm-2 day <?php echo $dayStatus; ?>">
                                                <?php echo $dayTitle; ?>
                                                </div>
                                                <?php
                                                //$query = array();
                                                $query = $this->common->getWhere22('class_routine', 'day_title', $dayTitle, 'class_title', $classTile);
                                                foreach ($query as $row4) {
                                                    ?>
                                                    <div class="">
                                                        <div class="col-sm-2 effect left_to_right dbilcss6">
                                                            <div class="backDiv subject">
                                                                <p class="dbilcss7"><?php echo $row4['subject']; ?></p>
                                                                <p class="dbilcss7"><?php echo $row4['subject_teacher']; ?></p>
                                                                <p class="dbilcss8"><?php echo $row4['start_time']; ?> - <?php echo $row4['end_time']; ?></p>
                                                                <p class="dbilcss8">Rome: <?php echo $row4['room_number']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
        <?php } ?>
                                            </div>
                                        </div>
    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
            <?php } ?>        
        <div class="row ">
<?php if ($this->ion_auth->is_admin()) { ?>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet purple box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Class Short Information
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                                <a class="config" data-toggle="modal" href="#portlet-config">
                                </a>
                                <a class="reload" href="javascript:;">
                                </a>
                                <a class="remove" href="javascript:;">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="scroller dbilcss9" data-always-visible="1" data-rail-visible="0">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Class Name
                                                </th>
                                                <th>
                                                    Student Amount
                                                </th>
                                                <th>
                                                    Daily Attendance %
                                                </th>
                                                <th>
                                                    Yearly Attendance %
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($classInfo as $row) {
                                                ?>
                                                <tr>
                                                    <td>
        <?php echo $i; ?>
                                                    </td>
                                                    <td>
        <?php echo $row['class_title']; ?>
                                                    </td>
                                                    <td>
        <?php echo $row['student_amount']; ?>
                                                    </td>
                                                    <td>
        <?php echo $row['attendance_percentices_daily']; ?>%
                                                    </td>
                                                    <td>
        <?php echo $row['attend_percentise_yearly']; ?>%
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="scroller-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="index.php?module=sclass&view=allClass">See Full Information</a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
            <div class="col-md-6 col-sm-6">
                <div class="portlet box green-haze tasks-widget">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-envelope-o"></i>Massage Box
                        </div>
                        <div class="tools">
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="task-content">
                            <div class="scroller dbilcss10" data-always-visible="1" data-rail-visible1="1">
                                <ul class="feeds">
                                    <?php
                                    foreach ($massage as $row) {
                                        $userId = $row['sender_id'];
                                        $query = $this->common->getWhere('users', 'id', $userId);
                                        foreach ($query as $row1) {
                                            $senderName = $row1['username'];
                                        }
                                        ?>
                                        <li class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                        ?>">
                                            <a href="index.php?module=message&view=readMassage&id=<?php echo $row['id']; ?>">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                From : <?php echo $senderName; ?> 
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                Subject : <?php echo $row['subject']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date">
    <?php echo date('h.mA - d/m/Y', $row['date']); ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
<?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="task-footer">
                            <div class="btn-arrow-link pull-right">
                                <a href="index.php?module=message&view=inbox">Show All Massage</a>
                                <i class="icon-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php if ($this->ion_auth->is_student() || $this->ion_auth->is_parents() || $this->ion_auth->is_teacher()) { ?>
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet green box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bell-o"></i>Notice Board
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                                <a class="reload" href="javascript:;">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="task-content">
                                <div class="scroller dbilcss11" data-always-visible="1" data-rail-visible1="1">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Subject
                                                </th>
                                                <th>
                                                    Massage
                                                </th>
                                                <th>
                                                    Notice Follower
                                                </th>
                                                <th>
                                                    View Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php foreach ($notice as $row) { ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <?php echo $row['date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['subject']; ?>
                                                    </td>
                                                    <td>
        <?php echo $row['notice']; ?>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success dbilcss2"> <?php echo $row['receiver']; ?> </span>
                                                    </td>
                                                    <td>
                                                        <a href="index.php?module=notice&view=noticeDetails&dfgdfg_hid=<?php echo $row['id']; ?>" class="btn btn-xs green"> <i class="fa fa-paper-plane-o"></i> View Details </a>
                                                    </td>
                                                </tr>
    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="task-footer">
                                    <div class="btn-arrow-link pull-right">
                                        <a href="index.php?module=notice&view=allNotice">Show All Notice</a>
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
<?php } ?>
        </div>
        <div class="clearfix">
        </div>
        <div class="row ">

<?php if ($this->ion_auth->is_admin()) { ?>
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet box blue-madison calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Calendar
                            </div>
                        </div>
                        <div class="portlet-body light-grey">
                            <div id="calendar">
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet green box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bell-o"></i>Notice Board
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;">
                                </a>
                                <a class="reload" href="javascript:;">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="task-content">
                                <div class="scroller dbilcss1" data-always-visible="1" data-rail-visible1="1">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Subject
                                                </th>
                                                <th>
                                                    Massage
                                                </th>
                                                <th>
                                                    Notice Follower
                                                </th>
                                                <th>
                                                    View Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php foreach ($notice as $row) { ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <?php echo $row['date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['subject']; ?>
                                                    </td>
                                                    <td>
        <?php echo $row['notice']; ?>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success dbilcss2"> <?php echo $row['receiver']; ?> </span>
                                                    </td>
                                                    <td>
                                                        <a href="index.php?module=notice&view=noticeDetails&dfgdfg_hid=<?php echo $row['id']; ?>" class="btn btn-xs green"> <i class="fa fa-paper-plane-o"></i> View Details </a>
                                                    </td>
                                                </tr>
    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="task-footer">
                                    <div class="btn-arrow-link pull-right">
                                        <a href="index.php?module=notice&view=allNotice">Show All Notice</a>
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
<?php } ?>
<?php if ($this->ion_auth->is_student() || $this->ion_auth->is_parents() || $this->ion_auth->is_teacher()) { ?>
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet box blue-madison calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Calendar
                            </div>
                        </div>
                        <div class="portlet-body light-grey">
                            <div id="calendar">
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
<?php } ?>
        </div>
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>

<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    jQuery(document).ready(function() {
        Index.init();
        Index.initDashboardDaterange();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        //Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Index.initIntro();
        Tasks.initDashboardWidget();
    });

    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));

        if (!jQuery.plot) {
            return;
        }

        function showChartTooltip(x, y, xValue, yValue) {
            $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff'
            }).appendTo("body").fadeIn(200);
        }

        var data = [];
        var totalPoints = 250;

        if ($('#site_activities').size() !== 0) {
            //site activities
            var previousPoint2 = null;
            $('#site_activities_loading').hide();
            $('#site_activities_content').show();
            var data1 = [
<?php
foreach ($classAttendance as $cap) {
    echo "['" . $cap['class_title'] . "', " . $cap['attendance_percentices_daily'] . "],";
}
?>
            ];


            var plot_statistics = $.plot($("#site_activities"),
                    [{
                            data: data1,
                            lines: {
                                fill: 0.4,
                                lineWidth: 0
                            },
                            color: ['#BAD9F5']
                        }, {
                            data: data1,
                            points: {
                                show: true,
                                fill: true,
                                radius: 4,
                                fillColor: "#9ACAE6",
                                lineWidth: 2
                            },
                            color: '#9ACAE6',
                            shadowSize: 1
                        }, {
                            data: data1,
                            lines: {
                                show: true,
                                fill: false,
                                lineWidth: 3
                            },
                            color: '#9ACAE6',
                            shadowSize: 0
                        }],
                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 8,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

            $("#site_activities").bind("plothover", function(event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint2 !== item.dataIndex) {
                        previousPoint2 = item.dataIndex;
                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                        showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' %');
                    }
                }
            });
        }

    });
</script>