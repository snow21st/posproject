  	<footer class="py-3 mt-5">
    	<div class="container">
    		<div class="text-center pb-3">
				<a href="#myPage" title="To Top" class="text-white to_top text-decoration-none">
				    <i class="icofont-rounded-up" style="font-size: 20px"></i>
				</a>
			</div>

      		<p class="m-0 text-center text-white">Copyright &copy; <img src="logo/logo_wh_transparent.png" style="width: 30px; height: 30px"> 2019</p>
    	</div>
  	</footer>








	<script type="text/javascript" src="frontend/js/jquery.min.js"></script>
	<!-- BOOTSTRAP JS -->
    <script type="text/javascript" src="frontend/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script type="text/javascript" src="frontend/js/custom.js"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="frontend/js/owl.carousel.js"></script>
    <script type="text/javascript" src="frontend/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="custom.js"></script>

  <script>
   
    jQuery('.validatedForm').validate({
            rules : {
                password : {
                    minlength : 5
                },
                confirmpassword : {
                    minlength : 5,
                    equalTo : "#inputPassword"
                },

                  
            },
            messages: {
                    confirmpassword:
          "Password do not match"
         
        
        },


        });


  </script>


</body>
</html>