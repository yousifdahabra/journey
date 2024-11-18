<?php

function merge($left, $right){
    $merged = [];
    $i = $j = 0;
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $merged[] = $left[$i];
            $i++;
        } else {
            $merged[] = $right[$j];
            $j++;
        }
    }
    $merged = array_merge($merged, array_slice($left, $i));
    $merged = array_merge($merged, array_slice($right, $j));
    return $merged;
}
