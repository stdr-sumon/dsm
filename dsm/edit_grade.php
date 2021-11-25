<?php
    if (isset($_GET['studentID'])) {
        $teacher_id = isset($_GET['id']) ? $_GET['id'] : $_GET['loggedID'];
        $subject_id = $_GET['subjectID'];

        $student_id = $_GET['studentID'];
        $test_id = $_GET['testID'];

        $urlTestDataSubject = "http://localhost:5000/tests/student_grades/$student_id/$test_id";
        $dataTest = file_get_contents($urlTestDataSubject);
        $testDataSubject = json_decode($dataTest);
        unset($urlTestDataSubject);
        unset($dataTest);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - Edit Mark</title>
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
        <div class="col-md-12">
            <h4 class="text-center">Edit Class</h4> <br>
            <form action="" method="post">
                <?php foreach($testDataSubject as $value) { ?>
                    <input type='hidden' id='test_id' name='test_id' value='<?php echo $test_id ?>'>
                    <input type='hidden' id='user_id' name='user_id' value='<?php echo $student_id ?>'>
                    <input type='hidden' id='teacher_id' name='teacher_id' value='<?php echo $teacher_id ?>'>
                    <input type='hidden' id='subject_id' name='subject_id' value='<?php echo $subject_id ?>'>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="user_name" class="form-label">Current Grade: </label>
                            <input type="text" class="form-control" id='marks' name='marks' value="<?php echo $value->marks ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                <?php } ?>
            </form>
        </div>
    </main>
    <?php include 'sections/footer.php'; ?>
</body>
</html>

<script>
$("form").submit(function (event) {
    const subject_id = $("#subject_id").val();
    const teacher_id = $("#teacher_id").val();
    const user_Id = $("#user_id").val();
    const test_id = $("#test_id").val();

    var formData = {
        user_Id: $("#user_id").val(),
        test_id: $("#test_id").val(),
        marks: $("#marks").val()
    };

    $.ajax({
        type: "PUT",
        url: 'http://localhost:5000/tests/grades/' + user_Id,
        data: formData,
        crossDomain: true,
        dataType: "json",
        encode: true,
        success: function(result) {
            alert(result);
            window.location.href = 'test_details.php?testID=' + test_id + '&subjectID=' + subject_id + '&loggedID=' + teacher_id;
        }
    })
    event.preventDefault();
});
</script>