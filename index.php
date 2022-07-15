<?php

/*

Vong lap for, while, do while, foreach
 *  */
$color = array("R", "G", "B");
foreach ($color as $value){
    echo "$value <br>";
}

foreach ($color as $key => $value){
    echo $key.'_'.$value."<br>"; // lay ra index va gia tri
}