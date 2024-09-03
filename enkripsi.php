<?php

function encrypt($text)
{
    // Hapus semua spasi
    $text = str_replace(' ', '', $text);
    $L = strlen($text);

    if ($L == 0) {
        return '';
    }

    // Tentukan dimensi grid
    $root = sqrt($L);
    $rows = floor($root);
    $cols = ceil($root);

    while ($rows * $cols < $L) {
        $rows = ($rows < $cols) ? $rows + 1 : $rows;
        $cols = ($rows >= $cols) ? $cols + 1 : $cols;
    }

    // Isi grid dan baca kolom
    $result = [];
    for ($col = 0; $col < $cols; $col++) {
        $columnChars = '';
        for ($row = 0; $row < $rows; $row++) {
            $index = $row * $cols + $col;
            if ($index < $L) {
                $columnChars .= $text[$index];
            }
        }
        $result[] = $columnChars;
    }

    // Gabungkan hasil dengan spasi
    return implode(' ', $result);
}

// Contoh penggunaan
$text = "saya berjalan di taman sambil menikmati indahnya senja hari";
echo encrypt($text);
