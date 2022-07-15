<?php

// Khai bao bien 
// Ky tu $
// Khi khoi tao bien, bat buoc phai co gia tri cho bien
// Ten bien khong duoc bat dau bang so
// Ten bien phan biet chua hoa chu thuong, apha, _

/*
 Kieu du lieu
 * boolean
 * int
 * double
 * float
 * string
 * array 
 * object
 * 
 * 
 * Pham vi 
 * Bien toan cuc: Duoc truy cap tu bat cu dau, nhung phai co tu khoa GLOBAL o phia truoc bien
 * Bien cuc bo: bien khai bao trong 1 ham
 * bien static: Bien tinh, khong mat khi ket thuc ham
 *  */




function test_var(){
    $x = 0;  // bien cuc bo
    global $y; // bien toan cuc
    static $s= 2;
}