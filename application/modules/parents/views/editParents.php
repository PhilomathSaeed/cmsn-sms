<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Edit Parents Informations<small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>Home
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>Parents
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>Make Parents ID
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
                            <i class="fa fa-bars"></i> Give Parents Profile Editable Information.
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?php
                        $u_id = $_GET['UcsHeRnHdtfgrfGshId'];
                        $P_I_Id = $_GET['pdfdsfAjhgdfrRdfeNdsfdtSjdcfgdInfOdfgdfhIdnfd'];
                        ?>
                        <form class="form-horizontal" role="form" action="index.php?module=parents&view=editParentsInfo&pdfdsfAjhgdfrRdfeNdsfdtSjdcfgdInfOdfgdfhIdnfd=<?php echo $P_I_Id; ?>&UcsHeRnHdtfgrfGshId=<?php echo $u_id; ?>" method="POST">
                            <div class="form-body">
                                <?php
                                foreach ($info as $row) {
                                    $userId = $row['user_id'];
                                    $data = array();
                                    $query = $this->db->get_where('users', array('id' => $userId));
                                    foreach ($query->result_array() as $row1) {
                                        $firstName = $row1['first_name'];
                                        $last_name = $row1['last_name'];
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class Title<span class="requiredStar">  </span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Class Title" name="class_title" value="<?php echo $row['student_class']; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Student ID <span class="requiredStar">  </span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Class Title" name="class_title" value="<?php echo $row['student_id']; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div id="ajaxResult">

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Guardian First Name <span class="requiredStar">  </span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="First Name" value="<?php echo $firstName; ?>" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Guardian Last Name <span class="requiredStar">  </span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $last_name; ?>"  name="last_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Relation <span class="requiredStar">  </span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" value="<?php echo $row['relation']; ?>"  name="guardianRelation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">E-mail <span class="requiredStar">  </span></label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" placeholder="demo@demo.com" value="<?php echo $row['email']; ?>"  name="email">
                                            <span class="help-block">You can "Log In" into this system by this E-mail.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone Number <span class="requiredStar">  </span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" value="<?php echo $row['phone']; ?>"  name="phone" >
                                            <span class="help-block">
                                                01600-000000
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green" name="submit" value="Submit">Submit</button>
                                    <button type="reset" class="btn default" onclick="location.href = 'javascript:history.back()'">Go Back</button>
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
    jQuery(document).ready(function() {
        //here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>

