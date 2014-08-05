<?php

class units extends MY_Controller{
    
    
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
       $model = new UnitModel($this->id); 
       $data['record']=$model; 
        
       return $this->load->view("admin/catalogs/units/edit",$data,true);
        
    }
            
    
    
}