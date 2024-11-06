<?php
// Sample data
$records = array(
    "Record 1", "Record 2", "Record 3", "Record 4", "Record 5", "Record 6", "Record 7", "Record 8", "Record 9", "Record 10", "Record 11", "Record 12"
);

// Loop to display records
for ($i = 0; $i < count($records); $i++) {
    // Start a new row
    if ($i % 3 == 0) {
        echo "<div style='display:flex;'>";
    }

    // Display record
    echo "<div style='flex:1; padding:10px; border:dashed 1px green'>" . $records[$i] . "</div>";

    // Close row for the 4th and 5th record or for the 6th and 7th record
    if ($i == 4 || $i == 6|| $i == 7) {
        echo "</div>"; // Close the row
    }

    // Close row for every 3rd record
    if (($i + 1) % 3 == 0) {
        echo "</div>"; // Close the row
    }
}

?>