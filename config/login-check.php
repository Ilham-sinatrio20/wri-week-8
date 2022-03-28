<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    if(!isset($_SESSION['login'])){
        $_SESSION['check-login'] = 
        "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Akses',
                text: 'Silahkan Login terlebih dahulu!',
            })
        </script>";
        header("location:".SITEURL."login.php");
    }
?>
