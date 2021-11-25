<?php
    if (isset($_GET['id']) || isset($_GET['loggedID'])) {
        $teacher_id = isset($_GET['id']) ? $_GET['id'] : $_GET['loggedID'];
        $test_id = $_GET['testID'];
        $subject_id = $_GET['subjectID'];

        $urlTestData = "http://localhost:5000/tests/details/$teacher_id/$test_id";
        $dataTestData = file_get_contents($urlTestData);
        $testDataInfo = json_decode($dataTestData);
        unset($urlTestData);
        unset($urlTestData);
    }
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
            <a class="btn right mt-4 mb-2" href="../dbw-api/upload_csv.php?testID=<?php echo $test_id; ?>&subjectID=<?php echo $subject_id; ?>&loggedID=<?php echo $teacher_id; ?>">
                <i class="fa fa-plus" aria-hidden="true"></i> Upload Grades
            </a>

            <table class="table table-bordered table-striped table-hoverable table-fullwidth mt-2">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>User Name</th>
                        <th>Test Name</th>
                        <th>Grade</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($testDataInfo as $value) { ?>
                        <tr>
                            <td> <?php echo $value->first_name.' '.$value->last_name; ?>  </td>
                            <td> <?php echo $value->user_name; ?>  </td>
                            <td> <?php echo $value->test_name; ?>  </td>
                            <td> <?php echo $value->marks; ?>  </td>
                            <td style="text-align: center;">
                                <a class="btn" data-title="Edit" href="../dbw-api/edit_grade.php?testID=<?php echo $test_id ; ?>&subjectID=<?php echo $subject_id; ?>&studentID=<?php echo $value->user_id; ?>&loggedID=<?php echo $teacher_id; ?>">
                                    <i class="material-icons dp48">border_color</i>
                                </a> 
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