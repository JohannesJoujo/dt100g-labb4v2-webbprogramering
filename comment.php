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
    function __destruct(){ }

    public function addcomment($obj){
        $a = unserialize(file_get_contents("../writeable/testfile.txt"));
        $a[] = $obj;
        return serialize($a);
    }

    public function deleteComment($index) {
        $array = array();
        if(file_exists("../writeable/testfile.txt")){
            $array = unserialize(file_get_contents("../writeable/testfile.txt"));
            $arr=array_reverse($array);
        }
        unset($arr[$index]);
        file_put_contents("../writeable/testfile.txt", serialize($arr));
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }


}