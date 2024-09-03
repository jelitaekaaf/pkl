<?php

function encrypt($text)
{
    // Hapus spasi dari teks
    $text = str_replace(' ', '', $text);
    $L = strlen($text);

    // Hitung batasan untuk baris dan kolom
    $floorSqrt = floor(sqrt($L));
    $ceilSqrt = ceil(sqrt($L));

    // Tentukan jumlah baris dan kolom
    $rows = $floorSqrt;
    $cols = $ceilSqrt;
    if ($rows * $cols < $L) {
        $rows++;
    }

    // Buat array untuk menyimpan grid
    $grid = array_fill(0, $rows, '');
    for ($i = 0; $i < $L; $i++) {
        $row = intdiv($i, $cols);
        $col = $i % $cols;
        $grid[$row] .= $text[$i];
    }

    // Baca kolom per kolom dan gabungkan hasilnya
    $result = '';
    for ($col = 0; $col < $cols; $col++) {
        $columnText = '';
        for ($row = 0; $row < $rows; $row++) {
            if (isset($grid[$row][$col])) {
                $columnText .= $grid[$row][$col];
            }
        }
        $result .= $columnText . ' ';
    }

    // Trim hasil akhir dan kembalikan
    return trim($result);
}

// Contoh penggunaan
$text = "saya berjalan di taman sambil menikmati indahnya senja hari";
echo encrypt($text); // Output enkripsi
