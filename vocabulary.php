<?php

$content = file_get_contents("https://raw.githubusercontent.com/alyohare/DIG540/main/02/vocabulary.json");
$content = json_decode($content);

echo "<table>";
echo "<tr><th>Term</th><th>Wikipedia Definition</th></tr>";
foreach ($content as $row) {
    echo "<tr>";
    echo "<td>";
    echo $row->name;
    echo "</td>";
    echo "<td>";
    echo $row->definition;
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

?>