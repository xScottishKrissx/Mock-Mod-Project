<div class="modItem">



<?php
include ("pdo.php");

  try{
  	$result = $db->prepare("select * from mods ORDER BY id DESC LIMIT 1, 1");
  	$result->execute();




    if($result->rowCount() > 0){
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$iterator = new IteratorIterator($result);

			foreach($iterator as $row){
				echo "<h3>". $row['name']."</h3>";
				echo "<p>" . $row['description'] . "</p>";
				echo "<p>".$row['image']."</p>";
      }

      //$db = null;
      }else{
			  echo '<p>No Results could be displayed.</p>';
		}
  }Catch(Exception $e) {
  	die("Oops something went wrong");
  };
?>
</div>
