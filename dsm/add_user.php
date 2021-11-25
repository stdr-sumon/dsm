<?php
    if (isset($_GET['loggedID'])) {
        $loggedID = $_GET['loggedID'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Add</title>
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
            <h4 class="text-center">User registration</h4> <br>
            <form class="row g-3" action="http://localhost:5000/users/register" method="post">
                <input type='hidden' name='user_id' value='<?php echo $loggedID ?>'>
                <div class="col-md-6">
                    <label for="user_name" class="form-label">User Name: </label>
                    <input type="text" class="form-control" id="user_name" name="user_name">
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password: </label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-12">
                    <label for="first_name" class="form-label">First Name: </label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name">
                </div>
                <div class="col-12">
                    <label for="last_name" class="form-label">Last Name: </label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name">
                </div>
                <div class="col-md-4">
                    <label for="user_type" class="form-label">User Type: </label>
                    <select id="user_type" name="user_type" class="form-select">
                        <option disabled selected>Choose...</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="col-12 mt-3">
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