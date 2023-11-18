<?php
    require("connect.php");
    $sql = "SELECT * FROM `fullcontract`";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link rel="shortcut icon" href="image\logo.png">
    <title>Contract</title>
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
    /* search */
    .search {
        width: 100%;
        height: 80px;
        display: flex;
        justify-content: center;
         align-items: center;
    }
    .search-1 input{
        width: 200px;
        height: 22px;
        padding-left: 10px;
        font-size: 12px;
        border-left: 1px solid rgb(141, 141, 141);
        border-left: 0px;
        border-right: 0px;
        border-top: 0px;
    }
    .search-1 input:hover {
        border-bottom: 1px solid black;
        border-left: 0px;
        border-right: 0px;
        border-top: 0px;
    }
    /* content */
    .content {
        width: 100%;
        height: 500px;
        display: flex;
    }
    .content-1 {
        width: 10%;
        height: auto;
        background-color: rgb(0, 104, 162);
    }
    .content-2 {
        width: 90%;
        height: auto;
        background-color: rgb(220, 220, 220);
        border: 1px solid black;
    }
    td {
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
    }
    th {
        padding-left: 10px;
        padding-right: 10px;
    }
    .content-2-2 {
        display: flex;
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
    <div class="search">
        <div class="search-1"> 
            <input placeholder="Ghi mã hợp đồng" type="text" name="" id="" >
            <button style="border-radius: 15px;">🔍</button>
        </div>
    </div>
    <div class="content">
        <div class="content-1">
        <form style="text-align: center; margin-top: 40px;" action="add.php">
            <button style="height: 50px; width: 130px; border-radius: 10px;">Add Full Contract</button>
        </form>
        <form style="text-align: center; margin-top: 40px;" action="#">
            <button style="height: 50px; width: 130px; border-radius: 10px;">Update Full Contract</button>
        </form>
        </div>
        <div class="content-2">
            <div>
                <h2 style="text-align: center; margin-top: 10px;">Full Contract</h2>
            </div>
            <br>
            <div class="content-2-2">
                <table style="height: 100px; text-align: center; border-bottom: 1px solid black;
                border-top: 0; border-left: 0; border-right: 0;"  width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <th>Mã hợp đồng</th>
                    <th>Họ tên người mua</th>
                    <th>Sinh năm</th>
                    <th>CMND</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Mã bất động sản</th>
                    <th>Ngày lập hợp đồng</th>
                    <th>Giá trị hợp đồng</th>
                    <th>Số tiền đã cọc</th>
                    <th>Số tiền còn lại</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $row["Full_Contract_Code"] ?></td>
                    <td><?= $row["Customer_Name"] ?></td>
                    <td><?= $row["Year_Of_Birth"] ?></td>
                    <td><?= $row["SSN"] ?></td>
                    <td><?= $row["Customer_Address"] ?></td>
                    <td><?= $row["Mobile"] ?></td>
                    <td><?= $row["Property_ID"] ?></td>
                    <td><?= $row["Date_Of_Contract"] ?></td>
                    <td><?= $row["Price"] ?></td>
                    <td><?= $row["Deposit"] ?></td>
                    <td><?= $row["Remain"] ?></td>
                    <td><?= $row["Status"] ?></td>
                    <td style="padding-right: 10px;"><a href="#">Print</a></td>
                </tr>
                <?php }?>
            </table>
        </div>
        </div>
    </div>
    <div class="footer">
        <div>
            <h5>@Copyright by Team Energy</h5>
        </div>
    </div>
</body>
</html>