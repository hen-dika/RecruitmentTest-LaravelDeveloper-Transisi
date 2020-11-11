<?php

function hurufKecil ($string) {
    echo '"'.$string.'" mengandung '.preg_match_all("/[a-z]/", $string).' buah huruf kecil.';
}

$input = "TranSISI";
hurufKecil($input);