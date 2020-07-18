<html>
<?php
    $nilai = ['72', '65', '73', '78', '75', '74', '90', '81', '87', '65', '55', '69', '72', '78', '79', '91', '100', '40', '67', '77', '86'];
    $jml = count($nilai);
    $sum = array_sum($nilai);
    $rata = $sum/$jml;

    echo "<h2> Nilai Rata-rata </h2>";
    echo "Nilai rata-rata = ".$rata;
    echo "<br>";
    echo "<br>";
    echo "<h2> 7 Nilai Tertinggi </h2>";
    rsort($nilai);
    for ($i=0; $i <= 6 ; $i++) { 
        echo "Nilai tertinggi adalah ".$nilai[$i]."<br>";
    }

    echo "<br>";
    echo "<br>";
    echo "<h2> 7 Nilai Terendah </h2>";
    sort($nilai);
    for ($i=0; $i <= 6 ; $i++) { 
        echo "Nilai terendah adalah ".$nilai[$i]."<br>";
    }

    
?>
</html>