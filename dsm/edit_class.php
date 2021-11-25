<?php
    if (isset($_GET['loggedID'])) {
        $user_id = $_GET['loggedID'];
    }
    if(isset($_GET['classID'])){
        $class_id = $_GET['classID'];
        $urlClassData = "http://localhost:5000/classes/$class_id";
        $dataClass = file_get_contents($urlClassData);
        $listClassData = json_decode($dataClass);
    }
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
            <h4 class="text-center">Edit Class</h4> <br>
            <form action="" method="post">
                <?php foreach($listClassData as $value) { ?>
                    <input type='hidden' id='user_id' name='user_id' value='<?php echo $user_id ?>'>
                    <input type='hidden' id='class_id' name='class_id' value='<?php echo $class_id ?>'>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="user_name" class="form-label">Class Name: </label>
                            <input type="text" class="form-control" id="class_name" name="class_name" value="<?php echo $value->class_name ?>">
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
    const class_id = $("#class_id").val();
    const user_Id = $("#user_id").val();
    var formData = {
        class_name: $("#class_name").val(),
    };
    $.ajax({
      type: "PUT",
      url: 'http://localhost:5000/classes/'+class_id+'/'+user_Id,
      data: formData,
      crossDomain:true,
      dataType: "json",
      encode: true,
      success: function (result) {
        if(result == 'not ok') {
            alert('No name changed.')
        } else {
            window.location.href='admin.php?id='+user_Id
        }
        console.log(result)
      }
    })
    event.preventDefault();
});
</script>