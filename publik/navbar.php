<?php
include_once("config.php");
ob_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $id = getUserId($username);
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $data  = mysqli_fetch_array($query);
}

?>
<nav class="navbar navbar-expand-lg navbar-dark warna fixed-top">
    <div class="container">
        <h2><a class="navbar-brand" href="index.php">BatakShop</a></h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="produk.php"> Produk </a>
                </li>
                <?php
                
                // echo $_SESSION['username'];
                        if (isset($_SESSION['username'])) {
                            if ($data['status'] == 'user') {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link active" href="daftar_pesanan.php"> Daftar Pesanan</a>';
                                echo '</li>';
                                echo '<li class="nav-item">';
                                // echo '<a class="nav-link active" href="logout.php?username='.$data['username'].'"> Keluar </a>';
                                echo '<a class="nav-link active" href="logout.php"> Keluar </a>';
                                echo '</li>';
                                
                            }
                        } else {
                            echo '<li class="nav-item">';
                                echo '<a class="nav-link active" href="login.php"> Login </a>';
                            echo '</li>';
                    
                        }
                ?>
                
                
            </ul>
        </div>
        
    </div>
</nav>