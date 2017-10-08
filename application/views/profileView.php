<link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    User Profile <small></small>
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Profile
                    </li>
                    <li id="result" class="pull-right topClock"></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row profile">
            <div class="col-md-12">
                <!--BEGIN TABS-->
                <div class="tabbable tabbable-custom tabbable-full-width">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">
                                Overview </a>
                        </li>
                        <li>
                            <a href="#tab_1_3" data-toggle="tab">
                                Account </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled profile-nav">
                                        <li>
                                            <?php $user = $this->ion_auth->user()->row(); ?>
                                            <img src="assets/uploads/profilePicture/<?php echo $user->profile_image; ?>" class="img-responsive" alt=""/>

                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="portlet sale-summary">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        User Profile
                                                    </div>
                                                    <div class="tools">
                                                        <a class="reload" href="javascript:;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">

                                                    <?php
//                                                                                                            $user = $this->ion_auth->user()->row();
//                                                                                                                if($this->session->userdata('username') == $user->username){
                                                    foreach ($userprofile as $row) {
                                                        ?>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span class="sale-info">
                                                                    First Name <i class="fa fa-img-up"></i>
                                                                </span>
                                                                <span class="sale-num"><?php echo $row['first_name'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    Last Name <i class="fa fa-img-down"></i>
                                                                </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['last_name'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    User Name <i class="fa fa-img-down"></i>
                                                                </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['username'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    Mobile Number </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['phone'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    Email </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['email'] ?> </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    Short Description </span>
                                                                <span class="sale-num">
                                                                    <?php echo $row['short_description'] ?> </span>
                                                            </li>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-4-->
                                    </div>
                                    <!--end row-->



                                </div>
                            </div>
                        </div>
                        <!--tab_1_2-->
                        <div class="tab-pane" id="tab_1_3">
                            <div class="row profile-account">
                                <div class="col-md-3">
                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_1-1">
                                                <i class="fa fa-cog"></i> Edit Personal info </a>
                                            <span class="after">
                                            </span>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_2-2">
                                                <i class="fa fa-picture-o"></i> Change Picture </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_3-3">
                                                <i class="fa fa-lock"></i> Change Password </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div id="tab_1-1" class="tab-pane active">
                                            <?php foreach ($userprofile as $row1) { ?>
                                                <form role="form" action="index.php?module=home&view=profileView" method="POST">
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input name="firstName" type="text" class="form-control" value="<?php echo $row1['first_name']; ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Last Name</label>
                                                        <input name="lastName" type="text" class="form-control" value="<?php echo $row1['last_name']; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">User Name</label>
                                                        <input name="userName" type="text" class="form-control" value="<?php echo $row1['username']; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile Number</label>
                                                        <input name="mobileNumber" type="text" class="form-control" value="<?php echo $row1['phone']; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input name="email" type="text" class="form-control" value="<?php echo $row1['email']; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label"> Short Description</label>
                                                        <textarea name="description" class="form-control" rows="3"><?php echo $row1['short_description']; ?></textarea>
                                                    </div>
                                                    <div class="margiv-top-10">

                                                        <button type="submit" name="submit" class="btn green" value="Save Changes">Save Changes</button>
                                                        <button type="reset" class="btn default">Cancel</button>
                                                    </div>
                                                </form>
                                            <?php } ?>
                                        </div>
                                        <div id="tab_2-2" class="tab-pane">

                                            <?php
                                            $form_attributs = array('class' => 'form-horizontal', 'role' => 'form');
                                            echo form_open_multipart('module=home&view=profileImage', $form_attributs);
                                            ?>
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail uploadImagePreview">
                                                        <img src="assets/uploads/profilePicture/<?php echo $user->profile_image; ?>" alt=""/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail uploadImagePreview">
                                                    </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new">
                                                                Select image </span>
                                                            <span class="fileinput-exists">
                                                                Change </span>
                                                            <input type="file" name="userfile">
                                                        </span>
                                                        <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                            Remove </a>
                                                    </div>
                                                </div>
                                                <!--														<div class="clearfix margin-top-10">
                                                                                                                                                                        <span class="label label-danger">
                                                                                                                                                                        NOTE! </span>
                                                                                                                                                                        <span>
                                                                                                                                                                        Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                                                                                                                                </div>-->
                                            </div>
                                            <div class="margiv-top-10">

                                                <button type="submit" name="submit" class="btn green">Change Picture</button>
                                                <button type="reset" class="btn default">Cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                        <div id="tab_3-3" class="tab-pane">
                                            <form action="index.php?module=auth&view=change_password" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label">Current Password</label>
                                                    <input type="password" class="form-control" name="old"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" class="form-control" name="new"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Re-type New Password</label>
                                                    <input type="password" class="form-control" name="new_confirm"/>
                                                </div>
                                                <div class="margiv-top-10">								
                                                    <button type="submit" name="submit" class="btn green">Save Changes</button>
                                                    <button type="reset" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <!--end col-md-9-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--END TABS-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<script>
    jQuery(document).ready(function() {
//here is auto reload after 1 second for time and date in the top
        jQuery(setInterval(function() {
            jQuery("#result").load("index.php?module=home&view=iceTime");
        }, 1000));
    });
</script>

