<?php
    $userType = '';
    if (isset($_GET['id']) || isset($_GET['loggedID'])) {
        $loggedUserID = isset($_GET['id']) ? $_GET['id'] : $_GET['loggedID'];
        $urlUserInfo = "http://localhost:5000/users/show/$loggedUserID";
        $dataUserInfo  = file_get_contents($urlUserInfo);
        $listData = json_decode($dataUserInfo);
        foreach($listData as $value) {
            $userType = $value->user_type;
            $loggedName = $value->first_name.' '.$value->last_name;
        }
    }
?>


<nav>
    <?php if ($userType == 'admin') { ?>
        <div class="nav-wrapper">
            <p class="brand-logo center">Welcome <?php echo $loggedName ?>
            </p>
            <a class="right m-3 logout" href="../dbw-api/index.php"><i class="material-icons left" style="margin-top: -35% !important; margin-left: 15% !important;">power_settings_new</i>
            </a> 
            <ul class="left hide-on-med-and-down">
                <li><a href="../dbw-api/admin.php?id=<?php echo $loggedUserID ?>">Home</a></li>
                <li><a href="../dbw-api/edit_admin.php?userID=<?php echo $loggedUserID.'&loggedID='.$loggedUserID?>">Profile</a></li>
            </ul>
        </div>
    <?php } ?>

    <?php if ($userType == 'teacher') { ?>
        <div class="nav-wrapper">
            <p class="brand-logo center">Welcome <?php echo $loggedName ?>
            </p>
            <a class="right m-3 logout" href="../dbw-api/index.php"><i class="material-icons left" style="margin-top: -35% !important; margin-left: 15% !important;">power_settings_new</i>
            </a> 
            <ul class="left hide-on-med-and-down">
                <li><a href="../dbw-api/teacher.php?loggedID=<?php echo $loggedUserID ?>">Home</a></li>
                <li><a href="../dbw-api/edit_teacher.php?userID=<?php echo $loggedUserID.'&loggedID='.$loggedUserID?>">Profile</a></li>
            </ul>
        </div>
    <?php } ?>

    <?php if ($userType == 'student') { ?>
        <div class="nav-wrapper">
            <p class="brand-logo center">Welcome <?php echo $loggedName ?>
            </p>
            <a class="right m-3 logout" href="../dbw-api/index.php"><i class="material-icons left" style="margin-top: -35% !important; margin-left: 15% !important;">power_settings_new</i>
            </a> 
            <ul class="left hide-on-med-and-down">
                <li><a href="../dbw-api/student.php?loggedID=<?php echo $loggedUserID ?>">Home</a></li>
                <li><a href="../dbw-api/student_subject.php?loggedID=<?php echo $loggedUserID?>">Subject</a></li>
            </ul>
        </div>
    <?php } ?>
    <?php if ($userType == '') { ?>
        <!-- for login -->
        <div class="nav-wrapper">
            <p class="brand-logo center">Welcome to DigitalSchoolManagement </p>
        </div>
    <?php } ?>
</nav>