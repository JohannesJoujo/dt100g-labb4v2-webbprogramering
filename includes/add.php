<?php
require_once "comment.php";

if(isset($_POST["submit"])){
    $newcomment = new comment($_POST["namn"], $_POST["meddelande"]);
    $newcomment->addcomment($newcomment);
}
