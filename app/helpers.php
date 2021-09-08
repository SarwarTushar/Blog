<?php


function dateFormate($date){
    $newDate = date('d-M-Y', strtotime($date));
    return $newDate;
}
?>
