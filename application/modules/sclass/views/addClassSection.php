<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content contentHeight">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Add Class And Sections <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Class
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Add Class
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
                            <i class="fa fa-bars"></i> Add New Class,Section And Group. 
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" method="post" action="index.php?module=sclass&view=addClass">
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Class Title <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Class 1,Class 2,... or Class One,... or Nursery etc." name="class_title" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Class Group <span class="requiredStar"> </span></label>
                                    <div class="col-md-6">
                                        <div id="div_scents">
                                            <input type="text" name="group" class="form-control classGroupInput" placeholder="Group title here">
                                        </div>
                                        <button id="addGroup" class="btn green-meadow floatRight" type="button">Add Group</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Class Section <span class="requiredStar">  </span></label>
                                    <div class="col-md-6">
                                        <div id="section_div">
                                            <input type="text" name="section" class="form-control classGroupInput" placeholder="">
                                        </div>
                                        <button id="addSection" class="btn green-meadow floatRight" type="button">Add Section</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Students Capacity in a section <span class="requiredStar"> * </span></label>
                                    <div class="col-md-6">
                                        <select name="capicity" class="form-control" required>
                                            <option value="">Select any one....</option>
                                            <option value="10">10 Students</option>
                                            <option value="20">20 Students</option>
                                            <option value="30">30 Students</option>
                                            <option value="40">40 Students</option>
                                            <option value="50">50 Students</option>
                                            <option value="60">60 Students</option>
                                            <option value="70">70 Students</option>
                                            <option value="80">80 Students</option>
                                            <option value="90">90 Students</option>
                                            <option value="100">100 Students</option>
                                            <option value="150">150 Students</option>
                                            <option value="200">200 Students</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" name="submit" class="btn green" value="Add Class">Add Class</button>
                                    <button type="reset" class="btn default">Refresh</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>


    </div>
</div>
<!-- END CONTENT -->
<script>
    $(function() {
        var maxFild = 3;
        var scntDiv = $('#div_scents');
        var i = $('#div_scents').size() + 1;

        var x = 1;
        $('#addGroup').live('click', function() {
            if (x < maxFild) {
                x++;
                $('<div id="remove" class="addGroupMarginBottom"><input type="text" name="group_' + i + '" class="form-control" placeholder="Group title here"> <a href="#" id="remGroup">Remove</a></div>').appendTo(scntDiv);
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

<script>
    $(function() {
        var maxFild = 5;
        var scntDiv = $('#section_div');
        var i = $('#section_div').size() + 1;

        var x = 1;
        $('#addSection').live('click', function() {
            if (x < maxFild) {
                x++;
                $('<div id="remove2" class="addGroupMarginBottom"><input type="text" name="section_' + i + '" class="form-control" placeholder="Group title here"> <a href="#" id="remSection">Remove</a></div>').appendTo(scntDiv);
                i++;
                return false;
            }
        });

        $('#remSection').live('click', function() {
            if (i > 2) {
                $(this).parents('#remove2').remove();
                i--;
                x--;
            }
            return false;
        });
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
