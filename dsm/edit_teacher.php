<?php
    if(isset($_GET['userID'])) {
        $user_id = $_GET['userID'];
        $urlUserInfo = "http://localhost:5000/users/show/$user_id";
        $data = file_get_contents($urlUserInfo);
        $list = json_decode($data);
        unset($data);
    }

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
    <title>Edit Info - Teacher</title>
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
            <h4 class="text-center">Edit Info by teacher</h4> <br>
            <form class="row g-3" method="post">
                <input type='hidden' id='user_id' name='user_id' value='<?php echo $user_id ?>'>
                <?php foreach($list as $value) { ?>
                    <div class="col-md-6">
                        <label for="user_name" class="form-label">User Name: </label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $value->user_name; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password: </label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-12">
                        <label for="first_name" class="form-label">First Name: </label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="<?php echo $value->first_name; ?>">
                    </div>
                    <div class="col-12">
                        <label for="last_name" class="form-label">Last Name: </label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $value->last_name; ?>">
                    </div>
                    <div class="col-12">
                        <label for="last_name" class="form-label">User Type: </label>
                        <input type="text" class="form-control" id="user_type" name="user_type" placeholder="User type" value="<?php echo $value->user_type; ?>" readonly>
                    </div>
                    <div class="col-12 mt-3">
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
        const user_id = $("#user_id").val();
        var formData = {
            user_name: $("#user_name").val(),
            password: $("#password").val(),
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            user_type: $("#user_type").val(),
            user_id: $("#user_id").val()

        };

        $.ajax({
        type: "PUT",
        url: 'http://localhost:5000/users/'+user_id,
        data: formData,
        dataType: "json",
        encode: true,
        success: function (result) {
            window.location.href='edit_teacher.php?userID='+$("#user_id").val()+'&loggedID='+$("#user_id").val();
        }
        })
        event.preventDefault();
    });
</script>