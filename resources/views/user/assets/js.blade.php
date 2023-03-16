    <!-- jQuery -->
    <script src="user/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="user/assets/js/popper.js"></script>
    <script src="user/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="https://kit.fontawesome.com/495c8b4cb1.js" crossorigin="anonymous"></script>
    <script src="user/assets/js/owl-carousel.js"></script>
    <script src="user/assets/js/accordions.js"></script>
    <script src="user/assets/js/datepicker.js"></script>
    <script src="user/assets/js/scrollreveal.min.js"></script>
    <script src="user/assets/js/waypoints.min.js"></script>
    <script src="user/assets/js/jquery.counterup.min.js"></script>
    <script src="user/assets/js/imgfix.min.js"></script> 
    <script src="user/assets/js/slick.js"></script> 
    <script src="user/assets/js/lightbox.js"></script> 
    <script src="user/assets/js/isotope.js"></script>
    <script src="user/assets/js/quantity.js"></script>
    <!-- cart -->
    <script src="user/assets/js/jquery.nice-select.min.js"></script>
    <script src="user/assets/js/jquery-ui.min.js"></script>
    <script src="user/assets/js/jquery.slicknav.js"></script>
    <script src="user/assets/js/mixitup.min.js"></script>
    <script src="user/assets/js/owl.carousel.min.js"></script>
    <script src="user/assets/js/main.js"></script>
    <!-- /cart -->
    <!-- Global Init -->
    <script src="user/assets/js/custom.js"></script>

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