<?php

function magicSquare($s)
{
    $magicSquares = [
        [[8, 1, 6], [3, 5, 7], [4, 9, 2]],
        [[6, 1, 8], [7, 5, 3], [2, 9, 4]],
        [[4, 9, 2], [3, 5, 7], [8, 1, 6]],
        [[2, 9, 4], [7, 5, 3], [6, 1, 8]],
        [[8, 3, 4], [1, 5, 9], [6, 7, 2]],
        [[4, 3, 8], [9, 5, 1], [2, 7, 6]],
        [[6, 7, 2], [1, 5, 9], [8, 3, 4]],
        [[2, 7, 6], [9, 5, 1], [4, 3, 8]],
    ];

    function cost($s1, $s2)
    {
        $totalCost = 0;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $totalCost += abs($s1[$i][$j] - $s2[$i][$j]);
            }
        }
        return $totalCost;
    }

    $minCost = PHP_INT_MAX;

    // Hitung biaya untuk setiap magic square
    foreach ($magicSquares as $magic) {
        $currentCost = cost($s, $magic);
        if ($currentCost < $minCost) {
            $minCost = $currentCost;
        }
    }

    return $minCost;
}

// Contoh penggunaan
$s = [
    [5, 3, 4],
    [1, 5, 8],
    [6, 1, 6],
];

echo magicSquare($s); // Output biaya minimum
