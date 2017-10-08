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
                    Parents Information <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Parents
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Parents Information
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
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green-haze">
                    <div class="portlet-title">
                        <div class="caption">
                            <?php echo $classTitle; ?> Student Parents Information
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Student Id
                                    </th>
                                    <th>
                                        Guardian Name
                                    </th>
                                    <th>
                                        Relation
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        profile Picture
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($parents as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['student_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['parents_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['relation']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['phone']; ?>
                                        </td>
                                        <td>
                                            <div class="tableImage">
                                                <?php
                                                $userId = $row['user_id'];
                                                $data = array();
                                                $query = $this->db->get_where('users', array('id' => $userId));
                                                foreach ($query->result_array() as $row1) {
                                                    ?>
                                                    <img src="assets/uploads/gurdiant/<?php echo $row1['profile_image']; ?>" alt="">
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs default" href="index.php?module=parents&view=editParentsInfo&pdfdsfAjhgdfrRdfeNdsfdtSjdcfgdInfOdfgdfhIdnfd=<?php echo $row['id']; ?>&UcsHeRnHdtfgrfGshId=<?php echo $userId; ?>"> <i class="fa fa-pencil-square"></i> Edit </a>
                                            <a class="btn btn-xs red" href="index.php?module=parents&view=deleteParents&pdfdsfAjhgdfrRdfeNdsfdtSjdcfgdInfOdfgdfhIdnfd=<?php echo $row['id']; ?>&UcsHeRnHdtfgrfGshId=<?php echo $userId; ?>" onClick='javascript:return confirm("Are you sure you want to delete this Guardian Profile?")'> <i class="fa fa-trash-o"></i> Delete </a>
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
