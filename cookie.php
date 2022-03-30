<?php
    $name = 'user_id';
    $value = $_SESSION['visitor'];

    setcookie($name, $value, time() + 3600);
?>