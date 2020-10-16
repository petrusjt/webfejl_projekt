<?php

session_start();

require_once "mysql.php";
require_once "readuserdata.php";

if(isset($_POST["submit"]))
{
    $password = "";

    if(isset($_POST["email"]))
    {
        try
        {
            if(isInDecrypted($_POST["email"]))
            {
                $password = getPassword($_POST["email"]);
            }
        }
        catch(Exception $ex)
        {
            $_SESSION["username_error"] = true;
            header("Location: index.php");
        }
    }

    if(isset($_POST["password"]))
    {
        if($password == $_POST["password"])
        {
            

            $_SESSION["username"] = $_POST["email"];
            $selectColor->execute([$_POST["email"]]);
            $_SESSION["favColor"] = $selectColor->fetchAll()[0][0]; 
        }
        else
        {
            $_SESSION["password_error"] = true;
            header("Location: index.php");
        }
    }
}

header("Location: index.php");

?>