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
                    All Book <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Library
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        All Book
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
                            Books Informations are here. 
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Book Title
                                    </th>
                                    <th>
                                        Authors
                                    </th>
                                    <th>
                                        Edition
                                    </th>
                                    <th>
                                        Pages
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <?php if ($this->ion_auth->is_admin()) { ?>
                                        <th>
                                            Book Up-loader
                                        </th>

                                        <th>
                                            &nbsp;
                                        </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allBook as $book) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $book['books_title']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['authore']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['edition']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['pages']; ?> 
                                        </td>
                                        <td>
                                            <?php echo $book['description']; ?> 
                                        </td>
                                        <?php if ($this->ion_auth->is_admin()) { ?>
                                            <td>
                                                <?php echo $book['uploderTitle']; ?> 
                                            </td>
                                            <td>
                                                <a class="btn btn-xs default" href="index.php?module=library&view=editBook&id=<?php echo $book['id']; ?>"> <i class="fa fa-pencil-square-o"></i> Edit </a>
                                                <a class="btn btn-xs red" href="index.php?module=library&view=deleteBook&id=<?php echo $book['id']; ?>" onclick="javascript:return confirm('Are you sure you want to delete this book ?')"> <i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        <?php } ?>

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

