<?php


class home extends MY_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function checkRol() {
       
    }
    function Content()
    {
        $data["s"]='s';
        return $this->load->view("{$this->theme}/home/home",$data,true);
        
        
        
    }
    function getControllerName() {
        return "home";
    }
    
}