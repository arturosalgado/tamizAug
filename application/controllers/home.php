<?php


class home extends MY_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    
    function Content()
    {
        
        return $this->load->view("admin/home_view",$this->data,true);
        
    }
    function getControllerName() {
        return "home";
    }
    
}