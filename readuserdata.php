<?php

$userdata = fopen("password.txt", "r") or die("Unable to open required file!");
$fileContents = [];

$key = [5, -14, 31, -9, 3];

while(!feof($userdata))
{
    $fileContents[] = fgets($userdata);
}

array_pop($fileContents);

$decryptedFileContents = [];

for($i = 0; $i < count($fileContents); $i++)
{
    $decryptedFileContents[] = "";
    for($j = 0; $j < strlen($fileContents[$i]) - 1; $j++)
    {
        $decryptedChar = chr(ord($fileContents[$i][$j]) - $key[$j % count($key)]);
        $decryptedFileContents[$i] .= $decryptedChar;
    }
}

for($i = 0; $i < count($decryptedFileContents); $i++)
{
    $decryptedFileContents[$i] = explode("*", $decryptedFileContents[$i]);
}

fclose($userdata);

function isInDecrypted($name)
{
    global $decryptedFileContents;
    foreach($decryptedFileContents as list($email, $password))
    {
        if($email == $name)
        {
            return true;
        }
    }
    throw new Exception("$name not found!");
}

function getPassword($name)
{
    global $decryptedFileContents;
    foreach($decryptedFileContents as list($email, $password))
    {
        if($email == $name)
        {
            return $password;
        }
    }

    throw new Exception("$name not found!");
}

// if(isset($_GET["asd"]))
// {
//     echo "<pre>";
//     print_r($decryptedFileContents);
// }

?>