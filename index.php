<?php

/*

Function()
 * co gia tri tra ve
 * khong co gia tri tra ve
 *
 Require, include: Thêm thư viện
 * Require: sau khi chen file neu co loi xay ra thi se xuat ra thong bao va khong chay tiep nua
 * Include: sau khi chen file neu co loi xay ra thi chương trình van tiep tuc chay 
 *  */

function showName(){
    echo "QUyet";
}

showName();


function getName(){
    return "Quyet";
}

var_dump(getName());

// Tham trị
function showValue($value){
    echo $value."<br>";
}

showValue("Test value");


// Tham chiếu: truyền vào địa chỉ bộ nhớ 

function changeValue(&$value){
    $value = 20;
}

$hi = 10;

changeValue($hi);
var_dump($hi);



