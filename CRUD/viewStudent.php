<?php 
require('config.php');
try{
    $src="select * from student";
    $rs=mysqli_query($con, $src);
}catch(Exception $e){
    echo $e->getMessage();
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
<title>View</title>
</head>
<body>
    <div class="container">
        <h1>All Student Details</h1>
        <?php
        if(isset($_GET['msg'])){
            ?>
            <div class="alert alert-success col-4 text-center">
            <?php
            echo $_GET['msg'];
            ?>
            </div>
            <?php
        }
        if(isset($_GET['err'])){
            ?>
            <div class="alert alert-danger col-4 text-center">
            <?php
            echo $_GET['err'];
            ?>
            </div>
            <?php
        }
        if(mysqli_num_rows($rs)>0){
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    while($rec=mysqli_fetch_assoc($rs)){
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rec['name'] ?></td>
                            <td><?php echo $rec['email_id'] ?></td>
                            <td>
                                <form name="upd-frm-<?php echo $i; ?>" method="post" action="updStudent.php">
                                    <input type="hidden" name="sid" value="<?php echo $rec['sid'] ?>">
                                    <button type="submit" class="btn">
                                    <i class="far fa-edit text-primary"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form name="del-frm-<?php echo $i; ?>" method="post" action="delStudent.php">
                                    <input type="hidden" name="sid" value="<?php echo $rec['sid'] ?>">
                                    <button type="submit" class="btn">
                                    <i class="far fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }else{
            echo '<h1>No student details found</h1>';
        }
        ?>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>