<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <?php
        foreach ($examInfo as $row) {
            $examID = $row['id'];
            $examTitle = $row['exam_title'];
            $startDate = $row['start_date'];
        }
        ?>
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bars"></i> Make <?php echo $examTitle; ?>'s Routine
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="index.php?module=examination&view=completExamRoutin" method="POST">
                            <div class="form-body">
<?php if (!empty($successMessage)) {
    echo $successMessage;
} ?> 
                                <div class="alert alert-info">
                                    <div class="form-group">
                                        <div id="div_scents">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <input type="hidden" class="form-control" value="<?php echo $examID; ?>" name="examId">
                                                    <h3 class="arpl">Exam 1</h3>
                                                    <input type="hidden" class="form-control" name="examSunjectFild" value="run">
                                                    <div class="col-md-2 classGroupInput">
                                                        <input type="text" class="form-control" placeholder="DD-MM-YYYY" value="<?php echo $startDate; ?>" name="examDate" readonly="" required="">
                                                    </div>
                                                    <div class="col-md-2 classGroupInput">
                                                        <select class="form-control" name="day" required="">
                                                            <option>Select Day</option>
<?php foreach ($weeklyDay as $row2) { ?>
                                                                <option class="<?php echo $row2['status']; ?>" value="<?php echo $row2['day_name']; ?>"><?php echo $row2['day_name']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 classGroupInput">
                                                        <select class="form-control" name="subject" required="">
                                                            <option>Select Subject</option>
<?php foreach ($subject as $row1) { ?>
                                                                <option value="<?php echo $row1['subject_title']; ?>"><?php echo $row1['subject_title']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 classGroupInput">
                                                        <input type="text" class="form-control" placeholder="Subject Code" name="subjectCode" required="">
                                                    </div>
                                                    <div class="col-md-2 classGroupInput">
                                                        <input type="text" class="form-control" placeholder="Rome No is here.." name="romeNo" required="">
                                                    </div>
                                                    <div class="col-md-2 classGroupInput">
                                                        <input type="text" class="form-control" placeholder="Start Time" name="starTima" required="">
                                                    </div>
                                                    <div class="col-md-2 classGroupInput">
                                                        <input type="text" class="form-control" placeholder="End Time" name="endTima" required="">
                                                    </div>
                                                    <div class="col-md-2 classGroupInput">
                                                        <select class="form-control" name="examShift">
                                                            <option>Select Shift</option>
                                                            <option>Morning shift</option>
                                                            <option>Evening shift</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="addRoutineSubject col-md-12">
                                        <a id="addGroup" class="floatRight" class="btn green">
                                            <i class="fa fa-plus"></i> Add Subject 
                                        </a>
                                    </div><div class="clearfix"> </div>
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



<script>
    $(function() {
        var maxFild = 15;
        var scntDiv = $('#div_scents');
        var i = $('#div_scents').size() + 1;

        var x = 1;
        $('#addGroup').live('click', function() {
            if (x < maxFild) {
                x++;
                $('<div id="remove" class="classGroupInput" ><hr><h3 class="arpl">Exam ' + i + '</h3><input type="hidden" class="form-control" name="examSunjectFild_' + i + '" value="run"><div class="row"><div class="col-md-12"><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="DD-MM-YYYY" name="examDate_' + i + '" required=""></div>\n\<div class="col-md-2 classGroupInput"><select class="form-control" name="day_' + i + '"><option>Select Day</option><?php foreach ($weeklyDay as $row2) { ?><option class="<?php echo $row2['status']; ?>"  value="<?php echo $row2["day_name"]; ?>"><?php echo $row2["day_name"]; ?></option><?php } ?></select></div><div class="col-md-2 classGroupInput"><select class="form-control" name="subject_' + i + '"><option>Select Subject</option><?php foreach ($subject as $row1) { ?><option value="<?php echo $row1["subject_title"]; ?>"><?php echo $row1["subject_title"]; ?></option><?php } ?></select></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="Subject Code" name="subjectCode_' + i + '" required=""></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="Rome No is here.." name="romeNo_' + i + '" required=""></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="Start Time" name="starTima_' + i + '" required=""></div><div class="col-md-2 classGroupInput"><input type="text" class="form-control" placeholder="End Time" name="endTima_' + i + '" required=""></div><div class="col-md-2 classGroupInput"><select class="form-control" name="examShift_' + i + '"><option>Select Shift</option><option>Morning shift</option><option>Evening shift</option></select></div></div></div><a href="#" id="remGroup" class="arplremove">Remove</a></div>').appendTo(scntDiv);
                i++;
                return false;
            }
        });

        $('#remGroup').live('click', function() {
            if (i > 2) {
                $(this).parents('#remove').remove();
                i--;
                x--;
            }
            return false;
        });
    });
</script>
