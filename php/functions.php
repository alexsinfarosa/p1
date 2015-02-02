<?php

// It adds the user name and email to the mailing_list.txt file
function add_registered_user ($name,$email) {
	file_put_contents('../mailing_list.txt', "$name: $email\n", FILE_APPEND);
}

// It allows to insert only particular characters into the input fields
function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>