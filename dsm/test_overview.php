<?php
    if (isset($_GET['id']) || isset($_GET['loggedID'])) {
        $loggedID = isset($_GET['id']) ? $_GET['id'] : $_GET['loggedID'];
        $subject_id = $_GET['subjectID'];
        
        $urlGradeStudent = "http://localhost:5000/subjects/details/$loggedID/$subject_id";
        $dataGradeStudent = file_get_contents($urlGradeStudent); // put the contents of the file into a variable
        $gradeStudentData = json_decode($dataGradeStudent);
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
    .btn{
        background-color: #005e58!important;
    }
</style>

<body>
    <main>
        <div class="container mt-5">
            <table class="table table-bordered table-striped table-hoverable table-fullwidth mt-2">
                <thead>
                    <tr>
                        <th>Test Name</th>
                        <th>Subject Name</th>
                        <th>Class Name</th>
                        <th>Grade </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($gradeStudentData as $value) { ?>
                        <tr>
                            <td> <?php echo $value->test_name; ?>  </td>
                            <td> <?php echo $value->subject_name; ?>  </td>
                            <td> <?php echo $value->class_name; ?>  </td>
                            <td> <?php echo $value->marks; ?>  </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include 'sections/footer.php'; ?>
</body>
</html>