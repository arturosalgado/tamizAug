<?php

class tamiz extends MY_Controller{
    
    // search terms 
    
    private $search_name = '';
    private $search_folio = '';
    private $search_inicio = '';
    private $search_fin = '';
    
    private $offset = 0;
    private $limit = 20;
    private $totalRecords = 0;
    function __construct() {
        parent::__construct();
        
        $segs = $this->uri->segment_array();

        foreach ($this->uri->uri_to_assoc() as $key =>$segment)
        {
           $this->$key = $segment;
         
        }
    }
    
    
    function Content()
    {
       $this->search_name = $this->phpsession->get("tamiz_search_name"); 
       $this->search_folio = $this->phpsession->get("tamiz_search_folio"); 
       $this->search_inicio = $this->phpsession->get("tamiz_search_inicio"); 
       $this->search_fin =    $this->phpsession->get("tamiz_search_fin"); 
       
        
       if ($this->view=='form') {
       //echo " id ".$this->id;
       $t = new TamizModel($this->id);    
       $t->where('id',  $this->id)->get(1);
      
      
       $this->data['record']=$t;    
       return  $this->load->view("{$this->theme}/tamiz/form",  $this->data,true);     
       }
       else
       {    
           $t = new TamizModel();
           $this->data['record']=$t;
           
           
           $t->start_cache();   
           
            // search section 
            if ($this->search_name != ''){
            
            $t->like('nombre',  $this->search_name);   
            $t->or_like('apellido_paterno', $this->search_name);
            $t->or_like('apellido_materno', $this->search_name);
            }

            if ($this->search_folio != ''){
             $t->where('folio',  $this->search_folio);   
            }
            
            $t->stop_cache();
            $q =  $t->get_raw();
       
            $r = $q->num_rows();
           
            $this->totalRecords = $r;
            
            
          //  $t->join
           //$t->get();    
           
           //echo $this->totalRecords=$t->result_count();
           ECHO "<BR>";
           $t->get($this->limit,$this->offset);    
           //echo $this->totalRecords=$t->result_count();
           
           $all = $t->all;
           $this->data['all']=$all;
           
           $this->data['pagination']=$this->pagination();

           //search values 
           
           $this->data['search_name']=  $this->search_name;
           $this->data['search_folio']=  $this->search_folio;
           $this->data['search_inicio']=  $this->search_inicio;
           $this->data['search_fin']=  $this->search_fin;
           
           
           return  $this->load->view("{$this->theme}/tamiz/list_view",  $this->data,true);  
        
       } 
        
    }
    /*combina la paginacion con el uri que puede ser dinamico*/
    function pagination()
    {
          //$segment =4; 
        
          $this->load->library('pagination');

            $assoc = $this->uri->uri_to_assoc();
          
            unset($assoc['offset']);// so it doesnt append the offset/20/60
            
            $url = $this->uri->assoc_to_uri($assoc);
            //echo "count is"; echo count($assoc)."---";
            $config['base_url'] = site_url("tamiz/all/{$url}/offset/");//better always at the end
            $config['total_rows'] = $this->totalRecords;
            $config['per_page'] = $this->limit; 
            //echo "{count}[["; echo count($assoc)*2+3;
            $config['uri_segment'] =  count($assoc)*2+4;
            
            
            
            $this->pagination->initialize($config); 
            
            return $this->pagination->create_links();  
        
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
        
        if ($id ==null and !$this->folioExist($t->folio)) // id null==first time save
        $t->save();
        else if ($id!=null) {
          $t->save();// just an update
        }
            
        
        
        
        if ($_POST['saveType']=='save-list')
           redirect(site_url('tamiz/all/'));
            
        else if ($_POST['saveType']=='save')
           redirect(site_url("tamiz/form/{$t->id}"));
           
        else if ($_POST['saveType']=='save-new')
           redirect(site_url("tamiz/form/"));   
        
    }
    function folioExist($folio)
    {
        
        $t = new TamizModel();
        $t->where('folio',$folio)->get();
        if ($t->id)
        {
           return true;
            
        }
        else {
          return false;
        }
       
        
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
        $this->search_name = $this->input->post("nombre");
        $this->search_folio = $this->input->post("folio");
        $this->search_inicio = $this->input->post("inicio");
        $this->search_fin = $this->input->post("fin");
        
        $this->phpsession->set("tamiz_search_name",$this->search_name);
        $this->phpsession->set("tamiz_search_folio",$this->search_folio);
        $this->phpsession->set("tamiz_search_inicio",$this->search_inicio);
        $this->phpsession->set("tamiz_search_fin",$this->search_fin);
        
        //*prevent re-submit form notice */
        redirect(site_url('tamiz/all'));
        //$this->index();
    }
    
    function insert()
    {
        
       for($i = 51 ; $i<=5000;$i++)
       {
           $u = new TamizModel();
           $u->apellido_paterno = "$i";
           $u->apellido_materno = "$i";
           $u->save();
       }
        
    }
    
    function all()
    {
       
        $this->index();
        
    }
    function duplicate()
    {
        
    }

}