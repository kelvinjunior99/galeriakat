<script src="view/asset/jquery/jquery-3.6.0.js"></script>
<script src="view/asset/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap -->
<script src="view/asset/jquery/popper.js"></script>
<script src="view/asset/jquerybootstrap.min.js"></script>

<!-- Plugins -->
<script src="view/asset/jqueryowl-carousel.js"></script>
<script src="view/asset/jquery/scrollreveal.min.js"></script>
<script src="view/asset/jquery/waypoints.min.js"></script>
<script src="view/asset/jquery/jquery.counterup.min.js"></script>
<script src="view/asset/jquery/imgfix.min.js"></script> 
<script src="view/asset/jquery/slick.js"></script> 
<script src="view/asset/jquery/lightbox.js"></script> 
<script src="view/asset/jquery/isotope.js"></script> 

<!-- Global Init -->
<script src="view/asset/jquery/custom.js"></script>

<script>

  $(function() {
    var selectedClass = "";
    $("p").click(function(){
      selectedClass = $(this).attr("data-rel");
      $("#portfolio").fadeTo(50, 0.1);
      $("#portfolio div").not("."+selectedClass).fadeOut();
      setTimeout(function() {
        $("."+selectedClass).fadeIn();
        $("#portfolio").fadeTo(50, 1);
      }, 500);

    });
  });

</script>

</body>
</html>