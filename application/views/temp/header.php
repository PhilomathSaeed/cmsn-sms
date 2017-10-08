<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Welcom TO School Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <base href="http://localhost:8012/SMS/">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/global/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
        <script src="assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-quick-sidebar-over-content page-header-fixed-mobile page-footer-fixed1">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="assets/admin/layout/img/smlogo.png" alt="logo" class="logo-default"/>
                    </a>
                    <div class="menu-toggler sidebar-toggler hide">
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                </a>
                <!-- End RESPONSIVE MENU TOGGLER -->
                <?php $user = $this->ion_auth->user()->row(); ?>
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN INBOX DROPDOWN -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default">
                                    <?php
                                    $id = $user->id;
                                    $data = array();
                                    $query = $this->db->get_where('massage', array('receiver_id' => $id, 'read_unread' => 0));
                                    foreach ($query->result_array() as $row) {
                                        $data[] = $row;
                                    }$unreadMassage = $data;
                                    $urmAmount = count($unreadMassage);
                                    echo $urmAmount;
                                    ?> 
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <p>
                                        You have <?php echo $urmAmount; ?> new messages
                                    </p>
                                </li>

                                <li>
                                    <ul class="dropdown-menu-list scroller headerMassageDiveHeight">
                                        <?php
                                        foreach ($unreadMassage as $urm) {
                                            $userId = $urm['sender_id'];
                                            $query = $this->common->getWhere('users', 'id', $userId);
                                            foreach ($query as $row1) {
                                                $senderName = $row1['username'];
                                                $senderImage = $row1['profile_image'];
                                            }
                                            ?>
                                            <li>
                                                <a href="index.php?module=message&view=readMassage&id=<?php echo $urm['id']; ?>">
                                                    <span class="photo">
                                                        <img src="assets/uploads/profilePicture/<?php echo $senderImage; ?>" alt=""/>
                                                    </span>
                                                    <span class="subject">
                                                        <span class="from">
                                                            <?php echo $senderName; ?> </span>
                                                        <span class="time">
                                                            <?php echo date('h.mA - d/m/Y', $urm['date']); ?> </span>
                                                    </span>
                                                    <span class="message">
                                                        Subject:  <?php echo $urm['subject']; ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>

                                <li class="external">
                                    <a href="inbox.html">
                                        See all messages <i class="m-icon-swapright"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->

                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                <img alt="" class="img-circle" src="assets/uploads/profilePicture/<?php echo $user->profile_image; ?>"/>
                                <span class="username">
                                    <?php echo $user->username; ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.php?module=home&view=profileView">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="index.php?module=home&view=calender">
                                        <i class="icon-calendar"></i> My Calendar </a>
                                </li>
                                <li>
                                    <a href="index.php?module=message&view=inbox">
                                        <i class="icon-envelope-open"></i> Message <span class="badge badge-danger">
                                            <?php echo $urmAmount; ?>  </span>
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="extra_lock.html">
                                        <i class="icon-lock"></i> Lock Screen </a>
                                </li>
                                <li>
                                    <a href="index.php?module=auth&view=logout">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>

        <?php
        $cont = "";
        $cont = $_GET['module'];
        $view = "";
        $view = $_GET['view'];
        $s = "start";
        $a = "active";
        $o = "open";
        $dashbord = "";
        $admission = "";
        $suggetions = "";
        $selectClassSuggestion = "";
        $addSuggetions = "";
        $ad_sub = "";
        $allStudent = "";
        $student = "";
        $teachersInfromation = "";
        $teachers = "";
        $note = "";
        $addNote = "";
        $seclectClassNote = "";
        $addTeachers = "";
        $notice = "";
        $Parents = "";
        $selectParents = "";
        $makeParents = "";
        $class = "";
        $addClass = "";
        $allClass = "";
        $subject = "";
        $addSubject = "";
        $attendanse = "";
        $exam = "";
        $addExame = "";
        $exameAttendence = "";
        $exameGread = "";
        $pament = "";
        $pamentCollection = "";
        $paymentList = "";
        $library = "";
        $addBookCategory = "";
        $allBookCategory = "";
        $addBook = "";
        $allBook = "";
        $addSubject = "";
        $addClassRoutine = "";
        $classRoutine = "";
        $Marksheet = "";
        $transport = "";
        $addTransport = "";
        $allTransport = "";
        $allSubject = "";
        $makingResilt = "";
        $account = "";
        $addAccount = "";
        $studentTranjection = "";
        $message = "";
        $sendMessage = "";
        $inbox = "";
        $expenceReport = "";
        $incomeReport = "";
        $report = "";
        $balanseSheet = "";
        $configuration = "";
        $weeklyDay = "";
        $attendansePreviw = "";
        $allExame = "";
        $allExamRutine = "";
        $viewAttendence = "";
        $open = "";
        $resultView = "";
        $allAccount = "";
        $allSlips = "";
        $generalSettings = "";
        $profileview = "";
        $cleander = "";


        if ($cont == "home") {
            if ($view == "index") {
                $dashbord = $s . ' ' . $a;
            }
            if ($view == "profileView") {
                $profileview = $s . ' ' . $a;
            }
            if ($view == "calender") {
                $cleander = $s . ' ' . $a;
            }
        } elseif ($cont == "users") {
            if ($view == "admission") {
                $student = $s . ' ' . $a;
                $admission = $a;
            }
            if ($view == "addTeacher") {
                $teachers = $s . ' ' . $a;
                $addTeachers = $a;
            }
            if ($view == "addParents") {
                $Parents = $s . ' ' . $a;
                $makeParents = $a;
            }
        } elseif ($cont == "sclass") {
            if ($view == "addClass") {
                $class = $s . ' ' . $a;
                $addClass = $a;
            }
            if ($view == "allClass") {
                $class = $s . ' ' . $a;
                $allClass = $a;
            }
            if ($view == "classDetails") {
                $class = $s . ' ' . $a;
                $allClass = $a;
            }
            if ($view == "selectClassRoutin") {
                $class = $s . ' ' . $a;
                $addClassRoutine = $a;
            }
            if ($view == "addClassRoutin") {
                $class = $s . ' ' . $a;
                $addClassRoutine = $a;
            }
            if ($view == "selectAllRoutine") {
                $class = $s . ' ' . $a;
                $classRoutine = $a;
            }
            if ($view == "allClassRoutine") {
                $class = $s . ' ' . $a;
                $classRoutine = $a;
            }
            if ($view == "editRoutine") {
                $class = $s . ' ' . $a;
                $classRoutine = $a;
            }
        } elseif ($cont == "subjects") {
            if ($view == "addSubject") {
                $subject = $s . ' ' . $a;
                $addSubject = $a;
            }
            if ($view == "allSubject") {
                $subject = $s . ' ' . $a;
                $allSubject = $a;
            }
            if ($view == "classSubjectDetails") {
                $subject = $s . ' ' . $a;
                $allSubject = $a;
            }
        } elseif ($cont == "teachers") {
            if ($view == "allTeachers") {
                $teachers = $s . ' ' . $a;
                $teachersInfromation = $a;
            }
            if ($view == "teacherDetails") {
                $teachers = $s . ' ' . $a;
                $teachersInfromation = $a;
            }
            if ($view == "edit_teacher") {
                $teachers = $s . ' ' . $a;
                $teachersInfromation = $a;
            }
        } elseif ($cont == "students") {
            if ($view == "allStudent") {
                $student = $s . ' ' . $a;
                $allStudent = $a;
            }
            if ($view == "students_details") {
                $student = $s . ' ' . $a;
                $allStudent = $a;
            }
            if ($view == "editStudent") {
                $student = $s . ' ' . $a;
                $allStudent = $a;
            }
        } elseif ($cont == "dailyAttendance") {
            if ($view == "selectClassAttendance") {
                $attendanse = $a;
            }
            if ($view == "attendance") {
                $attendanse = $a;
            }
            if ($view == "attendanceCompleteMessage") {
                $attendanse = $a;
            }
            if ($view == "selectAttendancePreview") {
                $attendansePreviw = $a;
            }
            if ($view == "attendencePreview") {
                $attendansePreviw = $a;
            }
            if ($view == "viewExamAttendance") {
                $attendansePreviw = $a;
            }
            if ($view == "attendanceEditCompleteMessage") {
                $attendansePreviw = $a;
            }
        } elseif ($cont == "notice") {
            if ($view == "allNotice") {
                $notice = $s . ' ' . $a;
            }
            if ($view == "addNotice") {
                $notice = $s . ' ' . $a;
            }
            if ($view == "noticeDetails") {
                $notice = $s . ' ' . $a;
            }
        } elseif ($cont == "parents") {
            if ($view == "parentsInformation") {
                $Parents = $s . ' ' . $a;
                $selectParents = $a;
            }
            if ($view == "editParentsInfo") {
                $Parents = $s . ' ' . $a;
                $selectParents = $a;
            }
        } elseif ($cont == "examination") {
            if ($view == "examGread") {
                $exam = $s . ' ' . $a;
                $exameGread = $a;
            }
            if ($view == "addExamGread") {
                $exam = $s . ' ' . $a;
                $exameGread = $a;
            }
            if ($view == "addExam") {
                $exam = $s . ' ' . $a;
                $addExame = $a;
            }
            if ($view == "completExamRoutin") {
                $exam = $s . ' ' . $a;
                $addExame = $a;
            }
            if ($view == "allExamRutine") {
                $exam = $s . ' ' . $a;
                $allExamRutine = $a;
            }
            if ($view == "routinView") {
                $exam = $s . ' ' . $a;
                $allExamRutine = $a;
            }
            if ($view == "selectExamAttendance") {
                $exam = $s . ' ' . $a;
                $exameAttendence = $a;
            }
            if ($view == "examAttendance") {
                $exam = $s . ' ' . $a;
                $exameAttendence = $a;
            }
            if ($view == "viewExamAttendance") {
                $exam = $s . ' ' . $a;
                $viewAttendence = $a;
            }
            if ($view == "editExamAttendance") {
                $exam = $s . ' ' . $a;
                $viewAttendence = $a;
            }
            if ($view == "makingResult") {
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            }
            if ($view == "completeResult") {
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            }
            if ($view == "aproveShitView") {
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            }
            if ($view == "checkResultShit") {
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            }
            if ($view == "selectResult") {
                $exam = $s . ' ' . $a;
                $resultView = $a;
                $open = $o;
            }
            if ($view == "fullResult") {
                $exam = $s . ' ' . $a;
                $resultView = $a;
                $open = $o;
            }
            if ($view == "selectClassMarksheet") {
                $exam = $s . ' ' . $a;
                $Marksheet = $a;
                $open = $o;
            }
        } elseif ($cont == "library") {
            if ($view == "addBookCategory") {
                $library = $s . ' ' . $a;
                $addBookCategory = $a;
            }
            if ($view == "allBooksCategory") {
                $library = $s . ' ' . $a;
                $allBookCategory = $a;
            }
            if ($view == "editCategory") {
                $library = $s . ' ' . $a;
                $allBookCategory = $a;
            }
            if ($view == "addBook") {
                $library = $s . ' ' . $a;
                $addBook = $a;
            }
            if ($view == "allBook") {
                $library = $s . ' ' . $a;
                $allBook = $a;
            }
        } elseif ($cont == "transport") {
            if ($view == "addTransport") {
                $transport = $s . ' ' . $a;
                $addTransport = $a;
            }
            if ($view == "allTransport") {
                $transport = $s . ' ' . $a;
                $allTransport = $a;
            }
            if ($view == "editTransport") {
                $transport = $s . ' ' . $a;
                $allTransport = $a;
            }
        } elseif ($cont == "account") {
            if ($view == "addAccountTitle") {
                $account = $s . ' ' . $a;
                $addAccount = $a;
            }
            if ($view == "allAccount") {
                $account = $s . ' ' . $a;
                $allAccount = $a;
            }
            if ($view == "editAccountInfo") {
                $account = $s . ' ' . $a;
                $allAccount = $a;
            }
            if ($view == "studentTranjection") {
                $account = $s . ' ' . $a;
                $studentTranjection = $a;
            }
            if ($view == "allSlips") {
                $account = $s . ' ' . $a;
                $allSlips = $a;
            }
            if ($view == "slipDetails") {
                $account = $s . ' ' . $a;
                $allSlips = $a;
            }
            if ($view == "editSlip") {
                $account = $s . ' ' . $a;
                $allSlips = $a;
            }
            if ($view == "deletSlipItem") {
                $account = $s . ' ' . $a;
                $allSlips = $a;
            }
            if ($view == "deletSlip") {
                $account = $s . ' ' . $a;
                $allSlips = $a;
            }
            if ($view == "slipAction") {
                $account = $s . ' ' . $a;
                $allSlips = $a;
            }
        } elseif ($cont == "message") {
            if ($view == "sendMessage") {
                $message = $s . ' ' . $a;
                $sendMessage = $a;
            }
            if ($view == "inbox") {
                $message = $s . ' ' . $a;
                $inbox = $a;
            }
        } elseif ($cont == "configuration") {
            if ($view == "conWeeklyDay") {
                $configuration = $s . ' ' . $a;
                $weeklyDay = $a;
            }
            if ($view == "generalSetting") {
                $configuration = $s . ' ' . $a;
                $generalSettings = $a;
            }
        }
        ?>

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li>
                            &nbsp;
                        </li>
                        <?php if ($this->ion_auth->is_admin()) { ?>
                            <li class="<?php echo $dashbord; ?>">
                                <a href="index.php?module=home&view=index">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="<?php echo $student; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-group"></i>
                                    <span class="title"> Students </span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $admission; ?>">
                                        <a href="index.php?module=users&view=admission">
                                            Admission</a>
                                    </li>
                                    <li class="<?php echo $allStudent; ?>">
                                        <a href="index.php?module=students&view=allStudent">
                                            Students Information </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $class; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-cubes"></i>
                                    <span class="title">Class</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $addClass; ?>">
                                        <a href="index.php?module=sclass&view=addClass">
                                            Add Class and Section</a>
                                    </li>
                                    <li class="<?php echo $allClass; ?>">
                                        <a href="index.php?module=sclass&view=allClass">
                                            All Class</a>
                                    </li>
                                    <li class="<?php echo $addClassRoutine; ?>">
                                        <a href="index.php?module=sclass&view=selectClassRoutin">
                                            Add Class Routine</a>
                                    </li>
                                    <li class="<?php echo $classRoutine; ?>">
                                        <a href="index.php?module=sclass&view=selectAllRoutine">
                                            Class Routine</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="<?php echo $teachers; ?>">
                                <a href="javascript:;">
                                    <span class="icon-users teacherLiIconSideber" aria-hidden="true"></span>
                                    <span class="title"> Teachers</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $teachersInfromation; ?>">
                                        <a href="index.php?module=teachers&view=allTeachers">
                                            Teachers Information</a>
                                    </li>
                                    <li class="<?php echo $addTeachers; ?>">
                                        <a href="index.php?module=users&view=addTeacher">
                                            Add Teacher</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $subject; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span class="title"> Subjects</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $addSubject; ?>">
                                        <a href="index.php?module=subjects&view=addSubject">
                                            Add Subject</a>
                                    </li>
                                    <li class="<?php echo $allSubject; ?>">
                                        <a href="index.php?module=subjects&view=allSubject">
                                            All Subjects</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $notice; ?>">
                                <a href="index.php?module=notice&view=allNotice">
                                    <i class="fa fa-hospital-o"></i>
                                    <span class="title">
                                        Notice Board</span>
                                </a>
                            </li>
                            <li class="<?php echo $Parents; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Parents</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $selectParents; ?>">
                                        <a href="index.php?module=parents&view=parentsInformation">
                                            Parents Information</a>
                                    </li>
                                    <li class="<?php echo $makeParents; ?>">
                                        <a href="index.php?module=users&view=addParents">
                                            Make Parents Profile</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $exam; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-table"></i>
                                    <span class="title"> Examination</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $exameGread; ?>">
                                        <a href="index.php?module=examination&view=examGread">
                                            Exam Grade
                                        </a>
                                    </li>
                                    <li class="<?php echo $addExame; ?>">
                                        <a href="index.php?module=examination&view=addExam">
                                            Add Exam And Routine
                                        </a>
                                    </li>
                                    <li class="<?php echo $allExamRutine; ?>">
                                        <a href="index.php?module=examination&view=allExamRutine">
                                            All Exam Routine
                                        </a>
                                    </li>
                                    <li class="<?php echo $viewAttendence; ?>">
                                        <a href="index.php?module=examination&view=viewExamAttendance">
                                            Exam Attendance
                                        </a>
                                    </li>
                                    <li class="<?php echo $makingResilt; ?>">
                                        <a href="index.php?module=examination&view=aproveShitView">
                                            Make Results
                                        </a>
                                    </li>
                                    <li class="<?php echo $resultView; ?>">
                                        <a href="index.php?module=examination&view=selectResult">
                                            View Results
                                        </a>
                                    </li>
                                    <li class="<?php echo $Marksheet; ?>">
                                        <a href="index.php?module=examination&view=selectClassMarksheet">
                                            Students Mark's Sheet </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $library; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-reorder"></i>
                                    <span class="title">Library</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">

                                    <li class="<?php echo $allBookCategory; ?>">
                                        <a href="index.php?module=library&view=allBooksCategory">
                                            All Books Categorty</a>
                                    </li>
                                    <li class="<?php echo $addBookCategory; ?>">
                                        <a href="index.php?module=library&view=addBookCategory">
                                            Add Category</a>
                                    </li>
                                    <li class="<?php echo $addBook; ?>">
                                        <a href="index.php?module=library&view=addBook">
                                            Add Books</a>
                                    </li>
                                    <li class="<?php echo $allBook; ?>">
                                        <a href="index.php?module=library&view=allBook">
                                            All Books</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $transport; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-truck"></i>
                                    <span class="title">Transport</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $allTransport; ?>">
                                        <a href="index.php?module=transport&view=allTransport">
                                            All Transport</a>
                                    </li>
                                    <li class="<?php echo $addTransport; ?>">
                                        <a href="index.php?module=transport&view=addTransport">
                                            Add Transport</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $account; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-share-alt"></i>
                                    <span class="title">Accounts</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $addAccount; ?>">
                                        <a href="index.php?module=account&view=addAccountTitle">
                                            Add Account</a>
                                    </li>
                                    <li class="<?php echo $allAccount; ?>">
                                        <a href="index.php?module=account&view=allAccount">
                                            All Account</a>
                                    </li>
                                    <li class="<?php echo $studentTranjection; ?>">
                                        <a href="index.php?module=account&view=studentTranjection">
                                            Students Transactions </a>
                                    </li>
                                    <li class="<?php echo $allSlips; ?>">
                                        <a href="index.php?module=account&view=allSlips">
                                            All Students Transactions Slip </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $message; ?>">
                                <a href="javascript:;">
                                    <i class="icon-envelope-open"></i>
                                    <span class="title">Message</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $sendMessage; ?>">
                                        <a href="index.php?module=message&view=sendMessage">Send Message</a>
                                    </li>
                                    <li class="<?php echo $inbox; ?>">
                                        <a href="index.php?module=message&view=inbox">Inbox</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $profileview; ?>">
                                <a href="index.php?module=home&view=profileView">
                                    <i class="fa fa-qrcode"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="<?php echo $configuration; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-graduation-cap"></i>
                                    <span class="title">Configurations</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $generalSettings; ?>">
                                        <a href="index.php?module=configuration&view=generalSetting">
                                            General Settings
                                        </a>
                                    </li>
                                    <li class="<?php echo $weeklyDay; ?>">
                                        <a href="index.php?module=configuration&view=conWeeklyDay">
                                            Weekly Day
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <?php } elseif ($this->ion_auth->is_teacher()) {
                            ?>
                            <li class="<?php echo $dashbord; ?>">
                                <a href="index.php?module=home&view=index">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="<?php echo $student; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-group"></i>
                                    <span class="title"> Students </span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $allStudent; ?>">
                                        <a href="index.php?module=students&view=allStudent">
                                            Students Information </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $class; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-cubes"></i>
                                    <span class="title">Class</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $allClass; ?>">
                                        <a href="index.php?module=sclass&view=allClass">
                                            All Class</a>
                                    </li>
                                    <li class="<?php echo $classRoutine; ?>">
                                        <a href="index.php?module=sclass&view=selectAllRoutine">
                                            Class Routine</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="<?php echo $attendanse; ?>">
                                <a href="index.php?module=dailyAttendance&view=selectClassAttendance">
                                    <i class="fa fa-check-square-o"></i>
                                    <span class="title">
                                        Take Attendance </span>
                                </a>
                            </li>
                            <li class="<?php echo $attendansePreviw; ?>">
                                <a href="index.php?module=dailyAttendance&view=selectAttendancePreview">
                                    <i class="fa fa-table"></i>
                                    <span class="title">
                                        Attendance Preview</span>
                                </a>
                            </li>
                            <li class="<?php echo $teachers; ?>">
                                <a href="index.php?module=teachers&view=allTeachers">
                                    <span class="icon-users teacherLiIconSideber" aria-hidden="true"></span>
                                    <span class="title">
                                        Teachers Information</span>
                                </a>
                            </li>

                            <li class="<?php echo $notice; ?>">
                                <a href="index.php?module=notice&view=allNotice">
                                    <i class="fa fa-hospital-o"></i>
                                    <span class="title">
                                        Notice Board</span>
                                </a>
                            </li>
                            <li class="<?php echo $Parents; ?>">
                                <a href="index.php?module=parents&view=parentsInformation">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Parents</span>
                                </a>
                            </li>
                            <li class="<?php echo $exam; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-table"></i>
                                    <span class="title"> Examination</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $exameAttendence; ?>">
                                        <a href="index.php?module=examination&view=selectExamAttendance">
                                            Take Exam Attendance
                                        </a>
                                    </li>
                                    <li class="<?php echo $viewAttendence; ?>">
                                        <a href="index.php?module=examination&view=viewExamAttendance">
                                            Exam Attendance
                                        </a>
                                    </li>
                                    <li class="<?php echo $exameGread; ?>">
                                        <a href="index.php?module=examination&view=examGread">
                                            Exam Grade
                                        </a>
                                    </li>
                                    <li class="<?php echo $makingResilt; ?>">
                                        <a href="index.php?module=examination&view=makingResult">
                                            Make Results
                                        </a>
                                    </li>
                                    <li class="<?php echo $resultView; ?>">
                                        <a href="index.php?module=examination&view=selectResult">
                                            View Results
                                        </a>
                                    </li>
                                    <li class="<?php echo $Marksheet; ?>">
                                        <a href="index.php?module=examination&view=selectClassMarksheet">
                                            Students Mark's Sheet </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $library; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-reorder"></i>
                                    <span class="title">Library</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">

                                    <li class="<?php echo $allBookCategory; ?>">
                                        <a href="index.php?module=library&view=allBooksCategory">
                                            All Books Categorty</a>
                                    </li>
                                    <li class="<?php echo $addBookCategory; ?>">
                                        <a href="index.php?module=library&view=addBookCategory">
                                            Add Category</a>
                                    </li>
                                    <li class="<?php echo $addBook; ?>">
                                        <a href="index.php?module=library&view=addBook">
                                            Add Books</a>
                                    </li>
                                    <li class="<?php echo $allBook; ?>">
                                        <a href="index.php?module=library&view=allBook">
                                            All Books</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $transport; ?>">
                                <a href="index.php?module=transport&view=allTransport">
                                    <i class="fa fa-truck"></i>
                                    <span class="title">Transport</span>
                                </a>
                            </li>
                            <li class="<?php echo $message; ?>">
                                <a href="javascript:;">
                                    <i class="icon-envelope-open"></i>
                                    <span class="title">Message</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $sendMessage; ?>">
                                        <a href="index.php?module=message&view=sendMessage">Send Message</a>
                                    </li>
                                    <li class="<?php echo $inbox; ?>">
                                        <a href="index.php?module=message&view=inbox">Inbox</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $profileview; ?>">
                                <a href="index.php?module=home&view=profileView">
                                    <i class="fa fa-qrcode"></i>
                                    Profile
                                </a>
                            </li>
                        <?php } elseif ($this->ion_auth->is_student()) {
                            ?>
                            <li class="<?php echo $dashbord; ?>">
                                <a href="index.php?module=home&view=index">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="<?php echo $allStudent; ?>">
                                <a href="index.php?module=students&view=allStudent">
                                    <i class="fa fa-hospital-o"></i>
                                    <span class="title">
                                        Students Information </span>
                                </a>
                            </li>
                            <li class="<?php echo $class; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-cubes"></i>
                                    <span class="title">Class</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $allClass; ?>">
                                        <a href="index.php?module=sclass&view=allClass">
                                            All Class</a>
                                    </li>
                                    <li class="<?php echo $classRoutine; ?>">
                                        <a href="index.php?module=sclass&view=selectAllRoutine">
                                            Class Routine</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="<?php echo $allSubject; ?>">
                                <a href="index.php?module=subjects&view=allSubject">
                                    <i class="fa fa-book"></i>
                                    <span class="title">
                                        All Subjects</span>
                                </a>
                            </li>
                            <li class="<?php echo $teachers; ?>">
                                <a href="index.php?module=teachers&view=allTeachers">
                                    <span class="icon-users teacherLiIconSideber" aria-hidden="true"></span>
                                    <span class="title">
                                        Teachers Information</span>
                                </a>
                            </li>
                            <li class="<?php echo $notice; ?>">
                                <a href="index.php?module=notice&view=allNotice">
                                    <i class="fa fa-hospital-o"></i>
                                    <span class="title">
                                        Notice Board</span>
                                </a>
                            </li>
                            <li class="<?php echo $exam; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-table"></i>
                                    <span class="title"> Examination</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $exameGread; ?>">
                                        <a href="index.php?module=examination&view=examGread">
                                            Exam Grade
                                        </a>
                                    </li>
                                    <li class="<?php echo $allExamRutine; ?>">
                                        <a href="index.php?module=examination&view=allExamRutine">
                                            All Exam Routine
                                        </a>
                                    </li>
                                    <li class="<?php echo $resultView; ?>">
                                        <a href="index.php?module=examination&view=selectResult">
                                            View Results
                                        </a>
                                    </li>
                                    <li class="<?php echo $Marksheet; ?>">
                                        <a href="index.php?module=examination&view=selectClassMarksheet">
                                            Students Mark's Sheet </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $library; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-reorder"></i>
                                    <span class="title">Library</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">

                                    <li class="<?php echo $allBookCategory; ?>">
                                        <a href="index.php?module=library&view=allBooksCategory">
                                            All Books Categorty</a>
                                    </li>
                                    <li class="<?php echo $allBook; ?>">
                                        <a href="index.php?module=library&view=allBook">
                                            All Books</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $message; ?>">
                                <a href="javascript:;">
                                    <i class="icon-envelope-open"></i>
                                    <span class="title">Message</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $sendMessage; ?>">
                                        <a href="index.php?module=message&view=sendMessage">Send Message</a>
                                    </li>
                                    <li class="<?php echo $inbox; ?>">
                                        <a href="index.php?module=message&view=inbox">Inbox</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $profileview; ?>">
                                <a href="index.php?module=home&view=profileView">
                                    <i class="fa fa-qrcode"></i>
                                    Profile
                                </a>
                            </li>
                        <?php } elseif ($this->ion_auth->is_parents()) {
                            ?>
                            <li class="<?php echo $dashbord; ?>">
                                <a href="index.php?module=home&view=index">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="<?php echo $classRoutine; ?>">
                                <a href="index.php?module=sclass&view=selectAllRoutine">
                                    <i class="fa fa-cubes"></i>
                                    <span class="title">Class Routine</span>
                                </a>
                            </li>
                            <li class="<?php echo $teachers; ?>">
                                <a href="index.php?module=teachers&view=allTeachers">
                                    <span class="icon-users teacherLiIconSideber" aria-hidden="true"></span>
                                    <span class="title">
                                        Teachers Information</span>
                                </a>
                            </li>
                            <li class="<?php echo $notice; ?>">
                                <a href="index.php?module=notice&view=allNotice">
                                    <i class="fa fa-hospital-o"></i>
                                    <span class="title">
                                        Notice Board</span>
                                </a>
                            </li>
                            <li class="<?php echo $Parents; ?>">
                                <a href="index.php?module=parents&view=parentsInformation">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Parents</span>
                                </a>
                            </li>
                            <li class="<?php echo $exam; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-table"></i>
                                    <span class="title"> Examination</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $viewAttendence; ?>">
                                        <a href="index.php?module=examination&view=viewExamAttendance">
                                            Exam Attendance
                                        </a>
                                    </li>
                                    <li class="<?php echo $exameGread; ?>">
                                        <a href="index.php?module=examination&view=examGread">
                                            Exam Grade
                                        </a>
                                    </li>
                                    <li class="<?php echo $resultView; ?>">
                                        <a href="index.php?module=examination&view=selectResult">
                                            View Results
                                        </a>
                                    </li>
                                    <li class="<?php echo $Marksheet; ?>">
                                        <a href="index.php?module=examination&view=selectClassMarksheet">
                                            Students Mark's Sheet </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $library; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-reorder"></i>
                                    <span class="title">Library</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">

                                    <li class="<?php echo $allBookCategory; ?>">
                                        <a href="index.php?module=library&view=allBooksCategory">
                                            All Books Categorty</a>
                                    </li>
                                    <li class="<?php echo $allBook; ?>">
                                        <a href="index.php?module=library&view=allBook">
                                            All Books</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $message; ?>">
                                <a href="javascript:;">
                                    <i class="icon-envelope-open"></i>
                                    <span class="title">Message</span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo $sendMessage; ?>">
                                        <a href="index.php?module=message&view=sendMessage">Send Message</a>
                                    </li>
                                    <li class="<?php echo $inbox; ?>">
                                        <a href="index.php?module=message&view=inbox">Inbox</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo $profileview; ?>">
                                <a href="index.php?module=home&view=profileView">
                                    <i class="fa fa-qrcode"></i>
                                    Profile
                                </a>
                            </li>
                        <?php } ?>
                        <li class="<?php echo $cleander; ?>">
                            <a href="index.php?module=home&view=calender">
                                <i class="icon-calendar"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="index.php?module=auth&view=logout">
                                <i class="fa fa-power-off"></i>LogOut
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
