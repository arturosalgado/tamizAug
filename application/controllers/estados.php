<?php

class estados extends MY_Controller{
    
    
    function __construct() {
        parent::__construct();
    }
    
    
  
    function Content()
    {
       $model = new EstadoModel(); 
       $data['record']=$model; 
        
       if ($this->view=='form')
       {
            $t = new EstadoModel();
            $t->where('id',  $this->id)->get();
            $data['record']=$t;
           
            return $this->load->view("{$this->theme}/states/edit",$data,true);
       }
       else
       {
            $s = new EstadoModel();
            $data['record']=$s;
            
            $all = $s->get()->all;
            $data['all']=$all;
            
            return $this->load->view("{$this->theme}/states/list",$data,true);
       }
        
    }
        
    
    
    
}