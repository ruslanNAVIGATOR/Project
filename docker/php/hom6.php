<?php
function units($first, $second, $third, $count = 1){

    if ($count - round($count) != 0) {
        $output = $first;
    } else {
        if ($count % 10 == 1 && $count % 100 != 11) {
            $output = $first;
        } elseif ($count % 10 >= 2 && $count % 10 <= 4 && ($count % 100 >= 20 || $count % 100 < 10)) {
            $output = $second;
        } else {
            $output = $third;
        }
    }
    return $output;
}
