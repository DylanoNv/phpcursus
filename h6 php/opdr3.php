<?php

$nummer = mt_rand(1000, 9999);

$letters = range('A', 'Z');
$l1 = $letters[array_rand($letters)];
$l2 = $letters[array_rand($letters)];

echo "willekeurige postcode is: $nummer $l1$l2";