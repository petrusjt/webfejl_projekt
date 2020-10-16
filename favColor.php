<?php
//session_start();

if(isset($_SESSION["favColor"]))
{
    switch($_SESSION["favColor"])
    {
        case "piros":
            $favColor = "red";
        break;

        case "zold":
            $favColor = "green";
        break;
    
        case "sarga":
            $favColor = "yellow";
        break;

        case "kek":
            $favColor = "blue";
        break;
        
        case "fekete":
            $favColor = "black";
        break;

        case "feher":
            $favColor = "white";
        break;
    }
    
}
?>