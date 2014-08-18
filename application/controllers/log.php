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
    function out()
    {
        $this->load->library('phpsession');
        $this->phpsession->destroy();
        redirect(site_url());
    }
    function in()
    {
        $this->load_page();
        
        
    }
    function authenticate()
    {
        
        $salt = 'abczyx';
        
        /*
         * TODO ADD TOKEN TO VERIFY WE COME FROM THE SAME SITE
         */
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $roles[1]="Administrador";
        $roles[2]="Supervisor";
        $roles[3]="Capturista";
        $roles[4]="Laboratorio";
        $roles[5]="Estado";
        $roles[6]="SSA";
        
        $u = new UserModel();
        $u->where('email',$email);
        $u->where('password',sha1($salt.$password));
        $u->get(1);
        if (!empty(intval($u->id)))
        {
            //echo $roles[$u->role_id];die();
            $this->load->library('phpsession');
            $this->phpsession->set("user",$email);
            $this->phpsession->set("role",$roles[$u->role_id]);
            $this->phpsession->set("name",$u->nombre);
            redirect(site_url()); 
        }
        
        redirect(site_url('log/in'));
       
        
    }
    
    function Content()
    {
        
    }
    
}