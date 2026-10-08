<?php
try{
    $server="localhost";
    $dbuser="root";
    $dbpass="Sau123456";
    $dbname="php66";
    $port="3306";
    $con=mysqli_connect($server, $dbuser, $dbpass, $dbname, $port);
}catch(Exception $e){
    echo $e->getMessage();
}
?>