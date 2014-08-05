<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class log extends MY_Controller
{
    
    
    function __construct() {
        parent::__construct();
    }
    
    
    function getControllerName() {
        return 'log';
    }
    
    
    function load_page()
    {
        
        
        $this->data['main_content']= $this->Content();
        
        return $this->parser->parse("admin/login",$this->data);
        
    }
    
    function in()
    {
        $this->load_page();
        
        
    }
    function authenticate()
    {
        
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->load->library('phpsession');
        $this->phpsession->set("user",$email);
        redirect(site_url());
        
    }
    
    function Content()
    {
        
    }
    
}