<?php

class jurisdictions extends MY_Controller{
    
    
            
    function __construct() {
        parent::__construct();
    }
    
    
    
    function Content()
    {
       $model = new JurisdictionModel(); 
       $data['record']=$model; 
        
       if ($this->view=='form')
       {
            $model = new JurisdictionModel();
            $model->where('id',  $this->id)->get();
            $data['record']=$model;
           
            return $this->load->view("{$this->theme}/jurisdictions/edit",$data,true);
       }
       else
       {
            $model = new JurisdictionModel();
            $data['record']=$model;
            
            $all = $model->get()->all;
            $data['all']=$all;
            
            return $this->load->view("{$this->theme}/jurisdictions/list",$data,true);
       }
        
    }
            
    
    
}