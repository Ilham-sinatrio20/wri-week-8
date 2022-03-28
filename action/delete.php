<?php
    include ('../config/connect.php');
    include('../config/login-check.php');
    $id_driver = $_GET ['id_driver'];

    $sql = "DELETE FROM driver WHERE id_driver = $id_driver";

    $res = mysqli_query($conn, $sql);

    if($res == true){
        $_SESSION ['delete'] = "<div class = 'alert alert-success' role='alert'>Driver successfully deleted</div>";
        header ('location:'.SITEURL.'index.php');
    }else{
        $_SESSION ['delete'] = "<div class = 'alert alert-danger' role='alert'>Driver failed to delete</div>";
        header ('location:'.SITEURL.'index.php');
    }
?>