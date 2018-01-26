
<?php
include ("pdo.php");
try{

$load = htmlentities(strip_tags($_POST['load']))*2;
$result = $db->prepare("select * from mods ORDER BY id ASC LIMIT " . $load .", 2");
//$result->bindParam(':load', $load);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
  echo $row['id'];
  echo "<h3>". $row['name']."</h3>";
  echo "<p>" . $row['description'] . "</p>";
  echo "<p>".$row['image']."</p>";
	}
}Catch(Exception $e) {
  echo '<p>', $e->getMessage(), '</p>';
  die("");
};
?>
