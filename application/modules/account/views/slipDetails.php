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
            <div class="col-md-12" >

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
                    <div class="portlet-body form" id="print">
                        <div class="col-md-12 btn-group floatRight">
                            <button class="btn green-meadow  prin-link" onclick="jQuery('#print').print()" type="button"><i class="fa fa-print"></i> Print</button>
                        </div>
                        <?php foreach ($slips as $row) { ?>
                            <div class="form-body textAlignCenter">
                                <h1><?php echo $schoolName; ?></h1>
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
                                                        Amount <i class="<?php echo $currency; ?>"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($slipTrangaction as $row1) { ?>
                                                    <tr>
                                                        <td>
    <?php echo $i; ?>
                                                        </td>
                                                        <td>
    <?php echo $row1['title']; ?>
                                                        </td>
                                                        <td class="textAlignCenter">
    <?php echo $row1['totalAmount']; ?>  &nbsp; <i class="<?php echo $currency; ?>"></i>
                                                        </td>
                                                    </tr>
    <?php $i++;
} ?>
                                                <tr>
                                                    <td colspan="2" class="totalBalencetd">
                                                        Total Balance
                                                    </td>
                                                    <td class="totalBalenceamount">
<?php echo $totalAmount; ?>   &nbsp; <i class="<?php echo $currency; ?>"></i>
                                                    </td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button class="btn green" onclick="location.href = 'index.php?module=account&view=slipAction&slipId=<?php echo $row['slip_number']; ?>'">Action</button>
                                <button class="btn default" onclick="location.href = 'javascript:history.back()'">Go Back</button>
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
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

