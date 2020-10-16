<?php
include_once "favColor.php";
?>

<h2 class="mx-auto" style="width: fit-content; padding-top: 5em;">A kedvenc színed: <span style="color: <?php echo $favColor; ?>;"><?php echo $_SESSION["favColor"]; ?></span></h2>

<div id="circle" class="mx-auto" style="background-color: <?php echo $favColor; ?>"></div>