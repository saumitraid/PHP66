<?php require('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="col-6">
            <h2>User Registration</h2>
            <form name="frm" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email_id" class="form-label">Email</label>
                    <input type="email" name="email_id" id="email_id" class="form-control" required>
                </div>
                 <div class="mb-3">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" name="pwd" id="pwd" class="form-control" required>
                </div>
                <input type="submit" name="ok" value="Register" class="btn btn-primary">
            </form>

            <?php
            if(isset($_POST['ok'])){
                try{
                    $name=$_POST['name'];
                    $email_id=$_POST['email_id'];
                    $pwd=password_hash( $_POST['pwd'], PASSWORD_DEFAULT);
                    $sql="INSERT INTO student (name, email_id, pwd) VALUE ('$name', '$email_id', '$pwd')";
                    mysqli_query($con, $sql);
                    echo "User Registration is successfull";
                }catch(Exception $e){
                    echo $e->getMessage();
                }
            }
            ?>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>