<?php
    if (isset($_GET['loggedID'])) {
        $loggedID = $_GET['loggedID'];
    }
    if (isset($_GET['classID'])) {
        $class_id = $_GET['classID'];
    }

    $urlClassData = "http://localhost:5000/classes/subjects/$class_id";
    $data = file_get_contents($urlClassData);
    $subjects = json_decode($data);
    unset($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Subjects of Class</title>
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
            <a class="btn right mt-4 mb-2" href="../dbw-api/add_subject.php?classID=<?php echo $class_id; ?>&loggedID=<?php echo $loggedID; ?>">
                <i class="fa fa-plus" aria-hidden="true"></i> New Subject
            </a>
            &nbsp;&nbsp;&nbsp;
            <a class="btn right mt-4 mb-2 ml-1 mr-1" href="../dbw-api/assign_pupil.php?classID=<?php echo $class_id; ?>&loggedID=<?php echo $loggedID; ?>">
                <i class="fa fa-plus" aria-hidden="true"></i> Assign Pupil
            </a>
            <table class="table table-bordered table-striped table-hoverable table-fullwidth mt-2">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Class Name</th>
                        <th>Archived</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($subjects as $value) { ?>
                        <tr>
                            <td> <?php echo $value->subject_name; ?>  </td>
                            <td> <?php echo $value->class_name; ?>  </td>
                            <td> <?php echo ($value->is_archived == 1) ? 'Yes' : 'No'; ?>  </td>
                            <td>
                            <a class="btn" data-title="Edit" href="../dbw-api/edit_subject.php?classID=<?php echo $class_id; ?>&subjectID=<?php echo $value->subject_id; ?>&loggedID=<?php echo $loggedID; ?>">
                                <i class="material-icons dp48">border_color</i>
                            </a> 
                            <?php if ($value->is_archived == 0) { ?>
                            | <button class="btn archiveBtn" name='archiveSubject' value='<?php echo $value->subject_id; ?>' data-subject="<?php echo $value->subject_id; ?>" data-class="<?php echo $class_id; ?>" data-admin="<?php echo $loggedID; ?>">
                                    <i class="material-icons dp48">visibility_off</i>
                            </button>
                            <?php } ?>
                            | <button class="btn deleteBtn" name='deleteSubject' value='<?php echo $value->subject_id; ?>' data-class="<?php echo $class_id; ?>" data-title="Delete" data-admin="<?php echo $loggedID; ?>">
                                <i class="large material-icons dp48">delete_forever</i>
                            </button>
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