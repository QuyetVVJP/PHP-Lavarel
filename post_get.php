<?php
/*

 POST: Dữ liệu gửi bởi POST thông qua HTTP Header, sử dụng $_POST để lấy dữ liệu
 GET: su dung $_GET để lấy dữ liệu, tren url se co thong tin du lieu 
 *
 * isset : kiem tra theo bien ton tai
 *  */

//    if(isset($_GET["name"]) && isset($_GET["age"]) ){
//        echo "Welcome ".$_GET['name']. "<br />";
//        echo "You are ".$_GET['age']." years old.";
//        
//        die();
//    }
    
    if(isset($_POST["name"]) && isset($_POST["age"]) ){
        echo "Welcome ".$_POST['name']. "<br />";
        echo "You are ".$_POST['age']." years old.";
        
        die();
    }
?>

<!-- Lay du lieu tu 2 bien input ben duoi gui len ben tren de hien thi ra -->
<html>
    <body>
        <form action="post_get.php" method="POST">
            Name: <input type="text" name="name"/>
            Age: <input type="text" name="age" />
            <input type="submit" />
        </form>
    </body>
</html>
