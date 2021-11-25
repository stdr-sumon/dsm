<?php 
    $urlUserData = 'http://localhost:5000/users';
    $urlClassData = 'http://localhost:5000/classes';

    $userData = file_get_contents($urlUserData);
    $classData = file_get_contents($urlClassData);

    $users = json_decode($userData);
    $classes = json_decode($classData);

   // return print_r($userData);

    if (isset($_GET['id']) || isset($_GET['loggedID'])) {
        $loggedID = isset($_GET['id']) ? $_GET['id'] : $_GET['loggedID'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <?php include 'sections/nav.php'; ?>
    <?php include 'sections/script.php'; ?>
    <?php include 'sections/header.php'; ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom-style.css">
</head>

<style>
    nav ul li:hover {
    background-color: white;
    }

    nav div a i:hover {
    background-color: white;
    }
    nav{
    background-color:#005f50!important
    }
    button{
        background-color: #005e58!important;
    }
    .project-tab {
        margin-top: -8%;
        padding-top: 10%;
        padding-bottom: 2%;
    }
    .project-tab a{
        text-decoration: none;
        color: white;
        font-weight: 600;
    }
    .deleteBtn {
        background-color: brown !important;
    }

    .nav-tabs .nav-item {
        margin-bottom: 0px !important;
    }
    .container {
        max-width: 85%;
        width: 90%;
    }
</style>

<body>
    <main>
        <div class="container">
            <section id="tabs" class="project-tab">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Users</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Classes</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active mb-2" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <a class="btn right mt-4 mb-1" href="../dbw-api/add_user.php?loggedID=<?php echo $loggedID; ?>">
                                <i class="fa fa-plus" aria-hidden="true"></i> New User
                            </a>
                            <table class="table table-bordered table-striped table-hoverable table-fullwidth mt-2">
                                <thead>
                                    <tr>
                                        <th>First Name </th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $value) { ?>
                                        <tr>
                                            <td> <?php echo $value->first_name; ?>  </td>
                                            <td> <?php echo $value->last_name; ?>  </td>
                                            <td> <?php echo $value->user_name; ?>  </td>
                                            <td> <?php echo $value->user_type; ?>  </td>
                                            <td>
                                            <a class="btn" data-title="Edit" href="../dbw-api/edit_admin.php?userID=<?php echo $value->user_id; ?>&loggedID=<?php echo $loggedID; ?>">
                                                <i class="material-icons dp48">border_color</i>
                                            </a> 
                                            | <button class="btn deleteBtn" name='deleteUser' value='<?php echo $value->user_id; ?>' data-title="Delete">
                                                <i class="large material-icons dp48">delete_forever</i>
                                            </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <a class="btn right mt-4 mb-1" href="../dbw-api/add_class.php?loggedID=<?php echo $loggedID; ?>">
                                <i class="fa fa-plus" aria-hidden="true"></i> New Class
                            </a>
                            <table class="table table-bordered table-striped table-hoverable table-fullwidth mt-2">
                                <thead>
                                    <tr>
                                        <th>Class Name </th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($classes as $value) { ?>
                                        <tr>
                                            <td> <?php echo $value->class_name; ?>  </td>
                                            <td style="text-align: center;">
                                            <a class="btn detail" data-title="See Details" href="subject_info.php?classID=<?php echo $value->class_id; ?>&loggedID=<?php echo $loggedID; ?>">
                                                <i class="material-icons dp48">airplay</i>
                                            </a>
                                            | <a class="btn" data-title="Edit" href="edit_class.php?classID=<?php echo $value->class_id; ?>&loggedID=<?php echo $loggedID; ?>">
                                                <i class="material-icons dp48">border_color</i>
                                            </a> 
                                            | <button class="btn deleteBtn" name='deleteClass' value='<?php echo $value->class_id; ?>' data-title="Delete" data-admin="<?php echo $loggedID; ?>">
                                                <i class="large material-icons dp48">delete_forever</i>
                                            </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include 'sections/footer.php'; ?>
</body>
</html>

<?php include 'sections/ajax_operation.php'; ?>