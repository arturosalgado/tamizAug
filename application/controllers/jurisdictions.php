<?php

class jurisdictions extends MY_Controller{
    
    
    function __construct() {
        parent::__construct();
    }
    
    
    function form($id = null)
    {
        
        $this->id = $id;
        $this->index();
                
    }    
    
    function Content()
    {
       $model = new EstadoModel(); 
       $data['record']=$model; 
        
       return $this->load->view("admin/catalogs/jurisdictions/edit",$data,true);
        
    }
            
    
    
}