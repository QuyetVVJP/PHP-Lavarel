<?php

/*

 * Mảng tuần tự: Truy xuất phần tủ theo index
 * Mảng không tuần tự: index không nhất thiết phải là kiểu int, có thể là chữ, truy xuất phần tử theo key
 * Mảng đa chiều: Giống như json
 *  */

//$a = [1,2,3];
//echo $a[2]; // 3

$a = [
    "key1" => 1,
    "key2" => 2,
    "key4" =>[
        1,
        "item1" => "ABC"
    ]
];
$a["key3"] = 3;
var_dump($a);