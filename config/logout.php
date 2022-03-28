<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    // include('checking/menu.php'); 
        include('connect.php');
        if(isset($_SESSION['visitor']) || isset($_SESSION['visit'])){
            $username = $_SESSION['visit'];
        }
        unset($_SESSION['login']);
        $turn = "UPDATE user SET status = false WHERE username = '$username'";
        $periksa = mysqli_query($conn, $turn);
        if($periksa == true){
            $_SESSION['logout'] = "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Terima Kasih',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
            header("location:".SITEURL."login.php");
        } 
?>