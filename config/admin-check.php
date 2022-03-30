<?php
    if(isset($_COOKIE['user_id']) && isset($_COOKIE['role'])){
        if($_COOKIE['role'] != 'Admin'){
            header("location:".SITEURL."index.php");
        }
    }
?>