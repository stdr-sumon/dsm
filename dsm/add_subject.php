<?php
    if(isset($_GET['classID'])){
        $class_id = $_GET['classID'];
        $user_id = $_GET['loggedID'];
        $url = "http://localhost:5000/users/teacher";
        $data = file_get_contents($url);
        $teacher = json_decode($data);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Subject</title>
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
            <h4 class="text-center">Add Subject</h4>
            <form class="row g-3" action="http://localhost:5000/subjects/addEditSubject/addSubject" method="post">
                <input type='hidden' name='user_id' value='<?php echo $user_id ?>'>
                <input type="hidden" name="is_archived" value='0'>
                <div class="col-md-2">
                    <label for="user_name" class="form-label">Class Id: </label>
                    <input type="text" class="form-control" id="class_id" name="class_id" value="<?php echo $class_id; ?>" readonly>
                </div>
                <div class="col-md-8">
                    <label for="user_name" class="form-label">Subject Name: </label>
                    <input type="text" class="form-control" id="subject_name" name="subject_name">
                </div>
                <div class="col-md-4">
                    <label for="user_type" class="form-label">Assign Teacher: </label>
                    <select id="teacher_id" name="teacher_id" class="form-select">
                    <?php 
                        foreach ($teacher as $value) {
                            echo "<option value='$value->user_id'>$value->user_name</option>"; 
                        }
                    ?>
                    </select>
                </div>
                <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </main>
    <?php include 'sections/footer.php'; ?>
</body>
</html>

<script>
    $(document).ready(function(){
        // Initialise the select
        $('select').formSelect();
    });
</script>