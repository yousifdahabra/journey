<?php
//http://localhost/journey/merge_sort.php?list=[5,2,9,1,5,6]

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

function merge_sort($list){
    if (count($list) === 1) {
        return $list;
    }
    $mid = intval(count($list) / 2);
    $left_part = array_slice($list, 0, $mid);
    $right_part = array_slice($list, $mid);
    $left_part = merge_sort($left_part);
    $right_part = merge_sort($right_part);
    return merge($left_part, $right_part);
}
