<?php

class units extends MY_Controller{
    
    
    function __construct() {
        parent::__construct();
    }
    
    
   
    
    function Content()
    {
       $model = new UnitModel(); 
       $data['record']=$model; 
        
       if ($this->view=='form')
       {
            $t = new UnitModel();
            $t->where('id',  $this->id)->get();
            $data['record']=$t;
           
            return $this->load->view("{$this->theme}/units/edit",$data,true);
       }
       else
       {
            $s = new UnitModel();
            $data['record']=$s;
            
            $all = $s->get()->all;
            $data['all']=$all;
            
            return $this->load->view("{$this->theme}/units/list",$data,true);
       }
        
        
    }
            
    
    
}