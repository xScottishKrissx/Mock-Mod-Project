
<?php
include ("pdo.php");
try{

$load = htmlentities(strip_tags($_POST['load']))*2;
$result = $db->prepare("select * from mods ORDER BY id ASC LIMIT " . $load .", 4");
//$result->bindParam(':load', $load);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)){

  echo "<div class='modItem'>";
  echo "<div class='statsBar'>0 - Views | 0 - Downloads | 0 - Likes </div>";
  echo "<div class='modTitle' style='background-image:url(img/modpage/".$row['image'].".jpg);'>
   <h3>". $row['name']."</h3></div>";
  echo "<div class='modDescription'>" . $row['description'] . "</div>";
  echo "<div class='modlearnMoreBtn'><span>View Mod...</span></div>";
  echo "</div>";
}
}Catch(Exception $e) {
  echo '<p>', $e->getMessage(), '</p>';
  die("");
};
?>
