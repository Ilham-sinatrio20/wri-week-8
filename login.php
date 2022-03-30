<?php
include('config/connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login Panel</title>
    <meta name="generator" content="Hugo 0.88.1">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="style/signin.css" rel="stylesheet">
</head>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<body class="text-center">
    <main class="form-signin">
        <form action=" " method="POST">
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if (isset($_SESSION['logout'])) {
                echo $_SESSION['logout'];
                unset($_SESSION['logout']);
            }
            if (isset($_SESSION['register'])) {
                echo $_SESSION['register'];
                unset($_SESSION['register']);
            }
            if (isset($_SESSION['check-login'])) {
                echo $_SESSION['check-login']; //Display session message
                unset($_SESSION['check-login']); //Removing session message
            }
            ?>
            <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password">
                <label for="password">Password</label>
            </div>
            <div class="checkbox mb-3">
                <label><input type="checkbox" value="remember-me"> Remember me</label>
            </div>
            <input class="w-100 btn btn-lg btn-primary mb-2" type="submit" value="Login" name="submit">
            <p>Belum punya akun? Klik <a href="register.php">Daftar</a></p>
            <p class="mt-4 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    $cek = "UPDATE user SET status = true WHERE username = '$username'";
    $checking = mysqli_query($conn, $cek);

    $hitung = mysqli_num_rows($res);

    if ($hitung > 0 && $checking == true) {
        $_SESSION['login'] = "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>";
        $sqlite = "SELECT * FROM user WHERE username='$username'";
        $res4 = mysqli_query($conn, $sqlite);
        $find = mysqli_fetch_assoc($res4);

        $id = $find['id'];
        $username = $find['username'];
        $_SESSION['user_id'] =  $id;
        $_SESSION['username'] = $username;
        include('config/cookie.php');
        header('location:' . SITEURL . 'index.php');
    } else {
        $_SESSION['login'] = "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: 'Username atau Password Salah',
                  })
                </script>";
        header('location:' . SITEURL . 'login.php');
    }
}
?>