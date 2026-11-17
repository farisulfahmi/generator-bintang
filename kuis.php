<?php

$hasil = "";
$error = "";

if(isset($_POST['btn_tampil'])) {
    $tinggi = $_POST['input'];
    $arah = $_POST['arah'];

    if (is_numeric($tinggi) && $tinggi >= 1 && $tinggi <= 20) {
        $t = (int)$tinggi;

        if ($arah == "atas") {
            for ($i = 1; $i <= $t; $i++) {
                $hasil .= str_repeat(" ", $t - $i);
                $hasil .= str_repeat("* ", $i);
                $hasil .= "\n";
            }
        }

        elseif($arah == "bawah") {
            for ($i = $t; $i >= 1; $i--) {
                $hasil .= str_repeat(" ", $t - $i);
                $hasil .= str_repeat("* ", $i);
                $hasil .= "\n";
            }
        }

        elseif($arah == "kiri") {
            for ($i = 1; $i <= $t; $i++) {
                $hasil .= str_repeat("*", $i);
                $hasil .= "\n";
            }
            for ($i = $t - 1; $i >= 1; $i--) {
                $hasil .= str_repeat("*", $i);
                $hasil .= "\n";
            }
        }

        elseif($arah == "kanan") {
            for ($i = 1; $i <= $t; $i++) {
                $hasil .= str_repeat(" ", $t - $i) . str_repeat("*", $i);
                $hasil .= "\n";
            }
            for ($i = $t - 1; $i >= 1; $i--) {
                $hasil .= str_repeat(" ", $t - $i) . str_repeat("*", $i);
                $hasil .= "\n";
            }
        }
    } else {
        $error = "Angka tidak yang valid";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="tinggi">Tinggi bintang : </label><br><br>
        <input type="text" id="tinggi" name="input" required><br><br>
        <label for="posisi">Posisi :</label><br><br>
        <select name="arah" id="posisi">
            <option value="atas">Atas</option>
            <option value="bawah">Bawah</option>
            <option value="kanan">Kanan</option>
            <option value="kiri">Kiri</option>
        </select><br><br>
        <button name="btn_tampil" type="submit">Tampilkan</button>
    </form>

    <?php
    
    if ($error != '') {
        echo "<p style='color:red;'>$error</p>";
    } elseif ($hasil != '') {
        echo "<pre>$hasil</pre>";
    }
    
    ?>
</body>
</html>