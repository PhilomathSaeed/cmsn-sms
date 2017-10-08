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
                    Teacher's Information <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Teachers
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Teacher's Information
                    </li>
                    <li id="result" class="pull-right topClock"></li>

                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <!--Start button bar-->
        <div class="row">
            <div class="col-md-12 addTeacher">
                <a class="btn green floatRight" href="index.php?module=users&view=addTeacher">
                    <i class="fa fa-plus"></i> Add New Teacher
                </a>
            </div>
        </div>
        <!--End button bar-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green-haze">
                    <div class="portlet-title">
                        <div class="caption">
                            Teachers Information
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        ID No
                                    </th>
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Teacher's Name
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teacher as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <div class="tableImage">
                                                <img src="assets/uploads/teachersPicture/<?php echo $row['teachers_photo']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $row['fullname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['present_address']; ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm label-success"><?php echo $row['position']; ?></span>

                                        </td>
                                        <td>
                                            <a class="btn btn-xs green" href="index.php?module=teachers&view=teacherDetails&id=<?php echo $row['id']; ?>&uid=<?php echo $row['user_id']; ?>&photo=<?php echo $row['teachers_photo']; ?>"> <i class="fa fa-file-text-o"></i> Details </a>
                                            <?php if ($this->ion_auth->is_admin()) { ?>
                                                <a class="btn btn-xs default" href="index.php?module=teachers&view=edit_teacher&id=<?php echo $row['id']; ?>&uid=<?php echo $row['user_id']; ?>"> <i class="fa fa-pencil-square"></i> Edit </a>
                                                <a class="btn btn-xs red" href="index.php?module=teachers&view=teacherDelete&id=<?php echo $row['id']; ?>&uid=<?php echo $row['user_id']; ?>"  onClick='javascript:return confirm("Are you sure you want to delete this teacher?")'> <i class="fa fa-trash-o"></i> Delete </a>
                                            <?php } ?>
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
<script>
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>