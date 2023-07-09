<?php

class View{
    public function load($page, $data=array()){
        global $action;
        extract($data,EXTR_SKIP);
        include("./page/$page.php");
    }
}
