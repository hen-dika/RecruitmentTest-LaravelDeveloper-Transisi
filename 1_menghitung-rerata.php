<?php

$nilai =  "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$arr = explode(" ", $nilai);
/**
 * 1. Nilai rata-rata
 */
    $sum = array_sum($arr);
    $avg = $sum/count($arr);
    echo "Rata-rata: ".$avg."<br>";

/**
 * 2. 7 Nilai tertinggi
 */
    rsort($arr);
    echo "Nilai tertinggi: <br>";
    for ($i=0; $i<7; $i++){
        echo $arr[$i]."<br>";    
    }

/**
 * 3. 7 Nilai terendah
 */
    sort($arr);
    echo "Nilai terendah: <br>";
    for ($i=0; $i<7; $i++){
        echo $arr[$i]."<br>";    
    }
