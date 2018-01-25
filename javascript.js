//JavaScript
$(document).ready(function(){


  //If I Cant get this to work
  // I might attach the load to a button
 /*
  $(window).scroll(function() {
     if($(window).scrollTop() + $(window).height() == $(document).height()) {
        console.log("end of page");
     }
  });
*/
  var load = 0;
  $(".myBtn").on("click",function(){
      console.log("Button pressed");
      load=load + 1;
      console.log(load);
      $.post("ajax.php", {load:load}, function(data){
        $(".modItem").append(data);
      });
  });


});
