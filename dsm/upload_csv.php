<?php
    if (isset($_GET['id']) || isset($_GET['loggedID'])) {
        $loggedID = isset($_GET['id']) ? $_GET['id'] : $_GET['loggedID'];
        $test_id = $_GET['testID'];
        $subject_id = $_GET['subjectID'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - Grade</title>
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
    <main class="container mt-5 pt-5">
        <div class="container mt-5 pt-5">
            Upload Grade:
            <input type='file' class='form-control' name='inputfile' id='inputfile' data-subject='<?php echo $subject_id; ?>' data-test='<?php echo $test_id; ?>' data-user='<?php echo $loggedID; ?>'>
            
            <div class="mt-2">
                <button id='inputfileSubmit' class="btn btn-primary">Submit</button>
            </div>
        </div>
    </main>
    <?php include 'sections/footer.php'; ?>
</body>
</html>

<script>
  $(document).on("change", "#inputfile", function() {
    const file_data = this.value;
    const file = file_data.replace(/^.*[\\\/]/, '')
    const user_id = $(this).attr('data-user');
    const test_id = $(this).attr('data-test');
    const subject_id = $(this).attr('data-subject');
    $.ajax({
      url: "http://localhost:5000/tests/importGrades/" + user_id,
      type: "POST",
      data: {
        file: file
      },
      crossDomain: true,
      encode: true,
      success: function(data) {
        alert(data);
        window.location.href='test_details.php?testID='+test_id+'&subjectID='+subject_id+'&loggedID='+user_id;
      }
    });
  });
</script>