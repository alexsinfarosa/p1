<?php
// Start the session
// ob_start();
session_start();
    $name           = $_SESSION['name'];
    $email          = $_SESSION['email'];
    $rating         = $_SESSION['rating'];
    $profession     = $_SESSION['profession'];
    $p_languages    = implode(", ", $_SESSION['p_languages']);
    $p_languages    = preg_replace("/0,/","", $p_languages);
    $message        = $_SESSION['message'];
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

    <!-- SUCCESS  -->
    <div class="container-small top-margin">
    	<?php
            echo "<h2 class='top-margin bottom-margin text-center'>Thank You!</h2>";

            echo "<p class ='text-center word-container'> <strong> Name: </strong>                  $name </p>";
            echo "<p class ='text-center word-container'> <strong> Email: </strong>                 $email </p>";
            echo "<p class ='text-center word-container'> <strong> Rating: </strong>                $rating </p>";
            echo "<p class ='text-center word-container'> <strong> Profession: </strong>            $profession </p>";
            echo "<p class ='text-center word-container'> <strong> Programming language: </strong>  $p_languages </p>";
            echo "<p class ='text-center word-container'> <strong> Message: </strong>               $message </p>";

            echo "<p> <a class = 'exit text-center' href='../index.php'>Exit</a> </p>";
            session_destroy();
        ?>
    </div>

<?php include '../incs/footer.php'; ?>