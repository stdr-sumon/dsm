<?php
    if (isset($_GET['id']) || isset($_GET['loggedID'])) {
        $loggedID = isset($_GET['id']) ? $_GET['id'] : $_GET['loggedID'];
        $subjectId = $_GET['subjectID'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacer - Add Test</title>
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
        <h4 class="text-center">Add Test</h4>
            <form class="row g-3" action="http://localhost:5000/tests/<?php echo $subjectId; ?>" method="post">
                <input type='hidden' name='user_id' value='<?php echo $loggedID ?>'>
                <div class="col-md-6">
                    <label for="test_name" class="form-label">Test Name: </label>
                    <input type="text" class="form-control" name="test_name" placeholder="Test Name">
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Date: </label>
                    <input type="datetime-local" class="form-control" name="date">
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