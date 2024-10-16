 <link rel="stylesheet" href="common.css?v=3">

<?php

$content = file_get_contents("https://ato-projects.com/omeka-s/api/items");
$content = json_decode($content, true);

echo "<table>";
echo "<tr><th>Thumbnail</th><th>Title</th><th>Description</th></tr>";
foreach ($content as $row) {
    echo "<tr>";
    echo "<td>";
    echo '<a href="'.$row["thumbnail_display_urls"]["large"].'">';
    echo '<img src="'.$row["thumbnail_display_urls"]["square"].'">';
    echo '</a>';
    echo "</td>";
    echo "<td>";
    echo $row["o:title"];
    echo "</td>";
    echo "<td>";
    echo $row["dcterms:description"][0]["@value"];
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

?>