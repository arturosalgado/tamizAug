<?php



class catalogs extends MY_Controller
{
    private $catalog=''; 
    private $mode = 'list';
    
    function __construct() {
        
       
        parent::__construct();
    }
    
    
    function Content()
    {
        
       if ($this->mode == 'edit')
       {
           return $this->edits();
           
       }
       else{
           
           return $this->lists(); 
           
       }
        
    }
    function edits()
    {
        //echo "edits : $this->catalog";
        switch($this->catalog)
        {
            
            case 'estado' : return $this->estados_edit(); 
            case 'jurisdictionmodel' : return $this->jurisdiction_edit();      
            
        }
        
    }
    function lists()
    {
         //echo "catalog  [$this->catalog]";
         switch($this->catalog)
        {
            
            case 'states' : return $this->estados_list(); 
            case 'jurisdiction' : return $this->jurisdiction_list();    
            case 'units' : return $this->units_list();   
        }
        
    }
    
   
    function estados_list()
    {
        $e = new EstadoModel();
        $data['record']=$e;
        $all = $e->get()->all;
        $data['all']=$all;
        $data['new']=site_url('catalogs/edit/estado/');
        return $this->load->view("admin/catalogs/states/list",$data,true);
        
        
    }
    
    function jurisdiction_list()
    {
        $e = new JurisdictionModel();
        $data['record']=$e;
        $all = $e->get()->all;
        $data['all']=$all;
       
        return $this->load->view($e->viewPath(),$data,true);
        
        
    }
    function units_list()
    {
        $e = new UnitModel();
        $data['record']=$e;
        $all = $e->get()->all;
        $data['all']=$all;
        $path = $e->viewPath();
       
        return $this->load->view($e->viewPath(),$data,true);
        
        
    }
    
    
    function jurisdiction_edit()
    {
        $record = new JurisdictionModel($this->id);
        $data['record']=$record;
        $data['new']=site_url('catalogs/edit/estado/');
        return $this->load->view("admin/catalogs/jurisdictions/edit",$data,true);
    }
    
    function estados_edit()
    {
        
        
        $record = new EstadoModel($this->id);
       
        $data['record']=$record;
        $data['new']=site_url('catalogs/edit/estado/');
        return $this->load->view("admin/catalogs/states/edit",$data,true);
    }
    
    function process($catalog)
    {
        $this->catalog = $catalog;
        $this->index();
    }
    function edit($catalog,$id = null)
    {
        $this->id = $id;
        $this->mode='edit';
        $this->catalog = $catalog;
        $this->index();
    }
    
    function update($model,$id = null)
    {
        $m = new $model($id);
        
        foreach($_POST as $key=>$val )
        {
           // echo "$key $val";
            $m->$key = $this->input->post($key);
        }
        
        //die();
        $m->save();
        redirect($m->returnPage());
        
    }
    
    
    
    function export($model = '')
    {
        
        $m = new $model();
        echo $m->toJson();
        
    }
}