<?php
function gcd($a, $b) // gcd untuk menghitung fpb
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function lcm($a, $b)
{
    return abs($a * $b) / gcd($a, $b);
}

function lcm_array($arr)
{
    return array_reduce($arr, 'lcm', 1);
}

function gcd_array($arr)
{
    return array_reduce($arr, 'gcd');
}

function getX($a, $b)
{
    // Step 1: Find the LCM of all elements in array `a`
    $lcm_a = lcm_array($a);

    // Step 2: Find the GCD of all elements in array `b`
    $gcd_b = gcd_array($b);

    // Step 3: Find all factors of gcd_b that are multiples of lcm_a
    $results = [];
    for ($i = $lcm_a; $i <= $gcd_b; $i += $lcm_a) {
        if ($gcd_b % $i == 0) {
            $results[] = $i;
        }
    }

    return $results;
}

// Example usage
$a = [2, 6];
$b = [24, 36];
print_r(getX($a, $b)); // Output should be Array ( [0] => 6 [1] => 12 )
