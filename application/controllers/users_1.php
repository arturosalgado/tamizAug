<?php

class laboratories extends MY_Controller{
    
    // search terms 
    
    private $search_name = '';
    private $search_folio = '';
    
    private $Model = 'UserModel';
    protected $ViewPath = 'users/';
    
    
    function __construct() {
        parent::__construct();
        
      
    }
    
    
    function Content()
    {
       $this->search_name = $this->phpsession->get("{$this->ViewPath}_search_name"); 
       $this->search_folio = $this->phpsession->get("{$this->ViewPath}_search_folio"); 
       $this->search_inicio = $this->phpsession->get("{$this->ViewPath}_search_inicio"); 
       $this->search_fin =    $this->phpsession->get("{$this->ViewPath}_search_fin");  
        
       if ($this->view=='form') {
       //echo " id ".$this->id;
       $t = new $this->Model($this->id);    
       $t->where('id',  $this->id)->get(1);
      
       //echo $t->nombre;
      // print_r($record);
       
       $this->data['record']=$t;    
       return  $this->load->view("{$this->theme}/{$this->ViewPath}/form",  $this->data,true);     
       }
       else
       {    
           $t = new $this->Model();
           $this->data['record']=$t;
           
           
            $t->start_cache();   
            // search section 
            if ($this->search_name != ''){
            $t->like('nombre',  $this->search_name);   
            $t->or_like('paterno', $this->search_name);
            $t->or_like('materno', $this->search_name);
            }

            //get only the total 
            $t->stop_cache();
            $q =  $t->get_raw();
            $r = $q->num_rows();
           
            $this->totalRecords = $r;
            
            
            
          //  $t->join
           
            $t->get($this->limit,$this->offset);    
            
          
            
            $all = $t->all;
            
            
            $this->data['all']=$all;
            $this->data['pagination']=$this->pagination();
            
            
           return  $this->load->view("{$this->theme}/users/list_view",  $this->data,true);  
        
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
        
        
        
        $t = new $this->Model($id);
       
        
        foreach($_POST as $key =>$field){
           // echo "key is $key ".$field;
           // echo "<br>";
            $t->$key = $this->input->post($key);
        }
        $t->save();
       
        
        if ($_POST['saveType']=='save-list')
           redirect(site_url('/users/all/'));
            
        else if ($_POST['saveType']=='save')
           redirect(site_url("/users/form/{$t->id}"));
           
        else if ($_POST['saveType']=='save-new')
           redirect(site_url("/users/form/"));   
        
        
    }
    
    function formatdate($date)
    {
        list($d,$m,$y)= @split("/",$date);
        $insertDate  = date("Y-m-d",strtotime("$m/$d/$y"));
        return $insertDate;
        
    }
    
    function getControllerName() {
        return __CLASS__;
    }
   
    function search()
    {
        $this->search_name = $this->input->post("nombre");
        $this->search_folio = $this->input->post("folio");
        $this->search_inicio = $this->input->post("inicio");
        $this->search_fin = $this->input->post("fin");
        
        $this->phpsession->set("{$this->ViewPath}_search_name",$this->search_name);
        $this->phpsession->set("{$this->ViewPath}_search_folio",$this->search_folio);
        $this->phpsession->set("{$this->ViewPath}_search_inicio",$this->search_inicio);
        $this->phpsession->set("{$this->ViewPath}_search_fin",$this->search_fin);
        
        //*prevent re-submit form notice */
        redirect(site_url('tamiz/all'));
        //$this->index();
    }
    
    function all()
    {
           $this->index();
    }
    
}