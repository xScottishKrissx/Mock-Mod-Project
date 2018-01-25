<?php include ("header.php"); ?>
<?php
// Start the session
session_start();
?>
<div class="container">

 <p>Mod Gallery</p>
<div class="row modGallery">
    <div class="modItem">
      <?php
      include ("pdo.php");

        try{
          $result = $db->prepare("select * from mods WHERE id BETWEEN 1 AND 2");
          $result->execute();

          if($result->rowCount() > 0){
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $iterator = new IteratorIterator($result);

            foreach($iterator as $row){
              echo $row['id'];
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
</div>
<button type="button" class="myBtn" name="button">Button</button>
<?php echo "You Win" ?>
</div>







<?php include ("footer.php"); ?>
