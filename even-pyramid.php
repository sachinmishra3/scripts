<?php


function drawEvenNumberPyramid($rows) {
    $currentEven = 1;
    for ($i = 1; $i <= $rows; $i++) {
            // Print spaces for alignment
            for ($j = $i; $j < $rows; $j++) {
                echo "   "; // Three spaces for better alignment
            }
            
            // Print even numbers
            for ($k = 1; $k <= $i; $k++) {
                echo str_pad($currentEven, 3, " ", STR_PAD_LEFT) . " ";
                $currentEven += 2;
            }
        
        // Move to the next line
        echo "<br/>";
    }
}

// Specify the number of rows
$numberOfRows = 5;
drawEvenNumberPyramid($numberOfRows);

?>