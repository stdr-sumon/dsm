<?php
    if(isset($_GET['loggedID'])){
        $test_id = $_GET['testID'];
        $subject_id = $_GET['subjectID'];
        $user_id = $_GET['loggedID'];
    }
    $urlTest = "http://localhost:5000/tests/$test_id";
    $dataTest = file_get_contents($urlTest);
    $listTest = json_decode($dataTest);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Edit Class</title>
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
            <h4 class="text-center">Edit Test</h4> <br>
            <form action="" method="post">
                <?php foreach($listTest as $value) { ?>
                    <input type='hidden' id='user_id' name='user_id' value='<?php echo $user_id; ?>'>
                    <input type='hidden' id='test_id' name='test_id' value='<?php echo $test_id; ?>'>
                    <input type='hidden' id='subject_id' name='subject_id' value='<?php echo $subject_id; ?>'>

                    <div class="col-md-6">
                        <label for="test_name" class="form-label">Test Name: </label>
                        <input type='text' class='form-control' id='test_name' name='test_name' placeholder='Test Name' value='<?php echo $value->test_name;  ?>'>
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date: </label>
                        <input type="datetime-local" class="form-control" id="date" name="date" value="<?php echo $value->date;  ?>">
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
    const user_Id = $("#user_id").val();
    var formData = {
        test_id: $("#test_id").val(),
        subject_id: $("#subject_id").val(),
        user_Id: $("#user_id").val(),
        test_name: $("#test_name").val(),
        test_date: $("#date").val()
    };
    $.ajax({
        type: "PUT",
        url: 'http://localhost:5000/tests/' + user_Id,
        data: formData,
        crossDomain: true,
        dataType: "json",
        encode: true,
        success: function(result) {
            alert(result);
            window.location.href = 'subject_overview.php?subjectID=' + subject_id + '&loggedID=' + user_Id;
        }        
    })
    event.preventDefault();
});
</script>