
<?php
include ("pdo.php");
try{

$load = htmlentities(strip_tags($_POST['load']))*2;
$result = $db->prepare("select * from mods ORDER BY id ASC LIMIT " . $load .", 2");
//$result->bindParam(':load', $load);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
  echo "<div class='modItem' style='background-image:url(img/modpage/".$row['image'].".jpg);'><h3>". $row['name']."</h3>";
  echo "<p>" . $row['description'] . "</p>";
  echo "<div class='modlearnMoreBtn'><span>Learn More...</span></div></div>";
	}
}Catch(Exception $e) {
  echo '<p>', $e->getMessage(), '</p>';
  die("");
};
?>
