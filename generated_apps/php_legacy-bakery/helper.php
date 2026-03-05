<?php
// Global variables for everything!
$i = array(
    'Butter Croissant' => 3.50,
    'Pain au Chocolat' => 4.00,
    'Espresso' => 2.50,
    'Latte' => 4.50,
    'Cinnamon Roll' => 4.50,
    'Large Oat Milk Latte' => 5.50
);

function get_price($n) {
    global $i;
    if (isset($i[$n])) return $i[$n];
    return 0;
}
?>
