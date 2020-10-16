<?php

session_start();


include "header.html";

if(isset($_SESSION["username_error"]))
{
    include "user_error.php";
    include "home.php";
}
else if(isset($_SESSION["password_error"]))
{
    include "pass_error.php";
}
else if(!isset($_SESSION["username"]))
{
    include "home.php";
}
else if(isset($_SESSION["username"]))
{
    include "loggedin.php";
}

include "footer.html";

if(isset($_SESSION["username_error"])) unset($_SESSION["username_error"]);
if(isset($_SESSION["password_error"])) unset($_SESSION["password_error"]);
if(isset($_SESSION["username"]))
{
    unset($_SESSION["username"]);
    unset($_SESSION["favColor"]);
}

?>