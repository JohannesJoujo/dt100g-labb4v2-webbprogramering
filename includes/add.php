<?php
require_once "comment.php";

if(isset($_POST["submit"])){
    $newcomment = new comment($_POST["namn"], $_POST["meddelande"]);
    file_put_contents("../writeable/testfile.txt", $newcomment->addcomment($newcomment));
}
