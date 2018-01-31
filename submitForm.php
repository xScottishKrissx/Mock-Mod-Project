<?php include("pdo.php") ?>

<?php

  try{
    $forename = htmlentities(strip_tags($_POST['forename']));
    $surname = htmlentities(strip_tags($_POST['surname']));
    $subject = htmlentities(strip_tags($_POST['subject']));
    $message = htmlentities(strip_tags($_POST['message']));

    $result = $db->prepare("INSERT INTO contactform (forename, surname, subject, message ) VALUES (:forename, :surname, :subject, :message) ");

    $result->bindParam(':forename', $forename);
    $result->bindParam(':surname', $surname);
    $result->bindParam(':subject', $subject);
    $result->bindParam(':message', $message);

    $test1 = var_dump($result);
    $result->execute();

    //Purely for demonstrating the form works corectly
    $result = $db->prepare("select * from contactform ORDER BY id DESC LIMIT 1");
    $result->execute();

    if($result->rowCount() > 0){
      $result->setFetchMode(PDO::FETCH_ASSOC);
      $iterator = new IteratorIterator($result);

      foreach($iterator as $row){
          echo "<p>Your forname :" . $row['forename'] . "</p>";
          echo "<p>Your surname :" . $row['surname'] . "</p>";
          echo "<p>Your subject :" . $row['subject'] . "</p>";
          echo "<p>Your message :" . $row['message'] . "</p>";
      }

      //$db = null;
      }else{
        echo '<p>No Results could be displayed.</p>';
    }

  }Catch(Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
    die("");
  };



?>

<?php
/*
Previous Attempts
try{
$forename = $_POST['forename'];

$result = $db->prepare("insert into contactform (forename, surname) values ($forename, 'dunne') ");
//$result->bindParam(':load', $load);
$result->execute();
echo "Added to Database";

}Catch(Exception $e) {
  echo '<p>', $e->getMessage(), '</p>';
  die("");
};

*/

 ?>
