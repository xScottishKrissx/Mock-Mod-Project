<?php include ("header.php"); ?>
<span id="scrollAnchor"></span>
<div class="container">

<div  class="row pageTitle">Mod Gallery</div>
<div class="row modGallery">
    <div class="modItemArea">
      <?php
      include ("pdo.php");

        try{
          $result = $db->prepare("select * from mods WHERE id BETWEEN 1 AND 4");
          $nRows = $db->query('select count(*) from mods')->fetchColumn();
          $result->execute();

          if($result->rowCount() > 0){
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $iterator = new IteratorIterator($result);

            foreach($iterator as $row){

              echo "<div class='modItem'>";
              echo "<div class='statsBar'>0 - Views | 0 - Downloads | 0 - Likes </div>";
              echo "<div class='modTitle' style='background-image:url(img/modpage/".$row['image'].".jpg);'>
               <h3>". $row['name']."</h3></div>";
              echo "<div class='modDescription'>" . $row['description'] . "</div>";
              echo "<div class='modlearnMoreBtn'><span>View Mod...</span></div>";
              echo "</div>";
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
<div class="row myBtn">Load More Mods</div>
<div class="row endofResultsMessage">Oops! No More Results</div>
<div class="row scrollToTop" ><a href="#scrollAnchor">Scroll To Top</a></div>



<script type="text/javascript">
  //This needs to be moved.
  var ffff = '<?php echo $nRows; ?>';
</script>





<?php include ("footer.php"); ?>
