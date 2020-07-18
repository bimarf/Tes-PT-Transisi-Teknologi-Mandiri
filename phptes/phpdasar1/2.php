<?php

function hitung_kecil($kata){
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
    
      return $result;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Huruf Kecil</title>
</head>
<body>
    <h1>Hitung Huruf Kecil</h1>

    <form method="POST" action="<?php $PHP_SELF ?>">
        <P>
        Kata : <br>
        <input type="text" name="kata">
        </P>
        <p>
        <button type="submit">Hitung</button>
        </p>
    </form>
    <?php if ($_POST && isset($_POST['kata'])): ?>
        <hr>
        <table border ="1">
            <?php foreach (hitung_kecil($_POST['kata']) as $huruf => $jumlah ): ?>
                <tr>
                    <td style="width:100px"><?php echo $huruf ?></td>
                    <td style="width:100px"><?php echo $jumlah ?></td>
                </tr>
            <?php endforeach ?>

        </table>

    <?php endif ?>
</body>
</html>