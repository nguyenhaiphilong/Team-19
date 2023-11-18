<?php
require("connect.php");
$query = "SELECT id, Property_Code FROM `property`";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed" . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link rel="shortcut icon" href="image\logo.png">
    <title>Add Full Contract</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    .header {
        width: 100%;
        height: 150px;
        background-color: aqua;

    }
    .header-1 {
        width: 100%;
        height: 80%;
        background-color: white;
        display: flex;
        justify-content: center;
         align-items: center;
    }
    .header-2 {
        width: 100%;
        height: 20%;
        background-color: rgb(0, 0, 0);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    a {
        text-decoration: none;
    }
    .header-2-1 a {
        color: white;
    }
    /* content */
    .content {
        width: 100%;
        height: auto;
    }
    .content-1 {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .content-2 {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .content-2-1 {
        width: 40%;
        height: auto;
        border: 1px solid black;
        justify-content: center;
        align-items: center;
        padding-left: 40px;
        padding-top: 20px;
        padding-right: 40px;
        padding-bottom: 50px;
    }
    th {
        width: 50%;
        text-align: left;
    }
    td {
        width: 50%;
        text-align: left;
    }
    input {
        width: 300px;
        height: 25px;
    }
    .content-2-2 {
        width: 100%;
        height: 50px;
        display: flex;
        justify-content: right;
    }
    #C {
        background-color: rgb(0, 104, 162);
        color: white;
        border: 0;
        padding-top: 5px;
    }
    #C:hover {
        background-image: linear-gradient(-225deg, rgba(0,101,168,0.6) 30%, rgba(0,36,61,0.6) 50%);
    }
    button {
        background-color: rgb(0, 104, 162);
        color: white;
        border: 0;
    }
    button:hover {
        background-image: linear-gradient(-225deg, rgba(0,101,168,0.6) 30%, rgba(0,36,61,0.6) 50%);
    }
    /* footer */
    .footer {
        width: 100%;
        height: 100px;
        background-image: linear-gradient(-225deg, rgba(0,101,168,0.6) 30%, rgba(0,36,61,0.6) 50%);
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
    <div class="header">
        <div class="header-1">
            <div class="header-1-1">
                <img height="115px" src="image\logo.png" alt="">
            </div>
        </div>
        <div class="header-2">
                <div class="header-2-1">
                    <a style="margin-right: 30px;" href="#">Property</a>
                    <a style="margin-left: 90px;" href="index.html">Contract</a>
                </div>
        </div>
    </div>
    <div class="content">
        <div class="content-1">
            <h2>Hợp đồng</h2>
        </div>
        <form action="add.php" method="POST" enctype="multipart/form">
        <div class="content-2">
            <div class="content-2-1">
                <div>
                <table style="width: 100%; text-align: center;">
                    <tr>
                        <th>Mã hợp đồng:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="padding-top: 50px;">Họ tên người mua:</th>
                        <td style="padding-top: 50px;"><input type="text" id="ten" name="ten" required></td>
                    </tr>
                    <tr>
                        <th>Sinh năm:</th>
                        <td><input type="text" id="sinhnam" name="sinhnam" required></td>
                    </tr>
                    <tr>
                        <th>CMND:</th>
                        <td><input type="text" id="CMND" name="CMND" required></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ:</th>
                        <td><input type="text" id="diachi" name="diachi" required></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><input type="text" id="sdt" name="sdt" required></td>
                    </tr>
                    <tr>
                        <th style="padding-top: 50px;">Mã bất động sản:</th>
                        <td style="padding-top: 50px;"><select type="text" id="property" name="property" >
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['Property_Code']. "'>" . $row['Property_Code'] . "</option>";
                                }
                            ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-top: 50px;">Ngày lập hợp đồng:</th>
                        <td style="padding-top: 50px;"><input type="date" id="ngay" name="ngay" required></td>
                    </tr>
                    <tr>
                        <th>Giá trị hợp đồng:</th>
                        <td><input type="text" id="giatri" name="giatri" required>
                    </td>
                    </tr>
                    <tr>
                        <th>Số tiền đã cọc:</th>
                        <td><input type="text" id="stdc" name="stdc" required></td>
                    </tr>
                    <tr>
                        <th>Số tiền còn lại:</th>
                        <td><input type="text" id="stcl" name="stcl" required></td>
                    </tr>
                    <tr>
                        <th>Trạng thái:</th>
                        <td><input type="text" id="tt" name="tt" required></td>
                    </tr>
                </table>
                </div> 
                <div>
                <div class="content-2-2">
                        <a id="C" href="index.php" style="height: 25px; width: 60px; border-radius: 10px; text-align: center; margin-top: 40px; margin-bottom: 40px; margin-right: 40px" action="index.php">Cancel</a>
                        <button style="height: 30px; width: 60px; border-radius: 10px; text-align: center; margin-top: 40px; margin-bottom: 40px; margin-right: 40px" type="submit" name="submit">Add</button>
                </div>
                </div>
            </div>
        </div>  
        </form>
    </div>
    <div class="footer">
        <div>
            <h5>@Copyright by Team Energy</h5>
        </div>
    </div>
</body>
</html>

<?php
require("connect.php");
if(isset($_POST["submit"]) ){
    $Customer_Name = $_POST["ten"];
    $Year_Of_Birth = $_POST["sinhnam"];
    $SSN = $_POST["CMND"];
    $Customer_Address = $_POST["diachi"];
    $Mobile = $_POST["sdt"];
    $Property_ID = $_POST["property"];
    $Date_Of_Contract = $_POST["ngay"];
    $Price = $_POST["giatri"];
    $Deposit = $_POST["stdc"];
    $Remain = $_POST["stcl"];
    $Status = $_POST["tt"];

    if(isset($Customer_Name) && isset($Year_Of_Birth) && isset($SSN) && isset( $Customer_Address) 
    && isset($Mobile) && isset($Property_ID) && isset($Date_Of_Contract) && isset($Price)
    && isset($Deposit) && isset($Remain) && isset($Status)){
        $sql = "INSERT INTO `fullcontract` (`Customer_Name`, `Year_Of_Birth`, `SSN`, `Customer_Address`, `Mobile`, `Property_ID`, `Date_Of_Contract`, `Price`, `Deposit`, `Remain`, `Status`)
        VALUES('$Customer_Name', '$Year_Of_Birth', '$SSN', '$Customer_Address', '$Mobile',' $Property_ID',' $Date_Of_Contract','$Price','$Deposit', '$Remain','$Status')";
        mysqli_query($conn, $sql);
        echo "<script>alert('Bạn đã thêm thành công')</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }
}
?>