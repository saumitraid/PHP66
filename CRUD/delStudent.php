<?php
require('config.php');
if(isset($_POST['sid'])){
    $sid=$_POST['sid'];
    try{
        $del="DELETE FROM student WHERE sid=$sid";
        $res=mysqli_query($con, $del);
        header('location:viewStudent.php?msg=Student Details Remove Successfully');
    }catch(Exception $e){
        header('location:viewStudent.php?err='.$e->getMessage());
    }
}else{
    header('location:viewStudent.php?err=Invalid student details');
}
?>