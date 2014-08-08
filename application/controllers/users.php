<?php

class users extends MY_Controller{
    
    // search terms 
    
    private $search_name = '';
    private $search_folio = '';
    
    function __construct() {
        parent::__construct();
        
      
    }
    
    
    function Content()
    {
       if ($this->view=='form') {
       //echo " id ".$this->id;
       $t = new TamizModel($this->id);    
       $t->where('id',  $this->id)->get(1);
      
       //echo $t->nombre;
      // print_r($record);
       
       $this->data['record']=$t;    
       return  $this->load->view("{$this->theme}/tamiz/form",  $this->data,true);     
       }
       else
       {    
           $t = new TamizModel();
           $this->data['record']=$t;
           
            // search section 
            if ($this->search_name != ''){
            $t->like('nombre',  $this->search_name);   
            $t->or_like('apellido_paterno', $this->search_name);
            $t->or_like('apellido_materno', $this->search_name);
            }

            if ($this->search_folio != ''){
             $t->where('folio',  $this->search_folio);   
            }
           
  
           
            
            
            
          //  $t->join
           
           $t->get();    
               
           $all = $t->all;
           $this->data['all']=$all;
           return  $this->load->view("{$this->theme}/tamiz/list_view",  $this->data,true);  
        
       } 
        
    }
    
    
    function form($id = null)
    {
        $this->id = $id;
       // echo $this->id;
        $this->view = 'form';
       $this->index();
        
    }
    function update($id = null)
    {
        
        
        //print_r($_POST);
        //die();
        $t = new TamizModel($id);
        
        
        $_POST['fechadenacimiento']= $this->formatdate($_POST['fechadenacimiento']);
        $_POST['fechademuestra']= $this->formatdate($_POST['fechademuestra']);
      
      
        
        foreach($_POST as $key =>$field){
           // echo "key is $key ".$field;
           // echo "<br>";
            $t->$key = $this->input->post($key);
        }
        $t->save();
        redirect(site_url("/tamiz/"));
        
    }
    
    function formatdate($date)
    {
        list($d,$m,$y)= @split("/",$date);
        $insertDate  = date("Y-m-d",strtotime("$m/$d/$y"));
        return $insertDate;
        
    }
    
    function getControllerName() {
        return 'tamiz';
    }
   
    function search()
    {
        $this->search_name = $this->input->post("name");
        $this->search_folio = $this->input->post("folio");
        $this->index();
    }
    
}