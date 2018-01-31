//JavaScript
$(document).ready(function(){

  $(".loader").addClass("hide");
  $('.endofResultsMessage').addClass("hide");
  $('.scrollToTop').addClass("hide");


 var load = 0;
    $(".myBtn").on("click",function(){

      console.log("Button pressed");
      $(".loader").removeClass('hide').addClass("show");

      if (load * 2 == ffff-4) {
        console.log("End of Program")
        $('.myBtn').hide();
        $('.endofResultsMessage').removeClass('hide').addClass("show");
        $('.scrollToTop').removeClass('hide').addClass("show");
        $(".loader").addClass("hide");
      }
      else{
        load=load + 2;
        console.log(load);
        $.post("ajax.php", {load:load}, function(data){
          $(".modItemArea").append(data);
          $(".loader").addClass("hide");
        });

      }
  });
  //w3 Schools Solution to Smooth Scrolling
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });


//Contact Form
$('#contactForm').on('submit', function(e){

  e.preventDefault();

  var forename = $("#forename").val();
  var surname = $("#surname").val();
  var subject = $("#subject").val();
  var message = $("#message").val();

  if(forename && surname && subject != ""){
    $.ajax({
      type:"POST",
      url:"submitForm.php",
      data:{'forename':forename,'surname':surname, 'subject':subject,'message':message},
      cache: false,
      success:function(html){
        $("#errorMessage").html(html);
        $("#forename").val("");
        $("#surname").val("");
        $("#subject").val("");
        $("#message").val("");
      }
    });
  }else{
    console.log("Form is empty");
    $('#errorMessage').html("Forename, Surname and the Subject boxes must NOT be empty. Thank you.")
  }

  return false;

  /*$.ajax({
    type:'POST',
    data: $('form').serialize(),
    success: function(data){
      console.log("Form was submitted");
      $("#data").append(data);
      console.log($('input["forename"]'));
    }
  });*/
});


});
