<?php
// Start the session
ob_start();
session_start();
?>

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
	</header> <!-- end header -->

	<!-- PHP -->	
	<?php

	    require 'functions.php';

	    // Create useful variables to store submission results
	    $success   = FALSE;
	    $errors    = "";

	    // Create the variables and check that they're set.
	    $name = "";
	    if ( isset($_POST["name"]) ) {
	        $_SESSION['name']   = check_input($_POST["name"]);
	        $name               = $_SESSION['name'];
	    }

	    $email = "";
	    if ( isset($_POST["email"]) ) {
	        $_SESSION['email']  = check_input($_POST["email"]);
	        $email              = $_SESSION['email'];
	    }

	    $message = "";
	    if ( isset($_POST["message"]) ) {
	        $_SESSION['message']     = check_input($_POST["message"]);
	        $message                 = $_SESSION['message'];
	    }

	    $rating = "";
    	if ( isset($_POST["rating"]) ) {
        	$_SESSION['rating'] = $_POST["rating"];
        	$rating             = $_SESSION['rating'];
    	}

    	$p_languages = Array();
    	if ( isset($_POST["p_languages"]) ) {
        	$_SESSION['p_languages'] = $_POST["p_languages"];
        	$p_languages             = $_SESSION['p_languages'];
    	}
    	print_r($p_languages);

    	$profession = "";
    	if ( isset($_POST["profession"]) ) {
        	$_SESSION['profession'] = $_POST["profession"];
        	$profession             = $_SESSION['profession'];
    	}



	    // Creating email variables
	    $recipient          = "as898@cornell.edu";
	    $subject            = "New message: $name";
	    $body_message       = "From: $name \n Email: $email \n Rating: $rating \n Profession: $profession \n Programming language: $p_languages \n message: $message";
	    
	    // Generating the checked attribute to rating radio buttons
	    $poor		        = ( $rating == "Poor") ? "checked" : "" ;
	    $ok					= ( $rating == "OK") ? "checked" : "" ;
	    $cool				= ( $rating == "Cool!") ? "checked" : "" ;

	    // Generating the checked attribute to p_languages checkbox array
	    foreach ($p_languages as $key => $value) {
		    $java 				= ( $p_languages == "Java") ? "checked" : "" ;
		    $php				= ( $p_languages == "php") ? "checked" : "" ;
		    $javascript			= ( $p_languages == "javascript") ? "checked" : "" ;
		    $python				= ( $p_languages == "python") ? "checked" : "" ;
		    $ruby 				= ( $p_languages == "ruby") ? "checked" : "" ;
		    $c 					= ( $p_languages == "c") ? "checked" : "" ;
		    $other_lang			= ( $p_languages == "other_lang") ? "checked" : "" ;

			print_r($p_languages[$key]);   
		} 


	    // Generating the select attribute for the dropdown menu - profession
	    $none     			= ( $profession == "Not Specified") ? "selected" : "" ;
	    $web_designer     	= ( $profession == "Web Designer") ? "selected" : "" ;
	    $web_developer  	= ( $profession == "Web Developer") ? "selected" : "" ;
	    $web_producer   	= ( $profession == "Web Producer") ? "selected" : "" ;
	    $web_writer   		= ( $profession == "Web Writer") ? "selected" : "" ;
	    $other_prof     	= ( $profession == "other") ? "selected" : "" ;

	    // Submit Form
    	if ( isset($_POST["submit"]) ) {
	        // Remember that there was a submission.
	        $success = TRUE;

	        // Make sure no required elements are missing.
	        if ( $name == "" ) {
	            $errors .= "<p class =\"notice\">Your name can't be blank.</p>";
	        }
	        if ( strlen($name) < 2 ) {
	            $errors .= "<p class =\"notice\">Your name should be greater than 1 character.</p>";
	        }
	        if ( $email == "" ) {
	            $errors .= "<p class =\"notice\">Your email address can't be blank.</p>";
	        } else if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)  ) {
	            $errors .= "<p class =\"notice\">Please enter a valid email address.</p>";
	        }
    	}


    	// If no errors and a submission
	    $success = !$errors && $success;

	    if ( $success ) {
	        // email send out
	        mail($recipient,$subject,$body_message);
	        add_registered_user($name, $email);

	        // Show thank you message on the thank_you.php page
	        header('Location: thank_you.php');
	        exit;

	    } else {
	        if ($errors) {
	        ?><div class="container-small"><?php
	        	echo "<h4 class='top-margin text-center'><strong>$errors</strong></h4>";
	        ?></div><?php
	      }
	    }
	?>


	<!-- FORM -->
	<div class="container-small">
		<h3 class="text-center top-margin">SHOOT ME A MESSAGE <i class="fa fa-smile-o"></i> </h3>
		<form action="<?php echo($site_root); ?>/php/connect.php" method="post" novalidate> <!-- Remember: novalidate --> 

			<div class="col-1 ">
				<label for="name">Name *</label>
				<input type="text" id="name" name="name" maxlength="30" required autofocus value="<?php echo $name; ?>">
			</div> <!-- end name --> 

			<div class="col-1">
				<label for="email">Email *</label>
				<input type="email" id="email" name="email" maxlength="30" required autofocus value="<?php echo $email; ?>">				
			</div> <!-- end email --> 

			<div class="col-1">
				<label for="message">Message</label>
				<textarea id="message" name="message" cols="60" rows="10" maxlength="500"><?php echo $message; ?></textarea>
			</div> <!-- end message --> 

			<div class="col-2">
				<h4>How do you like this site?</h4>
			</div>
			<div class="col-2">
				<input type="radio" name="rating" value="Poor" <?php echo $poor; ?> > Poor 
				<input type="radio" name="rating" value="OK" <?php echo $ok; ?> > OK 
				<input type="radio" name="rating" value="Cool!" <?php echo $cool; ?> > Cool!
			</div> <!-- end radio button site quality --> 

			<div class="col-1">
				<h4>What are your favorite programming languages?</h4>
				<input type="checkbox" name="p_languages[]" value="java" <?php echo $java ?> > Java
				<input type="checkbox" name="p_languages[]" value="php" <?php echo $php ?> > PHP
				<input type="checkbox" name="p_languages[]" value="javascript" <?php echo $javascript ?> > Javascript
				<input type="checkbox" name="p_languages[]" value="python" <?php echo $python ?> > Python
				<input type="checkbox" name="p_languages[]" value="ruby" <?php echo $ruby ?> > Ruby
				<input type="checkbox" name="p_languages[]" value="c" <?php echo $c ?> > C
				<input type="checkbox" name="p_languages[]" value="other_lang" <?php echo $other_lang ?> > Other
			</div> <!-- end programming languages --> 

			<div class="col-2">
				<h4>What kind of "Web" are you??</h4>
			</div>
			<div class="col-2">
				<select name="profession">
					<option value="Not specified" <?php echo $none; ?> ></option>
					<option value="Web Designer" <?php echo $web_designer; ?> >Web Designer</option>
					<option value="Web Developer" <?php echo $web_developer; ?> >Web Developer</option>
					<option value="Web Writer" <?php echo $web_writer; ?> >Web Writer</option>
					<option value="Web Producer" <?php echo $web_producer; ?> >Web Producer</option>
					<option value="Other" <?php echo $other_prof; ?> >Other</option>
				</select>
    		</div> <!-- end drop down list profession --> 

    		<div class="col-1">
        		<div>
					<button name="submit" id="submit" class="btn-primary" type="submit">Send</button>	   		
        		</div>
    		</div> <!-- end send button --> 
		</form>			
	</div> <!-- end of container-small -->


<?php include '../incs/footer.php'; ?>