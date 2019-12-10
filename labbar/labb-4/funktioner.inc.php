<?php

function vara($bilder){
    preg_match("/(.*)-([0-9]*).\w*$/", $bilder, $match);
    return $match[1];
}

function pris($bilder){
    preg_match("/(.*)-([0-9]*).\w*$/", $bilder, $match);
    return $match[2];
}

?>
