<?php
require_once "comment.php";

if (isset($_POST["radera"])) {
    $delcomment = new comment("","");
    $delcomment->deleteComment($_POST["radera"]);
}