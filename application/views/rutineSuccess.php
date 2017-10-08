<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
        <?php
        foreach ($examInfo as $row) {
            $examID = $row['id'];
            $examTitle = $row['exam_title'];
            $startDate = $row['start_date'];
            $class_title = $row['class_title'];
            $total_time = $row['total_time'];
        }
        ?>
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> " <?php echo $examTitle; ?> " Examination Routine For " <?php echo $class_title; ?> "
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="alert alert-warning">
                            <div class="row">
                                <div class="col-md-12 textAlignCenter">
                                    <H2><?php echo $schoolName; ?></H2>
                                    <p>
                                    <h4 class="rtsh">Exam Title: <?php echo $examTitle; ?></h4>
                                    Start Date : <?php echo $startDate; ?><br>
                                    Class : <?php echo $class_title; ?><br>
                                    Total Time : <?php echo $total_time; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Exam Routine Date And Subject
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Subject Title
                                                    </th>
                                                    <th>
                                                        Subject Code
                                                    </th>
                                                    <th>
                                                        Rome No
                                                    </th>
                                                    <th>
                                                        Start Time
                                                    </th>
                                                    <th>
                                                        End Time
                                                    </th>
                                                    <th>
                                                        Exam Shift
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                        <?php $i = 1;
                                                        foreach ($rutineInfo as $row1) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row1['exam_date']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row1['exam_subject']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row1['subject_code']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row1['rome_number']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row1['start_time']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row1['end_time']; ?>
                                                        </td>
                                                        <td>
                                                    <?php echo $row1['exam_shift']; ?>
                                                        </td>
                                                    </tr>
    <?php $i++;
} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>


        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
