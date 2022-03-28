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

    <title>Register Panel</title>
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
        <form action="" method="POST">
            <?php
                if(isset($_SESSION['register'])){
                    echo $_SESSION ['register'];
                    unset($_SESSION['register']);
                }
            ?>
            <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Silahkan Daftar</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="name" name="name">
                <label for="username">Nama</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="role">Role</label>
                <select name="role" class="form-select" id="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
                <input class="w-100 btn btn-lg btn-primary mb-2" type="submit" value="Daftar" name="submit">
                <p>Sudah punya akun? Klik <a href="login.php">Masuk</a></p>
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
        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);

            $sql2 = "SELECT * FROM user";
            $res2 = mysqli_query($conn, $sql2);
            $count = mysqli_num_rows($res2);
            if($count > 0){
                while($row = mysqli_fetch_assoc($res2)){
                    if($row['username'] == $username){
                        $_SESSION['register'] = "
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Registrasi Gagal',
                                    text: 'Username telah diapakai',
                                })
                            </script>
                        ";
                        header("location:".SITEURL."register.php");
                        die();
                    }
                }
            }

            $password = mysqli_real_escape_string($conn, md5($_POST['password']));
            $email = $_POST['email'];
            $name = $_POST['name'];
            $role = $_POST['role'];
            $sql = "INSERT INTO user SET
                username = '$username',
                password = '$password',
                email = '$email',
                name = '$name',
                role = '$role'
            ";
            $res = mysqli_query($conn, $sql);
            if($res == true){
                $_SESSION['register'] = "
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi Berhasil',
                            text: 'Silahkan Login',
                        })
                    </script>";
                header("location:".SITEURL."login.php");
                die();
            } else {
                $_SESSION['register'] = "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Registrasi Gagal',
                            text: 'Terjadi Kesalahan Sistem',
                        })
                    </script>";
                header("location:".SITEURL."register.php");
                die();
            }
        }
    ?>