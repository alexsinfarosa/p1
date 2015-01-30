	<!-- FOOTER --> 
	<footer class="l-footer container-fluid">
		<div class="container text-center">
			<div class="row">
				<p class="col-lg-8 text-left">&copy; 2015 | Designed by <span = class="author">Alex Sinfarosa</span></p>	
				<ul class="col-lg-4 l-list-inline text-right">
					<li><a href="https://www.facebook.com/ShuaGroup" target="_blank" class="social-icon"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://www.vimeo.com/ShuaGroup" target="_blank" class="social-icon"><i class="fa fa-twitter"></i></a></li>
					<li><a href="mailto:info@shuagroup.org" class="social-icon"><i class="fa fa-envelope"></i></a></li>
				</ul>
			</div>
		</div>
	</footer>
	
	

	<!-- JQuery -->
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- MAIN -->
	<script src="<?php echo($site_root); ?>/js/scripts.js"></script>

	<script>
	    jQuery(document).ready(function() {
	        var offset = 220;
	        var duration = 500;
	        jQuery(window).scroll(function() {
	            if (jQuery(this).scrollTop() > offset) {
	                jQuery('.go_top').fadeIn(duration);
	            } else {
	                jQuery('.go_top').fadeOut(duration);
	            }
	        });

	        jQuery('.go_top').click(function(event) {
	            event.preventDefault();
	            jQuery('html, body').animate({scrollTop: 0}, duration);
	            return false;
	        })
	    });
	</script>


	</body>
</html>