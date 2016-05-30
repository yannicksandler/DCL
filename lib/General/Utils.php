<?php
function currency($number, $symbol = '$', $separator = ' '){
    return $symbol . $separator .$number;
}