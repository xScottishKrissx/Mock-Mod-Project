<?php include ("header.php"); ?>

<div class="container">

 <p>Mod Gallery</p>
<div class="row modGallery">
    <div class="modItem">
      <?php
      include ("pdo.php");

        try{
          $result = $db->prepare("select * from mods WHERE id BETWEEN 1 AND 2");
          $nRows = $db->query('select count(*) from mods')->fetchColumn();
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

<div class="loader">
  <img src="img/loader.gif" alt="results_loading" />
</div>
<button type="button" class="myBtn" name="button">Button</button>
<div class="endofResultsMessage">Oops! No More Results</div>

</div>

<script type="text/javascript">
  var ffff = '<?php echo $nRows; ?>';
</script>





<?php include ("footer.php"); ?>
