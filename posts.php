<link rel="stylesheet" href="common.css?v=3">

<?php

$content = file_get_contents("https://ato-projects.com/wpcollection/?rest_route=/wp/v2/posts");
$content = json_decode($content, true);

echo "<table>";
echo "<tr><th>Thumbnail</th><th>Title</th><th>Description</th></tr>";
foreach ($content as $row) {
    $image = file_get_contents($row["_links"]["wp:featuredmedia"][0]["href"]);
    $image = json_decode($image, true);
    echo "<tr>";
    echo "<td>";
    echo '<a href="'.$row["guid"]["rendered"].'">';
    echo '<img src="'.$image["guid"]["rendered"].'">';
    echo '</a>';
    echo "</td>";
    echo "<td>";
    echo $row["title"]["rendered"];
    echo "</td>";
    echo "<td>";
    echo $row["excerpt"]["rendered"];
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

?>