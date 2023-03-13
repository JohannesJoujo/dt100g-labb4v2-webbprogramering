<?php
require_once "comment.php";
require_once "includes/delete.php";
require_once "includes/add.php";
?>

    <!DOCTYPE html>
    <html lang="sv">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <title>Visitors</title>

    </head>
    <body>
    <h1>Joujo's Gästbok</h1>

    <form method="POST">
        Namn: <br> <input type="text" name="namn" id="namn" placeholder="Namn" required>
        <br>
        Meddelande: <br> <textarea id="meddelande" name="meddelande" rows="5" cols="50" placeholder="Skriv en kommentar:" required></textarea>
        <br>
        <input type="submit" name="submit" id="submit" value="Skapa Inlägg">
    </form>
    </body>
    </html>

<?php

echo "<br>";
echo '<a href="../writeable/testfile.txt">Visa datafil</a> <br> <br>';
echo "<h2>Gästboksinlägg</h2>";

if(file_exists("../writeable/testfile.txt")){
    $array = unserialize(file_get_contents("../writeable/testfile.txt"));
}
else{
    $array = array();
}

if(!empty($array)) {
    $reversedarray=array_reverse($array);
    foreach ($reversedarray as $key => $value) {
        print_r($value->get_message() . "<br>"."<br>".
            "Skrivet av: ".$value->get_name() . "<br>"."<br>");
        print_r("Publicerad " . $value->get_date());
        echo '<form method="post"><input type="hidden" name="radera" value="' . $key . '"><input type="submit" name="del" id="del" value="Radera inlägg"></form>';
        echo "<br>";
        echo "<hr>";
    }
}else{
    echo "Det finns inga kommentarer för tillfället";
}
?>