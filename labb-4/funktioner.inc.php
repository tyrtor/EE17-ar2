<?php
function vara($bilden){
    $delar1 = explode('.', $bilden);
    $delar2 = explode('-', $delar1[0]);
    array_pop($delar2);
    $vara = implode(' ', $delar2);

    return $vara;
}
function pris($bilden){
    $delar1 = explode('.', $bilden);
    $delar2 = explode('-', $delar1[0]);
    $pris = array_pop($delar2);

    return $pris;
}
?>
