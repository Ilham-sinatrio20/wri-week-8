<?php 
    include('navbar-login.php');
    include('../config/admin-check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style>
    .content {
        width: 200px;
        height: 600px;
        position: absolute; /*Can also be `fixed`*/
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        /*Solves a problem in which the content is being cut when the div is smaller than its' wrapper:*/
        max-width: 100%;
        max-height: 100%;
        overflow: auto;
    }   
</style>

<body>
    <!-- <?php 
        //$login = $_SESSION['login'];
    ?> -->
<div class="card content shadow" style="width: 25rem; height:fit-content;"> 
    <div class="card-body">
        <h5 class="card-title text-center">Tambah Data</h5>
        <form class="row g-3" action="" method="POST">
        <div class="col-md-12">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="col-md-12 mt-2">
            <label for="team" class="form-label">Tim</label>
            <input type="text" name="team" class="form-control" id="team">
        </div>
        <div class="col-12 mt-2">
            <label for="number" class="form-label">Nomor Balap</label>
            <input type="text" class="form-control" name="number" id="number">
        </div>
        <div class="col-12 mt-2">
            <label for="nation" class="form-label">Kebangsaan</label>
            <input type="text" class="form-control" id="nation" name="nation">
        </div>
        <div class="col-12 mt-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Add Driver">
                        <a href="../index.php" type="submit" name="submit" class="btn btn-warning" value="Update Driver">Kembali<a>
        </div>
        </form>
    </div>
</div>

</body>
</html>

<?php

    if(isset($_POST['submit'])){
        //$id_driver = $_POST['id_driver'];
        $name = $_POST['name'];
        $team = $_POST['team'];
        $number = $_POST['number'];
        $nation = $_POST['nation'];

        $sql = "INSERT INTO driver SET
            name = '$name',
            team = '$team',
            number = '$number',
            nation = '$nation';
        ";
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $_SESSION['login'] = "";
            $_SESSION['add'] = "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Tambah Data Berhasil',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            ";
            header ('location:'.SITEURL.'index.php');
        }else{
            $_SESSION['login'] = "";
            $_SESSION ['add'] = "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Tambah Data Gagal',
                    text: 'Gagal Menambahkan Data',
                  })
                </script>
            </div>";
            header('location:'.SITEURL.'action/add.php');
        }
    }
?>