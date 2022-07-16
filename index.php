<?php
/*
 Bản chất của POST GET là mảng không tuần tự
 POST: Dữ liệu gửi bởi POST thông qua HTTP Header, sử dụng $_POST để lấy dữ liệu
 GET: su dung $_GET để lấy dữ liệu

Cookie: luu thong tin o client
Session: luu o server

Cookie gui PHP_Session_ID len theo request, Web server detect PHP_Session_ID de phat hien session
 *  */
// setcookie(name, value, expire,...)
//setcookie("quyet",1223123, 30*3600*24);
//var_dump($_COOKIE);

session_start();
//$_SESSION["key"] = "Quyet";
var_dump($_SESSION["key"]);die();

unset($_SESSION["key"]); // xoa session