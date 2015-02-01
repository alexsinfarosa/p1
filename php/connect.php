<?php include '../incs/header.php'; ?>

	<!-- HEADER -->
	<header id="header" class="l-header container bg-verde">
		<nav class="col-1 text-center ">
			<ul>
				<li><a href="<?php echo($site_root); ?>/php/work.php">"Work",</a></li>
				<li><a href="<?php echo($site_root); ?>/php/bio.php">"Bio",</a></li>
				<li><a class="active" href="<?php echo($site_root); ?>/php/connect.php">"Connect",</a></li>

				<li><a href="<?php echo($site_root); ?>/index.php">"<span class="icon-reply"></span>"</a></li>
			</ul>
		</nav>
	</header> <!-- /header -->

	<!-- FORM -->
	<div class="container-small">
		<h3 class="text-center top-margin">SHOOT ME A MESSAGE <i class="fa fa-smile-o"></i> </h3>
		<form action="/bio.php" method="post">

			<div class="col-1 ">
				<label for="name">Name *</label>
				<input type="text" class="" id="name">
			</div> <!-- end name --> 

			<div class="col-1">
				<label for="email">Email *</label>
				<input type="email" name="email">				
			</div> <!-- end email --> 

			<div class="col-1">
				<label for="message">Message</label>
				<textarea name="message"></textarea>
			</div> <!-- end message --> 

			<div class="col-2">
				<h4>How do you like this site?</h4>
			</div>
			<div class="col-2">
				<input type="radio" name="site_quality" value="bad"> Poor 
				<input type="radio" name="site_quality" value="ok"> OK 
				<input type="radio" name="site_quality" value="cool"> Cool!
			</div> <!-- end radio button site quality --> 

			<div class="col-2">
				<h4>What kind of "Web" are you??</h4>
			</div>
			<div class="col-2">
				<select name="prefession">
					<option value="web designer" selected>Web Designer</option>
					<option value="web developer">Web Developer</option>
					<option value="web writer">Web Writer</option>
					<option value="web producer">Web Producer</option>
					<option value="freelancer">Freelancer</option>
				</select>
    		</div> <!-- end drop down list profession --> 

    		<div class="col-1">
        		<div>
					<button class="btn-primary" type="submit" class="">Send</button>	   		
        		</div>
    		</div> <!-- end send button --> 
		</form>			
	</div> <!-- end of container-small --> 





















<?php include '../incs/footer.php'; ?>