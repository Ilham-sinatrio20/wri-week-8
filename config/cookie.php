<?php
// Get User Data
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id = '$id'";
$res = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($res);
$_name = $user['name'];
$role = $user['role'];
//Functionzz
function makeCookie($name, $value)
{
    setcookie($name, $value, time() + (3600 * 2));
}
// Make user_id cookie
if (!isset($_COOKIE['user_id'])) {
    makeCookie('user_id', $_SESSION['user_id']);
}
// Make role cookie
if (!isset($_COOKIE['role'])) {
    makeCookie('role', $role);
}
// Make user name cookie
if (!isset($_COOKIE['name'])) {
    makeCookie('name', $_name);
}

// Make username cookie
if (!isset($_COOKIE['username'])) {
    makeCookie('username', $_SESSION['username']);
}

