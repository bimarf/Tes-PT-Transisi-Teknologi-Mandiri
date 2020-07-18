<?php
$kata = 'saya';
echo $kata;
echo "<br>";

$arr = str_split($kata);
    //   $kecil = ['q','w','e','r','t','y',];
        $kecil = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w', 'x', 'y','z'];
    
        $found = array_intersect($kecil, $arr);
    
        $count = array_count_values($arr);

        $sum = array_sum($count);

    
        $result = [];
    
        foreach ($found as $item) {
            $result[$item] = $count[$item];
        }
    
      var_dump($sum);

?>