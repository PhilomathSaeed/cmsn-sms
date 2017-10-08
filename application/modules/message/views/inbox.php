<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
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
                    Inbox <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Message
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Inbox
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
                            Employ Information
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Massage
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($massage as $row) {
                                    $userId = $row['sender_id'];
                                    $query = $this->common->getWhere('users', 'id', $userId);
                                    foreach ($query as $row1) {
                                        $senderName = $row1['username'];
                                    }
                                    ?>
                                    <tr>
                                        <td class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                        ?>">
                                        <?php echo $senderName; ?>
                                        </td>
                                        <td class="<?php
                                                if ($row['read_unread'] == 0) {
                                                    echo 'unreadMassage';
                                                }
                                                ?>">
                                            <?php echo $row['subject']; ?>
                                        </td>
                                        <td class="<?php
                                        if ($row['read_unread'] == 0) {
                                            echo 'unreadMassage';
                                        }
                                            ?>">
    <?php echo $row['message']; ?>
                                        </td>
                                        <td class="<?php
                                            if ($row['read_unread'] == 0) {
                                                echo 'unreadMassage';
                                            }
                                            ?>">
                                    <?php echo date('h.mA - d/m/Y', $row['date']); ?>
                                        </td>
                                        <td class="<?php
                                    if ($row['read_unread'] == 0) {
                                        echo 'unreadMassage';
                                    }
                                    ?>">
                                            <a class="btn btn-xs green" href="index.php?module=message&view=readMassage&id=<?php echo $row['id']; ?>"> <i class="fa fa-paper-plane-o"></i> View Details </a>
                                            <a class="btn btn-xs red" href="index.php?module=message&view=deleteMassage&id=<?php echo $row['id']; ?>"onclick="javascript:return confirm('Are you sure you want to delete this massage from your inbox. ?')"> <i class="fa fa-trash-o"></i> Delete </a>
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
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
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
