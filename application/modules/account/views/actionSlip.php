<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Student's Transactions Slip<small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Account
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Student Transection
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
                            Give the information for transection.
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php foreach ($slips as $row) { ?>
                            <div class="form-body textAlignCenter">
                                <h1>School Name Here</h1>
                                <h3>Class Title : <?php echo $row['class_title']; ?></h3>
                                <p>
                                    <strong> Student Name : <?php echo $row['student_name']; ?></strong><br>
                                    Student ID : <?php echo $row['student_id']; ?><br>
                                    Date :  <?php echo date("d/m/Y", $row['date']) ?>
                                </p>
                                Transection Slip Number : &nbsp;<strong><?php echo $row['slip_number']; ?></strong>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green-haze actionSlipBorder">

                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        SL.
                                                    </th>
                                                    <th>
                                                        Account Title
                                                    </th>
                                                    <th class="textAlignCenter">
                                                        Amount Tk.
                                                    </th>
                                                    <th>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($slipTrangaction as $row1) {
                                                    ?>
                                                    <tr>
                                                        <td>
    <?php echo $i; ?>
                                                        </td>
                                                        <td>
    <?php echo $row1['title']; ?>
                                                        </td>
                                                        <td class="textAlignCenter">
    <?php echo $row1['totalAmount']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="index.php?module=account&view=editSlip&id=<?php echo $row1['id']; ?>" class="btn btn-xs default"> <i class="fa fa-pencil-square-o"></i> Edit </a>
                                                            <a href="index.php?module=account&view=deletSlipItem&id=<?php echo $row1['id']; ?>&slipId=<?php echo $_GET['slipId']; ?>" onclick="javascript:return confirm('Are you sure you want to delete this item from this slip ?')" class="btn btn-xs red"> <i class="fa fa-trash-o"></i> Delete </a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button onclick="location.href = 'javascript:history.back()'" class="btn green">Go Back</button>
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
<script>
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>
