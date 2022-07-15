<?php

/*

 * Chuỗi để trong dấu ngoặc kép hoặc ngoặc đơn
 * - Dấu ngoặc kép "", các biến bên trong chuỗi sẽ được parse
 * - Dấu ngoặc đơn '', các biến bên trong chuỗi không được parse
 *  */

$a = "Quyet";
$b = "Hello $a";
echo $b; // Hello Quyet

$c = 'Hello $a';
echo $c; // Hello $a

// Nối chuỗi
echo $a.$b; // Quyet Hello
// Lấy độ dài chuỗi
echo strlen($c);

// Đếm số từ trong chuỗi
echo str_word_count($c);

// Tìm kiếm trong chuỗi
echo strpos("hello world", "world"); // trả về vị trí bắt đầu của từ world là vị trí thứ 6


// Thay thế ký tự trong chuỗi
echo str_replace("world", "Quyet", "Hello world"); // output: Hello Quyet




