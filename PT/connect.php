<?php
    $severName = "localhost";
    $userName = "root";
    $pwd = "";
    $nameDB = "quanlybds";

    $conn = mysqli_connect($severName,$userName, $pwd, $nameDB);

    if($conn === false){
        echo "kết nối thất bại";
    }

?>