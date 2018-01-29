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





});
$( window ).resize(function() {
  //$( "" ).append( "<div>Handler for .resize() called.</div>" );

  var windowWidth = $( window ).width();
  if (windowWidth >= 768) {
      console.log("Greater than 768px")
  }else{
    console.log("Less than 768px")
  }
  //console.log("Window is Resizing to " + $( window ).width() + "px");

});
