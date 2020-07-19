<?php

    $arr = [
        ['f', 'g', 'h', 'i'],
        ['j', 'k', 'p', 'q'],
        ['r', 's', 't', 'u']
       ];
    
    $cari = strpos($arr, "fghi");

    if ($cari == TRUE) {
        echo "ketemu";
    } else {
        echo "tidak ditemukan";
    }
    


?>