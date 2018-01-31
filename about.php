<?php include ("header.php"); ?>

<?php include ("pdo.php"); ?>

<div class="container">
  <div class="pageContent">
    <div  class="row pageTitle">Contact Form</div>

      <div class="contactFormContainer">

        <form id="contactForm">
          <p>Forename</p> <input type="text" id="forename" name="firstName" placeholder="Enter your forename..." maxlength="100"><br/>

          <p>Surname </p><input type="text" id="surname" name="surname" placeholder="Enter your surname..." maxlength="100"><br/>

          <p>Subject </p><input type="text" id="subject" name="Subject" placeholder="What are you contacting me about?" maxlength="200">

          <br/><br/><textarea name="message" id="message" rows="8" cols="80" placeholder="Enter your message" maxlength="400"></textarea><br/><br/>

          <input type="submit" name="submit" value="Submit" id="contactFormSubmit">
        </form>

      </div>

      <div id="errorMessage"></div>

  </div>
  <?php include ("footer.php"); ?>
</div>
