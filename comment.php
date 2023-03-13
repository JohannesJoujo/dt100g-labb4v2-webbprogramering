<?php
session_start();
class comment
{
    private $name;
    private $message;
    private $date;
    function __construct($name, $message){
        $this->name = $name;
        $this->message = $message;
        $this->date = date("Y-m-d H:i:s");
    }

    function get_name(){
        return $this->name;
    }
    function get_message(){
        return $this->message;
    }
    function get_date(){
        return $this->date;
    }
    public function addcomment($obj){
        $a = unserialize(file_get_contents("../writeable/testfile.txt"));
        $a[] = $obj;
        file_put_contents("../writeable/testfile.txt", serialize($a));
    }

    public function deleteComment($index) {
        if(file_exists("../writeable/testfile.txt")){
            $array = unserialize(file_get_contents("../writeable/testfile.txt"));
            $reversedarray=array_reverse($array);
        }
        unset($reversedarray[$index]);
        file_put_contents("../writeable/testfile.txt", serialize($reversedarray));
        header("Location: index.php");
        exit();
    }


}