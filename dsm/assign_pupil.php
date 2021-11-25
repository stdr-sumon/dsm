<?php
    $alreadyAssigned = array();
    $availabe = array();
    if (isset($_GET['loggedID'])) {
        $loggedID = $_GET['loggedID'];
    }
    if (isset($_GET['classID'])) {
        $class_id = $_GET['classID'];
        
        $urlAssigned = "http://localhost:5000/classes/assignedStudent/$class_id";
        $dataAssigned = file_get_contents($urlAssigned);
        $assignedstudent = json_decode($dataAssigned);

        $urlNotAssigned = "http://localhost:5000/classes/notAssignedStudent/$class_id";
        $dataNotAssigned  = file_get_contents($urlNotAssigned);
        $notAssignedstudent = json_decode($dataNotAssigned);
        foreach ($notAssignedstudent as $nas) {
            $alreadyAssigned[] = $nas->user_id;
        }
        foreach ($assignedstudent as $nas) {
            $availabe[] = $nas->user_id;
        }

        unset($dataAssigned);
        unset($assignedstudentList);
    }
    $url = "http://localhost:5000/users/student";
    $data = file_get_contents($url);
    $studentList = json_decode($data);

    unset($data);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Assign Pupil</title>
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
    a:hover {
    color: wheat;
    }
    button:hover {
    color: wheat;
    }
    nav{
    background-color:#005f50!important
    }
    button{
        background-color: #005e58!important;
    }
    .deleteBtn {
        background-color: brown !important;
    }
</style>

<body>
    <main>
        <div class="col-md-12">
            <h4 class="text-center">Assign Pupil</h4>
            <table class="table table-bordered table-striped table-hoverable table-fullwidth mt-2">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>User Name</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($studentList as $value) { ?>
                        <tr>
                            <td> <?php echo $value->first_name.' '.$value->last_name; ?> </td>
                            <td> <?php echo $value->user_name; ?> </td>
                            <td style="text-align: center;">
                            <?php if (in_array($value->user_id, $alreadyAssigned)) { ?>
                                <button class="btn archiveBtn" id='assignStudent' name='assignStudent' value='<?php echo $value->user_id; ?>' data-class="<?php echo $class_id; ?>" data-admin="<?php echo $loggedID; ?>">
                                    <i class="material-icons dp48">person_add</i>
                                </button>
                            <?php } else {?>
                                <button class="btn deleteBtn" id='deassignStudent' name='deassignStudent' value='<?php echo $value->user_id; ?>' data-class="<?php echo $class_id; ?>" data-title="Delete" data-admin="<?php echo $loggedID; ?>">
                                    <i class="large material-icons dp48">block</i>
                                </button>
                            <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include 'sections/footer.php'; ?>
</body>
</html>

<?php include 'sections/ajax_operation.php'; ?>