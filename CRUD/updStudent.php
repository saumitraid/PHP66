<?php 
require('config.php'); 
if(isset($_POST['sid'])){
    $sid=$_POST['sid'];
    try{
        $src="SELECT * FROM student WHERE sid=$sid";
        $rs=mysqli_query($con, $src);
        $rec=mysqli_fetch_assoc($rs);
    }catch(Exception $e){
        header('location:viewStudent.php?err='.$e->getMessage());
    }
}else{
    header('location:viewStudent.php?err=Invalid student details');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<title>Update</title>
</head>
<body>
    <div class="container">
        <div class="col-6">
            <h2>Update Student Details</h2>
            <form name="frm" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="<?php echo $rec['name'] ?>" type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email_id" class="form-label">Email</label>
                    <input value="<?php echo $rec['email_id'] ?>" type="email" name="email_id" id="email_id" class="form-control" required>
                </div>
                <input type="hidden" name="sid" value="<?php echo $rec['sid'] ?>">
                <div class="mb-3">
                    <input type="submit" name="ok" value="Save Changes" class="btn btn-primary">
                </div>
            </form>

            <?php
            if(isset($_POST['ok'])){
                try{
                    $name=$_POST['name'];
                    $email_id=$_POST['email_id'];
                    // if($rec['email_id']!=$email_id){

                    // }
                    $upd="UPDATE student SET name='$name', email_id='$email_id' WHERE sid=$sid";
                    mysqli_query($con, $upd);
                    header('location:viewStudent.php?msg=Student Details Update Successfully');    
                }catch(Exception $e){
                    ?>
                    <div class="alert alert-danger">
                    <?php
                    echo $e->getMessage();
                    ?>
                    </div>
                    <?php
                }
            }
            ?>
            <a href="viewStudent.php" class="btn btn-info">Go Back</a>
        </div>
        
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>