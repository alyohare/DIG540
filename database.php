<link rel="stylesheet" href="common.css?v=3">

<form method="get">
  <input type="text" name="sq" placeholder="Search" />
  <input type="submit" value="Go" />
</form>

<?php

define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'atoproje_atouser');
define( 'DB_PASS', 'DIG540!!2024' );
define( 'DB_NAME', 'atoproje_atodatabase');
define( 'DISPLAY_DEBUG', true );
require('db.php');
$database = DB::getInstance();

if (isset($_GET['sq'])) {
    $results = $database->get_results("SELECT * FROM media WHERE title LIKE '%".$_GET['sq']."%' OR description LIKE '%".$_GET['sq']."%'");
} else {
    $results = $database->get_results("SELECT * FROM media ORDER BY date ASC");
}

echo "<table>";
echo "<tr><th>Thumbnail</th><th>Title</th><th>Description</th></tr>";
foreach ($results as $row) {
    echo "<tr>";
    echo "<td>";
    echo '<a href="'.$row["url"].'">';
    echo '<img src="'.$row["url"].'">';
    echo '</a>';
    echo "</td>";
    echo "<td>";
    echo $row["title"]. ' ('.$row['date'].')';
    echo "</td>";
    echo "<td>";
    echo $row["description"];
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

?>